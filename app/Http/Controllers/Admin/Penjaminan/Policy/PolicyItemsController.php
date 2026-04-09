<?php

namespace App\Http\Controllers\Admin\Penjaminan\Policy;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Penjaminan\Policy\StorePolicyRequest;
use App\Http\Requests\Admin\Penjaminan\Policy\UpdatePolicyRequest;
use App\Models\Policy;
use App\Services\Admin\Penjaminan\Policy\PolicyCategoryService;
use App\Services\Admin\Penjaminan\Policy\PolicyQueryService;
use App\Services\Admin\Penjaminan\Policy\PolicyService;
use Illuminate\Http\Request;

class PolicyItemsController extends Controller
{
    public function __construct(
        private PolicyService $service,
        private PolicyQueryService $queryService,
        private PolicyCategoryService $categoryService
    ) {}

    public function index(Request $request)
    {
        $search = trim($request->get('search'));
        $categoryId = $request->get('category_id');

        $filters = [
            'search' => $search,
            'category_id' => $categoryId,
        ];

        $items = $this->queryService->getPolicies($filters);
        $categories = $this->categoryService->getAllCategories();

        if ($request->ajax()) {
            return view('admin.pages.kebijakan.partials.table', compact('items', 'search', 'categories'));
        }

        return view('admin.pages.kebijakan.index', compact('items', 'search', 'categories', 'categoryId'));
    }

    public function create()
    {
        //
    }

    public function store(StorePolicyRequest $request)
    {
        $this->service->store($request->validated());

        return back()
            ->with('success', 'Kebijakan berhasil ditambahkan.');
    }

    public function edit(Policy $kebijakan)
    {
        //
    }

    public function update(UpdatePolicyRequest $request, Policy $kebijakan)
    {
        $this->service->update($kebijakan, $request->validated());

        return back()
            ->with('success', 'Kebijakan berhasil diperbarui.');
    }

    public function destroy(Policy $kebijakan)
    {
        $this->service->delete($kebijakan);

        return redirect()
            ->back()
            ->with('success', 'Kebijakan berhasil dihapus.');
    }
}
