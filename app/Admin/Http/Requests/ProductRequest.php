<?php
namespace App\Admin\Http\Requests;
use App\Admin\Http\Rules\ShortUrlRule;
use App\Admin\Models\ShortUrl;
use  Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

Class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }
    public function rules()
    {
        $id = intval($this->id);
        return [
            'name' => 'required|max:255|unique:products,name,'.($id ? $id : ''),
            'code' => 'required|max:255|unique:products,code,'.($id ? $id : ''),
            'cost' => 'max:10',
            'price' => 'max:10',
            'slug' => [
                'required',
                'max:255',
                Rule::unique('products', 'slug')->ignore($id),
                new ShortUrlRule($id,1),
            ],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => "Tên sản phẩm không được bỏ trống",
            'name.max' => "Tên sản phẩm quá dài",
            'name.unique' => "Tên sản phẩm đã được sử dụng",
            'code.required' => "Mã sản phẩm không được bỏ trống",
            'code.max' => "Mã sản phẩm quá dài",
            'code.unique' => "Mã sản phẩm đã được sử dụng",
            'slug.required' => "Slug không được bỏ trống",
            'slug.max' => "Slug quá dài",
            'slug.unique' => "Slug đã được sử dụng",
            'warranty.max' => 'Bảo hành quá dài',
            'cost.max' => 'Giá nhập hàng quá lớn',
            'price.max' => 'Giá bán lẻ quá lớn',
        ];
    }
}
