<?php

namespace App\Admin\Http\Requests;

use  Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CustomerRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        $id = intval($this->id);
        return [
            'name' => 'required|max:255',
            'phone' => 'required|digits_between:10,12|unique:customers,phone,'.($id ? $id : ''),
            'email' => 'sometimes|nullable|email|max:255',
            'address' => 'max:255',
            'company_name' => 'max:255',
            'company_tax_code' => 'max:255',
            'note' => 'max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên khách hàng không được bỏ trống',
            'name.max' => 'Tên khách hàng quá dài',
            'phone.required' => 'Số điện thoại không được bỏ trống',
            'phone.digits_between' => 'Số điện thoại không hợp lệ',
            'phone.unique' => 'Số điện thoại đã được sử dụng',
            'email.email' => 'Email không hợp lệ',
            'email.max' => 'Email quá dài',
            'company_name.max' => 'Số điện thoại không được bỏ trống',
            'company_tax_code.max' => 'Số điện thoại không được bỏ trống',
            'note.max' => 'Số điện thoại không được bỏ trống',
        ];
    }
}
