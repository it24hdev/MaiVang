<?php
namespace App\Admin\Http\Requests;
use  Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

Class SystemDetailsProductRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }
    public function rules()
    {
        return [
            'img_pro_thumbnail_width' => 'required|max:5',
            'img_pro_thumbnail_height' => 'required|max:5',
            'img_pro_small_width' => 'required|max:5',
            'img_pro_small_height' => 'required|max:5',
            'img_pro_medium_width' => 'required|max:5',
            'img_pro_medium_height' => 'required|max:5',
            'img_pro_large_width' => 'required|max:5',
            'img_pro_large_height' => 'required|max:5',
        ];
    }
    public function messages()
    {
        return [
            'img_pro_thumbnail_width.max' => 'Kích thước quá lớn',
            'img_pro_thumbnail_width.required' => 'Kích thước không được bỏ trống',
            'img_pro_thumbnail_height.max' => 'Kích thước quá lớn',
            'img_pro_thumbnail_height.required' => 'Kích thước không được bỏ trống',
            'img_pro_small_width.max' => 'Kích thước quá lớn',
            'img_pro_small_width.required' => 'Kích thước không được bỏ trống',
            'img_pro_small_height.max' => 'Kích thước quá lớn',
            'img_pro_small_height.required' => 'Kích thước không được bỏ trống',
            'img_pro_medium_width.max' => 'Kích thước quá lớn',
            'img_pro_medium_width.required' => 'Kích thước không được bỏ trống',
            'img_pro_medium_height.max' => 'Kích thước quá lớn',
            'img_pro_medium_height.required' => 'Kích thước không được bỏ trống',
            'img_pro_large_width.max' => 'Kích thước quá lớn',
            'img_pro_large_width.required' => 'Kích thước không được bỏ trống',
            'img_pro_large_height.max' => 'Kích thước quá lớn',
            'img_pro_large_height.required' => 'Kích thước không được bỏ trống',
        ];
    }
}
