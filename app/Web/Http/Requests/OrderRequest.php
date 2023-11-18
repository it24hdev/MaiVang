<?php
namespace App\Web\Http\Requests;
use  Illuminate\Foundation\Http\FormRequest;

Class OrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'phone' => 'required|digits_between:10,12',
            'email' => 'sometimes|email|max:255',
            'note' => 'max:1000',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Họ và tên không được bỏ trống',
            'name.max' => 'Họ và tên quá dài',
            'phone.required' => 'Số điện thoại không được bỏ trống',
            'phone.digits_between' => 'Số điện thoại không hợp lệ',
            'email.email' => 'Email không hợp lệ',
            'email.max' => 'Email quá dài',
            'note.max' => 'Lời nhắn quá dài',
        ];
    }
}
