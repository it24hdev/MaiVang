<?php
namespace App\Web\Http\Requests;
use  Illuminate\Foundation\Http\FormRequest;

Class EmailOrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'email' => 'required|email|max:255',
        ];
    }
    public function messages()
    {
        return [
            'email.email' => 'Email không hợp lệ',
            'email.max' => 'Email quá dài',
            'email.required' => 'Email không được bỏ trống',
        ];
    }
}
