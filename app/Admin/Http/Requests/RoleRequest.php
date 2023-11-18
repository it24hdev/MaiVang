<?php
namespace App\Admin\Http\Requests;
use  Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

Class RoleRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }
    public function rules()
    {
        $id = intval($this->id);
        return [
            'name' => 'required|max:255|unique:roles,name,'.($id ? $id : ''),
            'describe' => 'max:255',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => "Tên vai trò không được bỏ trống",
            'name.max' => "Tên vai trò quá dài",
            'name.unique' => "Tên vai trò đã được sử dụng",
            'describe.max' => "Mô tả quá dài",
        ];
    }
}
