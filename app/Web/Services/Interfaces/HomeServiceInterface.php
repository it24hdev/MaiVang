<?php
namespace App\Web\Services\Interfaces;

interface HomeServiceInterface
{
    public function index();
    public function searchPerfect($request);
    public function emailOrder($request);
    public function loadProductByCategory($request);
    public function getSolution($request);
    public function getCategoryProduct($request);
    public function getProductAll($request);
    public function getCustomer($request);
    public function getVideo($request);
    public function getNews($request);
    public function getCategoryImage();
}
