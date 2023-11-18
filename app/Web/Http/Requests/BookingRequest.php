<?php
namespace App\Web\Http\Requests;
use  Illuminate\Foundation\Http\FormRequest;

Class BookingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'phone' => 'required|digits_between:10,12',
            'note' => 'max:1000',
            'address' => 'max:1000',
            'booking_date' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Họ và tên không được bỏ trống',
            'name.max' => 'Họ và tên quá dài',
            'phone.required' => 'Số điện thoại không được bỏ trống',
            'phone.digits_between' => 'Số điện thoại không hợp lệ',
            'note.max' => 'Yêu cầu quá dài',
            'address.max' => 'Địa chỉ quá dài',
            'booking_date.required' => 'lịch hẹn không được bỏ trống',
        ];
    }
}
