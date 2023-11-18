<?php
namespace App\Admin\Http\Requests;
use  Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

Class ShortUrlRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }
    public function rules()
    {
        $id = intval($this->id);
        return [
            'url_key' => 'required|unique:short_urls,url_key,'.($id ? $id : ''),
        ];
    }
    public function messages()
    {
        return [
            'url_key.required' => 'URL KEY không được bỏ trống',
            'url_key.unique' => 'URL KEY đã được sử dụng',
        ];
    }
}
