<?php
namespace App\Admin\Http\Requests;
use  Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

Class MenuItemRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'redirect' => 'max:255',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên menu không được bỏ trống',
            'name.max' => 'Tên menu quá dài',
            'redirect.max' => 'URL quá dài',
        ];
    }
}
