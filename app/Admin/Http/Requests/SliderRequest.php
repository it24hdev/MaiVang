<?php
namespace App\Admin\Http\Requests;
use  Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

Class SliderRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }
    public function rules()
    {
        $id = intval($this->id);
        return [
            'name' => 'required|unique:sliders,name,'.($id ? $id : ''),
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên ảnh không được bỏ trống',
            'name.unique' => 'Tên ảnh đã được sử dụng',
        ];
    }
}
