<?php
namespace App\Web\Services\Interfaces;

interface ProductServiceInterface
{
    public function detailProduct($request);
    public function categoryProduct($request);
    public function loadProducts($request);
}
