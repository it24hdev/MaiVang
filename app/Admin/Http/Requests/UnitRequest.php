<?php

namespace App\Admin\Http\Requests;

use  Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UnitRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        $id = intval($this->id);
        return [
            'name' => 'required|max:255|unique:units,name,'.($id ? $id : ''),
            'description' => 'max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên đơn vị tính không được bỏ trống',
            'name.max' => 'Tên đơn vị tính quá dài',
            'name.unique' => 'Tên đơn vị tính đã được sử dụng',
            'description.max' => 'Mô tả quá dài',
        ];
    }
}
