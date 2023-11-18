<?php

namespace App\Web\Http\Controllers;

use App\Web\Services\Interfaces\NewsServiceInterface;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $newsService;

    public function __construct(NewsServiceInterface $newsService)
    {
        $this->newsService = $newsService;
    }
    public function index(Request $request){
        return $this->newsService->index($request);
    }
}
