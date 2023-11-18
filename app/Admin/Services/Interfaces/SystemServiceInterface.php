<?php
namespace App\Admin\Services\Interfaces;

interface SystemServiceInterface
{
    public function index();
    public function updateProductImageSize($request);
    public function updatePostImageSize($request);
}
