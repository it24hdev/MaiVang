<?php
namespace App\Admin\Http\Requests;
use  Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

Class MenuRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }
    public function rules()
    {
        return [
            'name' => 'required|max:255|unique:menus,name',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên menu không được bỏ trống',
            'name.max' => 'Tên menu quá dài',
            'name.unique' => 'Menu đã được sử dụng',
        ];
    }
}
