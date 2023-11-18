<?php
namespace App\Admin\Services\Interfaces;

interface ProductServiceInterface
{
    public function index($request);
    public function store($request);
    public function edit($request);
    public function editCategory($request);
    public function editImage($request);
    public function editAttribute($request);
    public function editTag($request);
    public function editVariant($request);
    public function editDetail($request);
    public function update($request);
    public function restore($request);
    public function destroy($request);
    public function changeStatus($request);
    public function changeShow($request);
    public function show($request);
    public function updateCategory($request);
    public function loadCategory($request);
    public function uploadImage($request);
    public function deleteImage($request);
    public function updateImage($request);
    public function loadAlbum($request);
    public function uploadFromAlbum($request);
    public function updateAttribute($request);
    public function updateDetail($request);
    public function updateTag($request);
    public function loadVariant($request);
    public function updateVariant($request);
    public function destroyVariant($request);
    public function export();
    public function import($request);
    public function ProductImageImport();
}
