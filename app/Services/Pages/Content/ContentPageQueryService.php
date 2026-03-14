<?php

namespace App\Services\Pages\Content;

use App\Models\Content;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use InvalidArgumentException;

class ContentPageQueryService
{
    public const TYPE_META = [
        'news' => [
            'label' => 'Berita',
            'title' => 'Berita TIK Uniba',
            'description' => 'Kumpulan berita terbaru seputar kegiatan, inovasi, dan informasi resmi dari UPT TIK UNIBA Madura.',
            'accent' => 'blue',
        ],
        'announcement' => [
            'label' => 'Pengumuman',
            'title' => 'Pengumuman Resmi',
            'description' => 'Informasi resmi, pemberitahuan penting, dan update layanan terbaru dari UPT TIK UNIBA Madura.',
            'accent' => 'amber',
        ],
        'agenda' => [
            'label' => 'Agenda',
            'title' => 'Agenda Kegiatan',
            'description' => 'Jadwal agenda, workshop, dan kegiatan terbaru yang diselenggarakan oleh UPT TIK UNIBA Madura.',
            'accent' => 'emerald',
        ],
    ];

    public function getLatestByType(string $type, int $limit = 4): Collection
    {
        return $this->publishedByTypeQuery($type)
            ->latest('published_at')
            ->latest('id')
            ->take($limit)
            ->get();
    }

    public function getUpcomingAgenda(int $limit = 4): Collection
    {
        $items = $this->publishedByTypeQuery('agenda')
            ->whereDate('event_date', '>=', today())
            ->orderBy('event_date')
            ->take($limit)
            ->get();

        if ($items->isNotEmpty()) {
            return $items;
        }

        return $this->publishedByTypeQuery('agenda')
            ->orderByDesc('event_date')
            ->take($limit)
            ->get();
    }

    public function getPaginatedByType(string $type, array $filters = []): LengthAwarePaginator
    {
        $query = $this->publishedByTypeQuery($type)
            ->when($filters['search'] ?? null, function (Builder $builder, string $search) {
                $builder->where(function (Builder $subQuery) use ($search) {
                    $subQuery->where('title', 'like', "%{$search}%")
                        ->orWhere('excerpt', 'like', "%{$search}%")
                        ->orWhere('content', 'like', "%{$search}%")
                        ->orWhere('location', 'like', "%{$search}%");
                });
            });

        if ($type === 'agenda') {
            $query->orderByRaw('CASE WHEN event_date >= CURDATE() THEN 0 ELSE 1 END')
                ->orderBy('event_date')
                ->orderByDesc('published_at');
        } else {
            $query->latest('published_at')
                ->latest('id');
        }

        return $query->paginate($filters['per_page'] ?? 9)->withQueryString();
    }

    public function findPublishedByTypeAndSlug(string $type, string $slug): Content
    {
        $item = $this->publishedByTypeQuery($type)
            ->with('author')
            ->where('slug', $slug)
            ->first();

        if (!$item) {
            throw (new ModelNotFoundException())->setModel(Content::class, [$slug]);
        }

        return $item;
    }

    public function getRelated(Content $content, int $limit = 4): Collection
    {
        $words = collect(preg_split('/\s+/', (string) $content->title))
            ->filter(fn(string $w) => mb_strlen($w) >= 4)
            ->take(5)
            ->values();

        $baseQuery = function () use ($content) {
            return $this->publishedByTypeQuery($content->type)
                ->whereKeyNot($content->getKey());
        };

        $applyOrder = function ($q) use ($content) {
            return $content->type === 'agenda'
                ? $q->orderBy('event_date')
                : $q->latest('published_at')->latest('id');
        };

        if ($words->isNotEmpty()) {
            $keywordMatches = $applyOrder(
                $baseQuery()->where(function ($q) use ($words) {
                    foreach ($words as $word) {
                        $q->orWhere('title', 'like', "%{$word}%")
                            ->orWhere('excerpt', 'like', "%{$word}%");
                    }
                })
            )->take($limit)->get();

            if ($keywordMatches->count() >= $limit) {
                return $keywordMatches;
            }

            $found = $keywordMatches->modelKeys();
            $filler = $applyOrder(
                $baseQuery()->when(!empty($found), fn($q) => $q->whereNotIn('id', $found))
            )->take($limit - $keywordMatches->count())->get();

            return $keywordMatches->concat($filler);
        }

        return $applyOrder($baseQuery())->take($limit)->get();
    }

    public function getTypeMeta(string $type): array
    {
        $this->assertValidType($type);

        return self::TYPE_META[$type];
    }

    private function publishedByTypeQuery(string $type): Builder
    {
        $this->assertValidType($type);

        return Content::query()
            ->where('type', $type)
            ->where('status', 'published');
    }

    private function assertValidType(string $type): void
    {
        if (!array_key_exists($type, self::TYPE_META)) {
            throw new InvalidArgumentException('Invalid content type.');
        }
    }
}
