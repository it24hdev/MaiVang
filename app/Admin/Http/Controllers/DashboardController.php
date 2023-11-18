<?php

namespace App\Admin\Http\Controllers;

use App\Admin\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {session(['menu' => 'dashboard']);return $next($request);});
    }

    public function index()
    {
        if (Auth::check()) {
            return view('admin.content.dashboard.dashboard')->with('success','Đăng nhập thành công');
        }
        return redirect()->route('admin.login');
    }
}
