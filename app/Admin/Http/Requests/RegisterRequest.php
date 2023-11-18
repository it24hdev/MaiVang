<?php
namespace App\Admin\Http\Requests;
use  Illuminate\Foundation\Http\FormRequest;

Class RegisterRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => "Họ và tên không được bỏ trống",
            'email.required' => "Email không được bỏ trống",
            'email.email' => "Email không hợp lệ",
            'email.unique' => "Email đã được sử dụng",
            'password.required' => "Mật khẩu không được bỏ trống",
            'password.min' => "Mật khẩu có ít nhất 6 ký tự",
        ];
    }
}
