<?php
namespace App\Admin\Http\Requests;
use  Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

Class SystemHomeRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }
    public function rules()
    {
        return [
            'home_pro_hot_quantity' => 'required|max:5',
            'home_pro_best_sale_quantity' => 'required|max:5',
            'home_pro_new_quantity' => 'required|max:5',
            'home_pro_sale_off_quantity' => 'required|max:5',
            'home_pro_collection_quantity' => 'required|max:5',
        ];
    }
    public function messages()
    {
        return [
            'home_pro_hot_quantity.required' => 'Số lượng hiển thị không được bỏ trống',
            'home_pro_hot_quantity.max' => 'Số lượng hiển thị quá dài',
            'home_pro_best_sale_quantity.required' => 'Số lượng hiển thị không được bỏ trống',
            'home_pro_best_sale_quantity.max' => 'Số lượng hiển thị quá dài',
            'home_pro_new_quantity.required' => 'Số lượng hiển thị không được bỏ trống',
            'home_pro_new_quantity.max' => 'Số lượng hiển thị quá dài',
            'home_pro_sale_off_quantity.required' => 'Số lượng hiển thị không được bỏ trống',
            'home_pro_sale_off_quantity.max' => 'Số lượng hiển thị quá dài',
            'home_pro_collection_quantity.required' => 'Số lượng hiển thị không được bỏ trống',
            'home_pro_collection_quantity.max' => 'Số lượng hiển thị quá dài',
        ];
    }
}
