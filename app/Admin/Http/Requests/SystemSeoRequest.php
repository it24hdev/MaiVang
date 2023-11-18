<?php
namespace App\Admin\Http\Requests;
use  Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

Class SystemSeoRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }
    public function rules()
    {
        return [
            'meta_title' => 'max:255',
            'meta_keyword' => 'max:255',
            'meta_description' => 'max:1000',
        ];
    }
    public function messages()
    {
        return [
            'meta_title.max' => 'Meta title quá dài',
            'meta_keyword.max' => 'Meta keyword quá dài',
            'meta_description.max' => 'Meta description quá dài',
        ];
    }
}
