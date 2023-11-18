<?php
namespace App\Admin\Http\Requests;
use App\Admin\Http\Rules\ShortUrlRule;
use  Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

Class PageRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }
    public function rules()
    {
        $id = intval($this->id);
        return [
            'name' => 'required|max:255',
            'slug' => [
                'required',
                'max:255',
                Rule::unique('pages', 'slug')->ignore($id),
                new ShortUrlRule($id,5),
            ],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tiêu đề không được bỏ trống',
            'name.max' => 'Tiêu đề quá dài',
            'slug.required' => 'Đường dẫn không đươc bỏ trống',
            'slug.unique' => 'Đường dẫn đã được sử dụng',
            'slug.max' => 'Đường dẫn quá dài',
            'summary.max' => 'Tóm tắt quá dài',
            'meta_title.max' => 'Meta title quá dài',
            'meta_keyword.max' => 'Meta keyword quá dài',
            'meta_description.max' => 'Meta description quá dài',
        ];
    }

}
