<?php

namespace App\Http\Controllers\Admin\Penjaminan\Policy;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Penjaminan\Policy\StorePolicyCategoryRequest;
use App\Http\Requests\Admin\Penjaminan\Policy\UpdatePolicyCategoryRequest;
use App\Models\PolicyCategory;
use App\Services\Admin\Penjaminan\Policy\PolicyCategoryService;
use Illuminate\Http\Request;

class PolicyCategoryController extends Controller
{
    public function __construct(
        private PolicyCategoryService $service
    ) {}

    public function index(Request $request)
    {
        $search = trim($request->get('search'));
        $filters = ['search' => $search];
        $items = $this->service->getCategories($filters);

        if ($request->ajax()) {
            return view('admin.pages.kebijakan.kategori.partials.table', compact('items', 'search'));
        }

        return view('admin.pages.kebijakan.kategori.index', compact('items', 'search'));
    }

    public function store(StorePolicyCategoryRequest $request)
    {
        $this->service->store($request->validated());

        return redirect()
            ->back()
            ->with('success', 'Kategori kebijakan berhasil ditambahkan.');
    }

    public function update(UpdatePolicyCategoryRequest $request, PolicyCategory $kebijakan_kategori)
    {
        $this->service->update($kebijakan_kategori, $request->validated());

        return redirect()
            ->back()
            ->with('success', 'Kategori kebijakan berhasil diperbarui.');
    }

    public function destroy(PolicyCategory $kebijakan_kategori)
    {
        if ($kebijakan_kategori->policies()->exists()) {
            return redirect()
                ->back()
                ->with('error', 'Kategori tidak dapat dihapus karena masih memiliki kebijakan.');
        }

        $this->service->delete($kebijakan_kategori);

        return redirect()
            ->back()
            ->with('success', 'Kategori kebijakan berhasil dihapus.');
    }
}
