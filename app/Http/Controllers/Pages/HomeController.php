<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\KatalogLayanan;
use App\Services\Pages\Content\ContentPageQueryService;

class HomeController extends Controller
{
    public function __construct(
        private readonly ContentPageQueryService $contentQuery
    ) {}

    public function index()
    {
        $newsItems = $this->contentQuery->getLatestByType('news');
        $announcementItems = $this->contentQuery->getLatestByType('announcement');
        $agendaItems = $this->contentQuery->getUpcomingAgenda();

        $katalogLayanan = KatalogLayanan::query()
            ->select(['id', 'nama', 'icon'])
            ->where('is_active', true)
            ->orderBy('nama')
            ->get();

        return view('home', compact('newsItems', 'announcementItems', 'agendaItems', 'katalogLayanan'));
    }
}
