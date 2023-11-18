<?php
namespace App\Admin\Http\Requests;
use App\Admin\Http\Rules\ShortUrlRule;
use App\Admin\Models\ShortUrl;
use  Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

Class PostCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }
    public function rules()
    {
        $id = intval($this->id);
        return [
            'name' => 'required|unique:category_posts,name,'.($id ? $id : ''),
            'slug' => [
                'required',
                Rule::unique('category_posts', 'slug')->ignore($id),
                new ShortUrlRule($id,4),
            ],
            'redirect' => 'max:255',
            'meta_title' => 'max:255',
            'meta_keyword' => 'max:255',
            'meta_description' => 'max:1000',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên danh mục không được bỏ trống',
            'name.unique' => 'Tên danh mục đã được sử dụng',
            'slug.required' => 'Slug không được bỏ trống',
            'slug.unique' => 'Slug đã được sử dụng',
            'redirect.max' => 'Đường dẫn ngoài quá dài',
            'meta_title.max' => 'Meta title quá dài',
            'meta_keyword.max' => 'Meta keyword quá dài',
            'meta_description.max' => 'Meta description quá dài',
        ];
    }
}
