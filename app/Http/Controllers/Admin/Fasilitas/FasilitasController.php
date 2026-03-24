<?php

namespace App\Http\Controllers\Admin\Fasilitas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Fasilitas\StoreFasilitasRequest;
use App\Http\Requests\Admin\Fasilitas\UpdateFasilitasRequest;
use App\Models\Fasilitas;
use App\Services\Admin\Fasilitas\FasilitasService;
use App\Services\Admin\Fasilitas\FasilitasQueryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    public function __construct(
        private FasilitasService $service,
        private FasilitasQueryService $queryService
    ) {}

    public function index(Request $request)
    {
        $search = trim($request->get('search'));

        $filters = [
            'search' => $search,
        ];

        $items = $this->queryService->getItems($filters);

        if ($request->ajax()) {
            return view('admin.pages.fasilitas.partials.table', compact('items', 'search'));
        }

        return view('admin.pages.fasilitas.index', compact('items', 'search'));
    }

    public function store(StoreFasilitasRequest $request)
    {
        $this->service->store($request->validated());

        return redirect()->back()->with('success', 'Fasilitas berhasil ditambahkan.');
    }

    public function update(UpdateFasilitasRequest $request, Fasilitas $fasilita)
    {
        $this->service->update($fasilita, $request->validated());

        return redirect()->back()->with('success', 'Fasilitas berhasil diperbarui.');
    }

    public function destroy(Fasilitas $fasilita)
    {
        $this->service->delete($fasilita);

        return redirect()->back()->with('success', 'Fasilitas berhasil dihapus.');
    }

    public function deleteGalleryImage(int $imageId): JsonResponse
    {
        try {
            $this->service->deleteGalleryImage($imageId);
            return response()->json(['success' => true, 'message' => 'Gambar berhasil dihapus']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 400);
        }
    }
}
