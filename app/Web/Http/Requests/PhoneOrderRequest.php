<?php
namespace App\Web\Http\Requests;
use  Illuminate\Foundation\Http\FormRequest;

Class PhoneOrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'phone' => 'required|digits_between:10,12',
        ];
    }
    public function messages()
    {
        return [
            'phone.required' => 'Số điện thoại không được bỏ trống',
            'phone.digits_between' => 'Số điện thoại không hợp lệ',
        ];
    }
}
