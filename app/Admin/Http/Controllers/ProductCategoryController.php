<?php

namespace App\Admin\Http\Controllers;

use App\Admin\Http\Requests\ProductCategoryRequest;
use App\Admin\Models\ProductCategory;
use App\Admin\Services\Interfaces\ProductCategoryServiceInterface;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    protected $categoryProductsService;

    public function __construct(ProductCategoryServiceInterface $categoryProductsService)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {session(['menu' => 'product']);return $next($request);});
        $this->categoryProductsService = $categoryProductsService;
    }

    public function index()
    {
        $this->authorize('viewAny', ProductCategory::class);
        return $this->categoryProductsService->index();
    }

    public function load(Request $request){
        return $this->categoryProductsService->load($request);
    }

    public function loadAttribute(Request $request){
        return $this->categoryProductsService->loadAttribute($request);
    }

    public function updateLocation(Request $request){
        $this->authorize('update', ProductCategory::class);
        return $this->categoryProductsService->updateLocation($request);
    }

    public function store(ProductCategoryRequest $request){
        $this->authorize('create', ProductCategory::class);
        return $this->categoryProductsService->store($request);
    }

    public function edit(Request $request){
        $this->authorize('update', ProductCategory::class);
        return $this->categoryProductsService->edit($request);
    }

    public function destroy(Request $request){
        $this->authorize('delete', ProductCategory::class);
        return $this->categoryProductsService->destroy($request);
    }

    public function destroyAttribute(Request $request){
        $this->authorize('delete', ProductCategory::class);
        return $this->categoryProductsService->destroyAttribute($request);
    }

    public function update(ProductCategoryRequest $request){
        $this->authorize('update', ProductCategory::class);
        return $this->categoryProductsService->update($request);
    }

    public function addAttribute(Request $request){
        $this->authorize('update', ProductCategory::class);
        return $this->categoryProductsService->addAttribute($request);
    }

    public function loadAddAttribute(Request $request){
        $this->authorize('update', ProductCategory::class);
        return $this->categoryProductsService->loadAddAttribute($request);
    }

    public function addingAttribute(Request $request){
        $this->authorize('update', ProductCategory::class);
        return $this->categoryProductsService->addingAttribute($request);
    }

}
