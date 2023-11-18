<?php

namespace App\Web\Http\Controllers;

use App\Web\Services\Interfaces\ListPostServiceInterface;
use Illuminate\Http\Request;

class ListPostController extends Controller
{
    protected $listPostService;

    public function __construct(ListPostServiceInterface $listPostService)
    {
        $this->listPostService = $listPostService;
    }

    public function index(Request $request){
        return $this->listPostService->index($request);
    }
}
