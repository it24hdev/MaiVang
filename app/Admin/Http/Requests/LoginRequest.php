<?php
namespace App\Admin\Http\Requests;
use  Illuminate\Foundation\Http\FormRequest;

Class LoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => "Email đăng nhập không được bỏ trống",
            'email.email' => "Email đăng nhập không hợp lệ",
            'email.max' => "Email đăng nhập quá dài",
            'password.required' => "Mật khẩu không được bỏ trống",
            'password.max' => "Mật khẩu quá dài",
        ];
    }
}
