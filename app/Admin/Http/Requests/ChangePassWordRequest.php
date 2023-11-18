<?php
namespace App\Admin\Http\Requests;
use  Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

Class ChangePassWordRequest extends FormRequest
{
    public function rules()
    {
        return [
            'current_password' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail("Mật khẩu cũ không chính xác.");
                    }
                },
            ],
            'password' => 'required|confirmed|different:current_password|min:6',
        ];
    }
    public function messages()
    {
        return [
            'current_password.required' => "Mật khẩu không được bỏ trống",
            'password.different' => "Mật khẩu mới không được trùng với mật khẩu cũ",
            'password.required' => "Mật khẩu mới không được bỏ trống",
            'password.confirmed' => "Mật khẩu xác nhận không khớp",
            'password.min' => "Mật khẩu quá ngắn",
        ];
    }
}
