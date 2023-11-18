<?php

namespace App\Web\Http\Controllers;

use App\Web\Services\Interfaces\ProductServiceInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    public function listProduct(Request $request){
        return $this->productService->listProduct($request);
    }

    public function detailProduct(Request $request){
        return $this->productService->detailProduct($request);
    }

    public function categoryProduct(Request $request){
        return $this->productService->categoryProduct($request);
    }

    public function loadProducts(Request $request){
        return $this->productService->loadProducts($request);
    }
}
