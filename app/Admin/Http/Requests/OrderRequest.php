<?php

namespace App\Admin\Http\Requests;

use  Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class OrderRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'customers_id' => 'required|exists:customers,id',
            'users_id' => 'sometimes|nullable|exists:users,id',
            'payment_methods_id' => 'sometimes|nullable|exists:payment_methods,id',
            'shipping_methods_id' => 'sometimes|nullable|exists:shipping_methods,id',
            'transport_fees_id' => 'sometimes|nullable|exists:transport_fees,id',
            'cities_id' => 'sometimes|nullable|exists:cities,id',
            'districts_id' => 'sometimes|nullable|exists:districts,id',
            'note' => 'max:1000',
            'address' => 'max:255',
            'status' => 'in:0,1,2,3,4',
            'status_payment' => 'in:0,1',
            'status_transport' => 'in:0,1,2',
        ];
    }

    public function messages()
    {
        return [
            'customers_id.exists' => 'Khách hàng không hợp lệ',
            'customers_id.required' => 'Khách hàng chưa được chọn',
            'users_id.exists' => 'Nhân viên bán hàng không hợp lệ',
            'users_id.required' => 'Nhân viên bán hàng chưa được chọn',
            'payment_methods_id.exists' => 'Hình thức thanh toán không hợp lệ',
            'payment_methods_id.required' => 'Hình thức thanh toán chưa được chọn',
            'shipping_methods_id.exists' => 'Hình thức vận chuyển không hợp lệ',
            'shipping_methods_id.required' => 'Hình thức vận chuyển chưa được chọn',
            'transport_fees_id.exists' => 'Phí vận chuyển không hợp lệ',
            'transport_fees_id.required' => 'Phí vận chuyển chưa được chọn',
            'cities_id.exists' => 'Tinh/TP nhận hàng không hợp lệ',
            'cities_id.required' => 'Tinh/TP nhận hàng chưa được chọn',
            'districts_id.exists' => 'Quận/huyện nhận hàng không hợp lệ',
            'districts_id.required' => 'Quận/huyện nhận hàng chưa được chọn',
            'address.max' => 'Địa chỉ nhận hàng quá dài',
            'note.max' => 'Ghi chú quá dài',
            'status.in' => 'Tình trạng đơn hàng không hợp lệ',
            'status_payment.in' => 'Tình trạng thanh toán không hợp lệ',
            'status_transport.in' => 'Tình trạng vận chuyển không hợp lệ',
        ];
    }
}
