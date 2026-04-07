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

    public function update(UpdatePolicyCategoryRequest $request, PolicyCategory $policyCategory)
    {
        $this->service->update($policyCategory, $request->validated());

        return redirect()
            ->back()
            ->with('success', 'Kategori kebijakan berhasil diperbarui.');
    }

    public function destroy(PolicyCategory $policyCategory)
    {
        if ($policyCategory->policies()->exists()) {
            return redirect()
                ->back()
                ->with('error', 'Kategori tidak dapat dihapus karena masih memiliki kebijakan.');
        }

        $this->service->delete($policyCategory);

        return redirect()
            ->back()
            ->with('success', 'Kategori kebijakan berhasil dihapus.');
    }
}
