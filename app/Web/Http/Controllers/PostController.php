<?php

namespace App\Web\Http\Controllers;

use App\Web\Services\Interfaces\PostServiceInterface;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostServiceInterface $postService)
    {
        $this->postService = $postService;
    }

    public function index(Request $request){
        return $this->postService->index($request);
    }
}
