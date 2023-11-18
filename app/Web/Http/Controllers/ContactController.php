<?php

namespace App\Web\Http\Controllers;

use App\Web\Http\Requests\BookingRequest;
use App\Web\Http\Requests\OrderRequest;
use App\Web\Services\Interfaces\ContactServiceInterface;

class ContactController extends Controller
{
    protected $contactService;

    public function __construct(ContactServiceInterface $contactService)
    {
        $this->contactService = $contactService;
    }

    public function index(){
        return $this->contactService->index();
    }

    public function booking(BookingRequest $request){
        return $this->contactService->booking($request);
    }
}
