<?php

namespace App\Admin\Http\Controllers;

use App\Admin\Http\Requests\ProductDetailRequest;
use App\Admin\Http\Requests\ProductRequest;
use App\Admin\Http\Requests\VariantRequest;
use App\Admin\Models\Product;
use Illuminate\Http\Request;
use App\Admin\Services\Interfaces\ProductServiceInterface;

class ProductController extends Controller
{
    protected $productsService;

    public function __construct(ProductServiceInterface $productsService)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {session(['menu' => 'product']);return $next($request);});
        $this->productsService = $productsService;
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', Product::class);
        return $this->productsService->index($request);
    }

    public function store(ProductRequest $request)
    {
        $this->authorize('create', Product::class);
        return $this->productsService->store($request);
    }

    public function edit(Request $request)
    {
        $this->authorize('update', Product::class);
        return $this->productsService->edit($request);
    }

    public function editCategory(Request $request)
    {
        $this->authorize('update', Product::class);
        return $this->productsService->editCategory($request);
    }

    public function editImage(Request $request)
    {
        $this->authorize('update', Product::class);
        return $this->productsService->editImage($request);
    }

    public function editAttribute(Request $request)
    {
        $this->authorize('update', Product::class);
        return $this->productsService->editAttribute($request);
    }

    public function editTag(Request $request)
    {
        $this->authorize('update', Product::class);
        return $this->productsService->editTag($request);
    }
    public function editVariant(Request $request)
    {
        $this->authorize('update', Product::class);
        return $this->productsService->editVariant($request);
    }
    public function editDetail(Request $request)
    {
        $this->authorize('update', Product::class);
        return $this->productsService->editDetail($request);
    }

    public function updateAttribute(Request $request)
    {
        $this->authorize('update', Product::class);
        return $this->productsService->updateAttribute($request);
    }

    public function updateDetail(ProductDetailRequest $request)
    {
        $this->authorize('update', Product::class);
        return $this->productsService->updateDetail($request);
    }

    public function updateTag(Request $request)
    {
        $this->authorize('update', Product::class);
        return $this->productsService->updateTag($request);
    }

    public function update(ProductRequest $request)
    {
        $this->authorize('update', Product::class);
        return $this->productsService->update($request);
    }

    public function loadCategory(Request $request)
    {
        $this->authorize('update', Product::class);
        return $this->productsService->loadCategory($request);
    }

    public function loadImage(Request $request)
    {
        $this->authorize('update', Product::class);
        return $this->productsService->loadImage($request);
    }

    public function loadAlbum(Request $request)
    {
        $this->authorize('update', Product::class);
        return $this->productsService->loadAlbum($request);
    }

    public function uploadFromAlbum(Request $request){
        $this->authorize('update', Product::class);
        return $this->productsService->uploadFromAlbum($request);
    }

    public function uploadImage(Request $request){
        $this->authorize('update', Product::class);
        return $this->productsService->uploadImage($request);
    }

    public function deleteImage(Request $request){
        $this->authorize('update', Product::class);
        return $this->productsService->deleteImage($request);
    }

    public function updateImage(Request $request){
        $this->authorize('update', Product::class);
        return $this->productsService->updateImage($request);
    }

    public function updateCategory(Request $request)
    {
        $this->authorize('update', Product::class);
        return $this->productsService->updateCategory($request);
    }


    public function destroy(Request $request)
    {
        $this->authorize('delete', Product::class);
        return $this->productsService->destroy($request);
    }

    public function restore(Request $request){
        $this->authorize('restore', Product::class);
        return $this->productsService->restore($request);
    }

    public function changeStatus(Request $request){
        $this->authorize('update', Product::class);
        return $this->productsService->changeStatus($request);
    }

    public function changeShow(Request $request){
        $this->authorize('update', Product::class);
        return $this->productsService->changeShow($request);
    }

    public function show(Request $request){
        $this->authorize('view', Product::class);
        return $this->productsService->show($request);
    }

    public function loadVariant(Request $request){
        $this->authorize('update', Product::class);
        return $this->productsService->loadVariant($request);
    }
    public function updateVariant(VariantRequest $request){
        $this->authorize('update', Product::class);
        return $this->productsService->updateVariant($request);
    }
    public function destroyVariant(Request $request){
        $this->authorize('update', Product::class);
        return $this->productsService->destroyVariant($request);
    }

    public function export(){
        return $this->productsService->export();
    }

    public function import(Request $request){
        return $this->productsService->import($request);
    }

    public function ProductImageImport(){
        return $this->productsService->ProductImageImport();
    }
}
