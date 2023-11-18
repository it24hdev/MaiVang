<?php
namespace App\Admin\Http\Requests;
use  Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

Class SystemCategoriesProductRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }
    public function rules()
    {
        return [
            'list_pro_hot_quantity' => 'required|max:5',
            'list_pro_best_sale_quantity' => 'required|max:5',
            'list_pro_new_quantity' => 'required|max:5',
            'list_pro_sale_off_quantity' => 'required|max:5',
            'list_pro_collection_quantity' => 'required|max:5',
        ];
    }
    public function messages()
    {
        return [
            'list_pro_hot_quantity.required' => 'Số lượng hiển thị không được bỏ trống',
            'list_pro_hot_quantity.max' => 'Số lượng hiển thị quá lớn',
            'list_pro_best_sale_quantity.required' => 'Số lượng hiển thị không được bỏ trống',
            'list_pro_best_sale_quantity.max' => 'Số lượng hiển thị quá lớn',
            'list_pro_new_quantity.required' => 'Số lượng hiển thị không được bỏ trống',
            'list_pro_new_quantity.max' => 'Số lượng hiển thị quá lớn',
            'list_pro_sale_off_quantity.required' => 'Số lượng hiển thị không được bỏ trống',
            'list_pro_sale_off_quantity.max' => 'Số lượng hiển thị quá lớn',
            'list_pro_collection_quantity.required' => 'Số lượng hiển thị không được bỏ trống',
            'list_pro_collection_quantity.max' => 'Số lượng hiển thị quá lớn',
        ];
    }
}
