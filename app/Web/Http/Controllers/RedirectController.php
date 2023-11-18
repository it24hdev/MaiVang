<?php

namespace App\Web\Http\Controllers;

use App\Web\Services\Interfaces\RedirectServiceInterface;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    protected $redirectService;

    public function __construct(RedirectServiceInterface $redirectService)
    {
        $this->redirectService = $redirectService;
    }

    public function index(Request $request){
        return $this->redirectService->index($request);
    }
}
