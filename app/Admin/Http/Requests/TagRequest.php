<?php

namespace App\Admin\Http\Requests;

use  Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TagRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        $id = intval($this->id);
        return [
            'name' => 'required|max:255|unique:tags,name,'.($id ? $id : ''),
            'slug' => 'required|max:255|unique:tags,slug,'.($id ? $id : ''),
            'meta_title' => 'max:255',
            'meta_description' => 'max:1000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên tag không được bỏ trống',
            'name.max' => 'Tên tag quá dài',
            'name.unique' => 'Tên tag đã được sử dụng',
            'slug.required' => 'Đường dẫn không được bỏ trống',
            'slug.max' => 'Đường dẫn quá dài',
            'slug.unique' => 'Đường dẫn đã được sử dụng',
            'meta_title.max' => 'Meta title quá dài',
            'meta_description.max' => 'Meta description quá dài',
        ];
    }
}
