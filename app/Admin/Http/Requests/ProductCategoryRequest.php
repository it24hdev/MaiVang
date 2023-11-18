<?php
namespace App\Admin\Http\Requests;
use App\Admin\Http\Rules\ShortUrlRule;
use  Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

Class ProductCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        $id = intval($this->id);

        return [
            'name' => 'required|unique:category_products,name,' . ($id ? $id : ''),
            'slug' => [
                'required',
                Rule::unique('category_products', 'slug')->ignore($id),
                new ShortUrlRule($id,3),
            ],
            'image' => 'max:10000',
            'icon' => 'max:1000',
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
            'image.max' => 'Dung lượng ảnh quá lớn (>10Mb)',
            'icon.max' => 'Dung lượng icon quá lớn (>1Mb)',
            'redirect.max' => 'Đường dẫn ngoài quá dài',
            'meta_title.max' => 'Meta title quá dài',
            'meta_keyword.max' => 'Meta keyword quá dài',
            'meta_description.max' => 'Meta description quá dài',
        ];
    }
}
