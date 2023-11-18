<?php

namespace App\Admin\Http\Requests;

use App\Admin\Http\Rules\ShortUrlRule;
use  Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        $id = intval($this->id);
        return [
            'name' => 'required:max:255',
            'summary' => 'max:1000',
            'meta_title' => 'max:1000',
            'meta_keywords' => 'max:1000',
            'meta_description' => 'max:1000',
            'slug' => [
                'required',
                Rule::unique('posts', 'slug')->ignore($id),
                new ShortUrlRule($id,2),
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên bài viết không được để trống',
            'name.max' => 'Tên bài viết quá dài',
            'slug.required' => 'Đường dẫn không được để trống',
            'slug.unique' => 'Đường dẫn đã được sử dụng',
            'summary.max' => 'Tóm tắt quá dài',
            'meta_title.max' => 'Meta title quá dài',
            'meta_keywords.max' => 'Meta keywords quá dài',
            'meta_description.max' => 'Meta description quá dài',
        ];
    }
}
