<?php

namespace App\Web\Http\Controllers;

use App\Admin\Models\ProductCategory;
use App\Admin\Models\Menu;
use App\Admin\Models\Position;
use App\Admin\Models\Quote;
use App\Web\Http\Requests\EmailOrderRequest;
use App\Web\Services\Interfaces\HomeServiceInterface;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class HomeController extends Controller
{
    protected $homeService;

    public function __construct(HomeServiceInterface $homeService)
    {
        $this->homeService = $homeService;
    }

    public function index(){
        return $this->homeService->index();
    }

    public function searchPerfect(Request $request){
        return $this->homeService->searchPerfect($request);
    }

    public function emailOrder(EmailOrderRequest $request){
        return $this->homeService->emailOrder($request);
    }

    public function loadProductByCategory(Request $request){
        return $this->homeService->loadProductByCategory($request);
    }

    public function getSolution(Request $request){
        return $this->homeService->getSolution($request);
    }

    public function getCategoryProduct(Request $request){
        return $this->homeService->getCategoryProduct($request);
    }

    public function getProductAll(Request $request){
        return $this->homeService->getProductAll($request);
    }

    public function getCustomer(Request $request){
        return $this->homeService->getCustomer($request);
    }

    public function getVideo(Request $request){
        return $this->homeService->getVideo($request);
    }

    public function getNews(Request $request){
        return $this->homeService->getNews($request);
    }

    public function getCategoryImage(){
        return $this->homeService->getCategoryImage();
    }
}
