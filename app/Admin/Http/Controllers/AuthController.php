<?php

namespace App\Admin\Http\Controllers;
use App\Admin\Http\Helpers\Common;
use App\Admin\Http\Requests\ChangePassWordRequest;
use App\Admin\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Admin\Http\Requests\LoginRequest;
use App\Admin\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return redirect()->route('admin')->with('success','Bạn đã đăng nhập');
        }
        return view('admin.content.auth.login');
    }

    public function loginAuthentication(LoginRequest $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password],$remember_me)) {
            if(Auth::check()){
                $user = User::find(Auth::id());
                $user->last_login_at = Carbon::now();
                $user->last_login_ip = $request->getClientIp();
                $user->save();
            }
            return redirect()->intended('admin')->with('success','Đăng nhập thành công!');
        }
        return redirect()->route('admin.login')->with('error','Tài khoản hoặc mật khẩu không chính xác');
    }

    public function register()
    {
        if(Auth::check()){
            return redirect()->route('admin')->with('success','Bạn đã đăng nhập');
        }
        return view('admin.content.auth.registration');
    }

    public function registerAuthentication(RegisterRequest $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);
        $input =[
            'name' => $request->name,
            'email' => $request->email,
            'image' => Common::noImage,
            'password' => Hash::make($request->password)
        ];
        try {
            DB::beginTransaction();
            User::create($input);
            DB::commit();
        }
        catch (\Exception $exception){
            DB::rollBack();
            return redirect()->route('admin.login')->with('error','Lỗi');
        }
        return redirect()->route('admin.login')->with('success','Đăng ký thành công tài khoản '.$request->email);
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();
        return Redirect()->route('admin.login');
    }

    public function forgetPassword()
    {
        return view('admin.content.auth.forgetpassword');
    }

    public function changePassword(Request $request){

    }

    public function update(ChangePasswordRequest $request)
    {
        if (Hash::check($request->current_password, Auth::user()->password)) {
            Auth::user()->update([
                'password' => Hash::make($request->password),
            ]);
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

}
