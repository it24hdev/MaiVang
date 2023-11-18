<?php
namespace App\Admin\Http\Requests;
use  Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

Class SystemGeneralRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }
    public function rules()
    {
        return [
            'page_limit' => 'required|max:5',
            'default_language' => 'in:en,vi',
            'default_currency' => 'in:vnd,usd,euro',
        ];
    }
    public function messages()
    {
        return [
            'page_limit.required' => 'Vui lòng nhập Số lượng mục/Trang',
            'page_limit.max' => 'Số lượng mục/Trang quá lớn',
            'default_language.in' => 'Ngôn ngữ không hợp lệ',
            'default_currency.in' => 'Tiền tệ không hợp lệ',
        ];
    }
}
