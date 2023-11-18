@extends('admin.layouts.base')
@section('body')
    @can('viewAny', \App\Admin\Models\Order::class)
        <div class="sub-header-container">
            <header class="header navbar navbar-expand-sm">
                <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                    <i class="las la-bars"></i>
                </a>
                <ul class="navbar-nav flex-row">
                    <li>
                        <div class="page-header">
                            <nav class="breadcrumb-one" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Bán hàng</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <a href="javascript:void(0);">Cập nhật đơn hàng</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </li>
                </ul>
            </header>
        </div>
        <!-- Main Body Starts -->
        <div class="layout-px-spacing">
            <div class="row layout-spacing layout-top-spacing">
                <div class="col-lg-12">
                    <div class="">
                        <div class="widget-content searchable-container grid">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <div class="card-box general-info">
                                        <form id="edit-order">
                                            <h5 class="header-title mb-3">Thông tin đơn hàng</h5>
                                            <div class="d-flex flex-wrap col-12">
                                                <div class="info col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group mt-3 mb-0">
                                                        <input name="id" class="d-none" value="{{$order->id}}">
                                                        <label class="text-primary">Nhân viên bán hàng</label>
                                                        <select name="users_id" class="form-control multiple">
                                                            <option value="">Chọn</option>
                                                            @foreach($users as $item)
                                                                <option
                                                                    value="{{$item->id}}" {{$order->users_id == $item->id ? 'selected':''}}>{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group mt-3 mb-0">
                                                        <label class="text-primary">Khách hàng</label>
                                                        <select name="customers_id" class="form-control multiple">
                                                            <option value="">Chọn</option>
                                                            @foreach($customers as $item)
                                                                <option value="{{$item->id}}"
                                                                        data-phone="{{$item->phone}}"
                                                                        data-email="{{$item->email}}"
                                                                    {{$order->customers_id == $item->id ? 'selected':''}}>{{$item->name}}
                                                                    ({{$item->phone}})
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <p class="text-primary mb-2">Địa chỉ nhận hàng</p>
                                                    <div class="form-group mt-3 mb-0">
                                                        <label>Tỉnh/TP</label>
                                                        <select name="cities_id" class="form-control multiple">
                                                            <option value="">Tỉnh/TP</option>
                                                            @foreach($cities as $item)
                                                                <option
                                                                    value="{{$item->id}}" {{$order->cities_id == $item->id ? 'selected':''}}>{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group mt-3 mb-0">
                                                        <label>Quận/huyện</label>
                                                        <select name="districts_id" class="form-control">
                                                            <option value="">Quận/huyện</option>
                                                            @foreach($districts as $item)
                                                                @if($item->city_id == $order->cities_id)
                                                                    <option value="{{$item->id}}" {{$order->districts_id == $item->id ? 'selected':''}}>{{$item->name}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group mt-3 mb-0">
                                                        <label>Địa chỉ chi tiết</label>
                                                    <input type="text" name="address" class="form-control" value="{{$order->address}}">
                                                    </div>
                                                </div>
                                                <div class="info col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group mt-3 mb-0">
                                                        <label class="text-primary">Hình thức thanh toán</label>
                                                        <select name="payment_methods_id" class="form-control multiple">
                                                           <option value="">Chọn</option>
                                                            @foreach($paymentMethods as $item)
                                                                <option value="{{$item->id}}" {{$order->payment_methods_id == $item->id ? 'selected':''}}>{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group mt-3 mb-0">
                                                        <label class="text-primary">Hình thức vận chuyển</label>
                                                        <select name="shipping_methods_id"
                                                                class="form-control multiple">
                                                            <option value="">Chọn</option>
                                                            @foreach($shippingMethods as $item)
                                                                <option
                                                                    value="{{$item->id}}" {{$order->shipping_methods_id == $item->id ? 'selected':''}}>{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <p class="mt-1">&nbsp;</p>
                                                    <div class="form-group mt-3 mb-0">
                                                        <label class="text-primary">Phí vận chuyển</label>
                                                        <select name="transport_fees_id" class="form-control multiple">
                                                           <option value="">Chọn</option>
                                                            @foreach($transportFees as $item)
                                                                <option value="{{$item->id}}"
                                                                        data-value="{{$item->fee}}" {{$order->transport_fees_id == $item->id ? 'selected':''}}>{{number_format($item->fee)}}
                                                                    (Đơn hàng dưới {{number_format($item->order_value)}}
                                                                    )
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group mt-3 mb-0">
                                                        <label>Ghi chú</label>
                                                        <textarea class="form-control" rows="4"
                                                                  name="note">{{$order->note}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class="header-title my-3">Trình trạng đơn hàng</h5>
                                            <div class="row col-12 info m-0">
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Tình trạng đơn hàng</label>
                                                        <select name="status" class="form-control">
                                                            <option value="1" {{$order->status == 1?'selected':''}}>Chưa
                                                                xử lý
                                                            </option>
                                                            <option value="2" {{$order->status == 2?'selected':''}}>Đang
                                                                xử lý
                                                            </option>
                                                            <option value="3" {{$order->status == 3?'selected':''}}>Hoàn
                                                                thành
                                                            </option>
                                                            <option value="4" {{$order->status == 4?'selected':''}}>
                                                                Hủy
                                                            </option>
                                                            <option value="5" {{$order->status == 5?'selected':''}}>Đóng
                                                                lại
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap col-12">
                                                <div class="info col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Tình trạng thanh toán</label>
                                                        <select name="status_payment" class="form-control">
                                                            <option
                                                                value="1" {{$order->status_payment == 1?'selected':''}}>
                                                                Chưa thanh toán
                                                            </option>
                                                            <option
                                                                value="2" {{$order->status_payment == 2?'selected':''}}>
                                                                Đã thanh toán
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="info col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Tình trạng vận chuyển</label>
                                                        <select name="status_transport" class="form-control">
                                                            <option
                                                                value="1" {{$order->status_transport == 1?'selected':''}}>
                                                                Đóng gói
                                                            </option>
                                                            <option
                                                                value="2" {{$order->status_transport == 2?'selected':''}}>
                                                                Vận chuyển
                                                            </option>
                                                            <option
                                                                value="3" {{$order->status_transport == 3?'selected':''}}>
                                                                Đã
                                                                giao hàng
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="d-flex justify-content-end px-3">

                                        </div>
                                        <div class="widget-footer text-right mr-4">
                                            <button class="btn btn-primary btn-update mr-2" type="button">Cập nhật</button>
                                            <a href="{{route('admin.orders.index')}}" type="button" class="btn btn-outline-primary">Quay lại</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <div class="card-box">
                                        <div class="widget-heading mb-2 d-flex justify-content-between align-items-end">
                                            <h5 class="header-title">Sản phẩm của đơn hàng</h5>
                                            <div
                                                class="d-flex justify-content-sm-end justify-content-center contact-options">
                                                <a class="pointer s-o mr-2 bs-tooltip btn-product"
                                                   href="javascript:void(0);" title="Thêm mới">
                                                    <i class="las la-plus-circle"></i>
                                                </a>
                                                <a class="pointer s-o mr-2 bs-tooltip" title=""
                                                   onclick="window.location.reload();" data-original-title="reload">
                                                    <i class="las la-sync-alt"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-centered mb-0" id="order-products">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th>Tên sản phẩm</th>
                                                    <th>SL</th>
                                                    <th>Giá</th>
                                                    <th>Chiết khấu</th>
                                                    <th>Tổng</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($order->Products as $item)
                                                    <tr id="{{$item->id}}">
                                                        <th scope="row" class="name d-flex align-center text-left"><i
                                                                class="las la-times-circle mr-2 font-25 text-danger btn-remove"></i>{{$item->name}}
                                                        </th>
                                                        <td>
                                                            <input type="number" min="0" name="quantity"
                                                                   class="quantity text-right w-100"
                                                                   value="{{$item->pivot->quantity}}"
                                                                   data-value="{{$item->pivot->quantity}}">
                                                        </td>
                                                        <td class="price">
                                                            <input type="number" min="0" name="price"
                                                                   class="price text-right w-100"
                                                                   value="{{intval($item->pivot->price)}}"
                                                                   data-value="{{intval($item->pivot->price)}}">
                                                        </td>
                                                        <td class="discount">
                                                            <input type="number" min="0" name="discount"
                                                                   class="discount text-right w-100"
                                                                   value="{{intval($item->pivot->discount)}}"
                                                                   data-value="{{intval($item->pivot->discount)}}">
                                                        </td>
                                                        <td class="unit-total text-right"
                                                            data-value="{{$item->pivot->total}}">{{number_format($item->pivot->total)}}</td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <th scope="row" colspan="3" class="text-right">Tổng:</th>
                                                    <td class="text-right discount-total">@if($item->pivot){{$item->pivot->sum('discount')}}@endif</td>
                                                    <td class="text-right">
                                                        <div class="font-weight-bold subtotal"
                                                             data-value="0">@if($item->pivot){{$item->pivot->sum('total')}}@endif</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" colspan="4" class="text-right">Chiết khấu đơn
                                                        hàng:
                                                    </th>
                                                    <td class="text-right">
                                                        <div class="font-weight-bold" data-value="0">
                                                            <input type="number" min="0" name="discount_order"
                                                                   class="discount-order text-right w-100"
                                                                   value="{{intval($order->discount_order)}}">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" colspan="4" class="text-right">Phí vận chuyển :</th>
                                                    @if($order->TransportFee)
                                                        <td class="transport-fee text-right"
                                                            data-value="{{$order->TransportFee->fee}}">{{number_format($order->TransportFee->fee)}}</td>
                                                    @else
                                                        <td class="transport-fee text-right" data-value="0">0</td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <th scope="row" colspan="4" class="text-right">Tổng cộng :</th>
                                                    <td class="text-right">
                                                        <div class="strong text-success-teal total"
                                                             data-value="{{$order->total}}">{{number_format($order->total)}}</div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.content.order.product')
        @include('admin.content.order.template_product')
        <!-- Main Body Ends -->
    @endcan
@endsection
@section('css')
    <link href="{{asset('css/admin/select2.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/form-widgets.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/dt-global_style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('library/datatable/datatables.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('js')
    <script src="{{asset('js/admin/select2.min.js')}}"></script>
    <script src="{{asset('js/admin/custom-select2.js')}}"></script>
    <script src="{{asset('library/datatable/datatables.js')}}"></script>
    <script>
        $(document).ready(function () {
            total();
            $(document).on('click', '.btn-product', function () {
                $('.tooltip').hide();
                $('#modal-product').modal('show');

                $.ajax({
                    async: true,
                    url: "{{route('admin.orders.load_product')}}",
                    method: "post",
                    dataType: "json",
                    success: function (output) {
                        $('#products').DataTable().destroy();
                        $('#products').DataTable({
                            data: output.products,
                            columns: [
                                {
                                    data: 'id',
                                    render: function (data, type, row, meta) {
                                        return '<span class="product-id" data-value="' + data + '">' + meta.row + meta.settings._iDisplayStart + 1 + '</span>';
                                    }
                                },
                                {
                                    data: 'name',
                                    render: function (data) {
                                        return '<span class="product-name" data-value="' + data + '">' + data + '</span>';
                                    }
                                },
                                {
                                    data: 'price',
                                    render: function (data) {
                                        var price = new Intl.NumberFormat('vi-VN').format(data);
                                        return '<span class="product-price" data-value="' +data+'">' + price + '</span>';
                                    }
                                },
                                {data: 'warranty'},
                                {
                                    render: function () {
                                        return '<div class="d-flex justify-content-center"><a href="javascript:void(0);" class="bs-tooltip font-20 text-primary btn-add" title="Thêm"><i class="las la-plus-circle"></i></a></div>';
                                    },
                                },
                            ],
                            language: {
                                "paginate": {
                                    "previous": "<i class='las la-angle-left'></i>",
                                    "next": "<i class='las la-angle-right'></i>"
                                }
                            },
                            columnDefs: [
                                {type: "num"},
                                {className: 'text-center', targets: [0, 4]},
                                {className: 'text-left', targets: [1]},
                                {className: 'text-right', targets: [2, 3]},
                            ],
                            lengthMenu: [10, 25, 50, 100],
                            pageLength: 10,
                        });
                    }
                });
            });

            $(document).on('click', '.btn-add', function () {
                var parent = $(this).closest('tr');

                var id = parent.find('.product-id').attr('data-value');
                var price = parent.find('.product-price').attr('data-value') !== 'null' ? parseInt(parent.find('.product-price').attr('data-value')) : 0;
                var name = parent.find('.product-name').attr('data-value');
                var template_product = $('#template_product').html();
                var tmp = $(template_product).clone();
                $(tmp).attr('id', id);
                $(tmp).find('.name').html('<i class="las la-times-circle mr-2 font-25 text-danger btn-remove"></i>' + name);
                $(tmp).find('input[name="price"]').val(price);
                $('#order-products tbody #' + id).remove();
                $('#order-products tbody').prepend(tmp);
                $(this).closest('tr').remove();
                total();
            });

            $(document).on('click', '.btn-remove', function () {
                $(this).closest('tr').remove();
                total();
            });

            function total() {

                var unit_total = 0;
                var discount_total = 0;

                $('#order-products tr').each(function () {
                    if(typeof $(this).attr('id') !== "undefined"){
                        var price = Number($(this).find('input[name="price"]').val());
                        var quantity = Number($(this).find('input[name="quantity"]').val());
                        var discount = Number($(this).find('input[name="discount"]').val());
                        discount_total += discount;
                        unit_total += price*quantity-discount;
                        $(this).find('.unit-total').html(new Intl.NumberFormat('vi-VN').format(price));
                        $(this).find('.unit-total').attr('data-value', price);
                    }
                });

                $('#order-products .discount-total').html(new Intl.NumberFormat('vi-VN').format(discount_total))
                $('#order-products .subtotal').html(new Intl.NumberFormat('vi-VN').format(unit_total));
                $('#order-products .subtotal').attr('data-value', unit_total);
                var transport_fee = Number($('#order-products .transport-fee').attr('data-value'));
                var discount_order = Number($('#order-products input[name="discount_order"]').val());
                var total = unit_total + transport_fee - discount_order;
                $('#order-products .total').html(new Intl.NumberFormat('vi-VN').format(total));
                $('#order-products .total').attr('data-value', total);
            }

            $(document).on('change', 'select[name="transport_fees_id"]', function () {
                var transport_fee = $(this).find('option:selected', this).attr('data-value');
                $('#order-products .transport-fee').attr('data-value', transport_fee);
                $('#order-products .transport-fee').html(new Intl.NumberFormat('vi-VN').format(transport_fee));
                total();
            });

            $(document).on('change', 'input[name="quantity"], input[name="price"], input[name="discount"]', function () {
                var parent = $(this).closest('tr');
                var quantity = parent.find('input[name="quantity"]').val();
                var price = parent.find('input[name="price"]').val();
                var discount = parent.find('input[name="discount"]').val();

                var unit_total = price * quantity - discount;
                $(this).closest('tr').find('.unit-total').attr('data-value', unit_total);
                $(this).closest('tr').find('.unit-total').html(new Intl.NumberFormat('vi-VN').format(unit_total));
                total();
            });

            $(document).on('change', 'input[name="discount_order"]', function () {
                total();
            });

            $(document).on('change', 'select[name="customers_id"]', function () {
                var phone = $(this).find('option:selected', this).attr('data-phone');
                var email = $(this).find('option:selected', this).attr('data-email');
                $('#edit-order input[name="phone"]').val(phone);
                $('#edit-order input[name="email"]').val(email);
            });

            $(document).on('change', 'select[name="cities_id"]', function () {
                var city_id = $(this).val();
                var input = {
                    city_id: city_id,
                };
                $.ajax({
                    async: true,
                    url: "{{route('admin.orders.load_district')}}",
                    method: "post",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        $('select[name="districts_id"]').html('');
                        if (output.districts.length > 0) {
                            $('select[name="districts_id"]').append($('<option>', {
                                value: "",
                                text: "Quận/Huyện"
                            }));
                            $.each(output.districts, function () {
                                $('select[name="districts_id"]').append($('<option>', {
                                    value: this.id,
                                    text: this.name
                                }));
                            })
                        }
                    }
                });
            });

            $(document).on('click', '.btn-update', function (e) {
                e.preventDefault();
                $('form#edit-order .text-error').remove();
                var id = $('form#edit-order input[name="id"]');
                var customers_id = $('form#edit-order select[name="customers_id"]');
                var users_id = $('form#edit-order select[name="users_id"]');
                var payment_methods_id = $('form#edit-order select[name="payment_methods_id"]');
                var shipping_methods_id = $('form#edit-order select[name="shipping_methods_id"]');
                var transport_fees_id = $('form#edit-order select[name="transport_fees_id"]');
                var cities_id = $('form#edit-order select[name="cities_id"]');
                var districts_id = $('form#edit-order select[name="districts_id"]');
                var address = $('form#edit-order input[name="address"]');
                var note = $('form#edit-order textarea[name="note"]');
                var status = $('form#edit-order select[name="status"]');
                var status_payment = $('form#edit-order select[name="status_payment"]');
                var status_transport = $('form#edit-order select[name="status_transport"]');
                var discount_order = $('input[name="discount_order"]');
                var order_detail = [];
                $('#order-products tr').each(function () {
                    var id = $(this).attr('id');
                    if (typeof id != "undefined") {
                        var quantity = $(this).find('input[name="quantity"]').val();
                        var price = $(this).find('input[name="price"]').val();
                        var discount = $(this).find('input[name="discount"]').val();
                        var product = [id, quantity, price, discount];
                        order_detail.push(product);
                    }
                });

                var input = {
                    id: id.val(),
                    customers_id: customers_id.val(),
                    users_id: users_id.val(),
                    payment_methods_id: payment_methods_id.val(),
                    shipping_methods_id: shipping_methods_id.val(),
                    transport_fees_id: transport_fees_id.val(),
                    cities_id: cities_id.val(),
                    districts_id: districts_id.val(),
                    address: address.val(),
                    note: note.val(),
                    status: status.val(),
                    status_payment: status_payment.val(),
                    status_transport: status_transport.val(),
                    discount_order: discount_order.val(),
                    order_detail: order_detail,
                }
                $.ajax({
                    async: true,
                    url: "{{route('admin.orders.update')}}",
                    method: "post",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        if (output.success) {
                            Snackbar.show({
                                text: 'Cập nhật thành công',
                                pos: 'top-center'
                            });
                        }
                    },
                    error: function (output) {
                        var message = output.responseJSON.errors;
                        if (message.customers_id) {
                            customers_id.closest('.form-group').after(error(message.customers_id));
                        }
                        if (message.users_id) {
                            users_id.closest('.form-group').after(error(message.users_id));
                        }
                        if (message.payment_methods_id) {
                            payment_methods_id.closest('.form-group').after(error(message.payment_methods_id));
                        }
                        if (message.shipping_methods_id) {
                            shipping_methods_id.closest('.form-group').after(error(message.shipping_methods_id));
                        }
                        if (message.transport_fees_id) {
                            transport_fees_id.closest('.form-group').after(error(message.transport_fees_id));
                        }
                        if (message.cities_id) {
                            cities_id.closest('.form-group').after(error(message.cities_id));
                        }
                        if (message.districts_id) {
                            districts_id.closest('.form-group').after(error(message.districts_id));
                        }
                        if (message.note) {
                            note.closest('.form-group').after(error(message.note));
                        }
                        if (message.address) {
                            address.closest('.form-group').after(error(message.address));
                        }
                        if (message.status) {
                            status.closest('.form-group').after(error(message.status));
                        }
                        if (message.status_payment) {
                            status_payment.closest('.form-group').after(error(message.status_payment));
                        }
                        if (message.status_transport) {
                            status_transport.closest('.form-group').after(error(message.status_transport));
                        }
                    }
                });
            });
        })
    </script>
@endsection
