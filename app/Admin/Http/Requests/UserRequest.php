<?php
namespace App\Admin\Http\Requests;
use  Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

Class UserRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }
    public function rules()
    {
        $id = intval($this->id);
        return [
            'name' => 'required|max:255|min:3',
            'phone' => 'sometimes|nullable|numeric|digits_between:10,12',
            'email' => 'required|email|max:255|unique:users,email,'.($id ? $id : ''),
            'address' => 'max:255',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => "Tên người dùng không được bỏ trống",
            'name.max' => "Tên người dùng quá dài",
            'name.min' => "Tên người dùng quá ngắn",
            'phone.numeric' => "Số điện thoại phải là số",
            'phone.digits_between' => "Số điện thoại không chính xác",
            'email.required' => "Email không được bỏ trống",
            'email.max' => "Email quá dài",
            'email.email' => "Email không hợp lệ",
            'email.unique' => "Email đã tồn tại",
            'address.max' => "Địa chỉ quá dài",
        ];
    }
}
