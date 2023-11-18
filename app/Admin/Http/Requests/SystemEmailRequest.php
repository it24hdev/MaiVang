<?php
namespace App\Admin\Http\Requests;
use  Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

Class SystemEmailRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }
    public function rules()
    {
        return [
            'email_general' => 'required|max:255|regex:/^([a-zA-Z0-9])([a-zA-Z0-9_\-]*)(\.[a-z0-9_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'config_mail_mailer' => 'required|max:255',
            'config_mail_host' => 'required|max:255',
            'config_mail_port' => 'required|max:255',
            'config_mail_encryption' => 'required|max:255',
            'config_mail_username' => 'required|max:100|regex:/^([a-zA-Z0-9])([a-zA-Z0-9_\-]*)(\.[a-z0-9_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'config_mail_password' => 'required|max:50',
            'config_mail_from_name' => 'required|max:255',
        ];
    }
    public function messages()
    {
        return [
            'email_general.required' => 'Email không được bỏ trống',
            'email_general.regex' => 'Email chưa hợp lệ',
            'email_general.max' => 'Email quá dài',
            'config_mail_mailer.required' => 'Phương thức không được bỏ trống',
            'config_mail_mailer.max' => 'Phương thức quá dài',
            'config_mail_host.required' => 'Dịch vụ Mail không được bỏ trống',
            'config_mail_host.max' => 'Dịch vụ Mail quá dài',
            'config_mail_port.required' => 'Cổng không được bỏ trống',
            'config_mail_port.max' => 'Cổng quá dài',
            'config_mail_encryption.required' => 'Mã hóa không được bỏ trống',
            'config_mail_encryption.max' => 'Mã hóa quá dài',
            'config_mail_username.required' => 'Email gửi không được bỏ trống',
            'config_mail_username.regex' => 'Email chưa hợp lệ',
            'config_mail_username.max' => 'Email quá dài',
            'config_mail_password.required' => 'Mật khẩu Email gửi không được bỏ trống',
            'config_mail_password.max' => 'Mật khẩu Email gửi quá dài',
            'config_mail_from_name.required' => 'Tên người gửi Email không được bỏ trống',
            'config_mail_from_name.max' => 'Tên người gửi Email quá dài',
        ];
    }
}
