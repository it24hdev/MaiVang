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
                                        <a href="{{route('admin.orders.index')}}">Danh sách đơn hàng</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </li>
                </ul>
            </header>
        </div>
        <div class="layout-px-spacing">
            <div class="row layout-spacing layout-top-spacing" id="cancel-row">
                <div class="widget-content searchable-container grid">
                    <div class="widget-heading mx-3 d-flex justify-content-between flex-wrap align-center">
                        <h5 class="font-weight-bold m-0">Danh sách đơn hàng</h5>
                        <div class="dropdown custom-dropdown-icon">
                            <div class="d-flex justify-content-sm-end justify-content-center contact-options">
                                @can('create', \App\Admin\Models\Order::class)
                                    <a href="{{route('admin.orders.create')}}" title="Thêm mới"
                                       class="pointer font-25 s-o mr-2 bs-tooltip">
                                        <i class="las la-plus-circle"></i>
                                    </a>
                                @endcan
                                <a class="pointer s-o mr-2 bs-tooltip" title="reload"
                                   onClick="window.location.reload();">
                                    <i class="las la-sync-alt"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2 mx-0">
                        <form method="get" action="{{route('admin.orders.index')}}"
                              enctype="multipart/form-data"
                              class="col-12 d-flex justify-content-between flex-wrap align-center p-0">
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 filtered-list-search align-self-center">
                                <div
                                    class="box-search form-inline my-2 my-lg-0 justify-content-end col-12 px-0">
                                    <i class="las la-search toggle-search"></i>
                                    <input class="form-control w-100 search-form-control ml-lg-auto pr-3"
                                           type="search" placeholder="Tìm kiếm" name="search"
                                           value="{{request()->input('search')}}">
                                </div>
                            </div>
                            <div class="text-sm-right text-center align-self-center">
                                <div class="col-12 d-flex flex-wrap justify-content-sm-start align-center contact-options">
                                    <div class="form-inline my-2 my-lg-0">
                                        <select name="limit"
                                                class="btn btn-outline-primary btn-sm h-auto p-2 mr-2 text-left" onchange="this.form.submit()">
                                            <option value="" {{request()->input('limit') == '' ? 'selected':''}}>10</option>
                                            <option value="30" {{request()->input('limit') == 30 ? 'selected':''}}>30</option>
                                            <option value="50" {{request()->input('limit') == 50 ? 'selected':''}}>50</option>
                                            <option value="100" {{request()->input('limit') == 100 ? 'selected':''}}>100</option>
                                        </select>
                                    </div>
                                    <div class="form-inline my-2 my-lg-0">
                                        <select name="status_payment"
                                                class="btn btn-outline-primary btn-sm h-auto p-2 mr-2 text-left" onchange="this.form.submit()">
                                            <option value="" {{request()->input('status_payment') == '' ? 'selected':''}}>Thanh toán</option>
                                            <option value="1" {{request()->input('status_payment') == 1 ? 'selected':''}}>Chưa thanh toán</option>
                                            <option value="2" {{request()->input('status_payment') == 2 ? 'selected':''}}>Đã thanh toán</option>
                                        </select>
                                    </div>
                                    <div class="form-inline my-2 my-lg-0">
                                        <select name="status_transport"
                                                class="btn btn-outline-primary btn-sm h-auto p-2 mr-2 text-left" onchange="this.form.submit()">
                                            <option value="" {{request()->input('status_transport') == '' ? 'selected':''}}>Vận chuyển</option>
                                            <option value="1" {{request()->input('status_transport') == 1 ? 'selected':''}}>Đóng gói</option>
                                            <option value="2" {{request()->input('status_transport') == 2 ? 'selected':''}}>Đang giao hàng</option>
                                            <option value="3" {{request()->input('status_transport') == 3 ? 'selected':''}}>Đã giao hàng</option>
                                        </select>
                                    </div>
                                    <div class="form-inline my-2 my-lg-0">
                                        <select name="status" class="btn btn-outline-primary btn-sm h-auto p-2 mr-2 text-left" onchange="this.form.submit()">
                                            <option value="" {{request()->input('status') == '' ? 'selected':''}}>Tình trạng đơn</option>
                                            <option value="1" {{request()->input('status') == 1 ? 'selected':''}}>Chưa xử lý</option>
                                            <option value="2" {{request()->input('status') == 2 ? 'selected':''}}>Đang xử lý</option>
                                            <option value="3" {{request()->input('status') == 3 ? 'selected':''}}>Hoàn thành</option>
                                            <option value="4" {{request()->input('status') == 4 ? 'selected':''}}>Hủy</option>
                                            <option value="5" {{request()->input('status') == 5 ? 'selected':''}}>Đóng lại</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    @include('admin.content.alerts.message')
                    <div class="statbox">
                        <div class="widget-content widget-content-area normal-tab pt-0">
                            <div class="table-responsive ecommerce-table">
                                <table class="table table-hover" id="orders">
                                    <thead>
                                    <tr>
                                        <th class="text-center">STT</th>
                                        <th class="text-center">Mã đơn</th>
                                        <th class="text-center">Thời gian đặt</th>
                                        <th class="text-center">Khách hàng</th>
                                        <th class="text-center">Địa chỉ</th>
                                        <th class="text-center">Giá trị</th>
                                        <th class="text-center">Thanh toán</th>
                                        <th class="text-center">Vận chuyển</th>
                                        <th class="text-center">Tình trạng</th>
                                        <th class="text-center">Người xử lý</th>
                                        <th class="text-center">Chức năng</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $index => $item)
                                        <tr id="row_{{$item->id}}">
                                            <td class="text-center">{{$index + 1}}</td>
                                            <td class="text-center">
                                                <a href="javascript:void(0);" class="text-primary btn-view"
                                                   data-value="{{$item->id}}}">
                                                    <ins>#{{$item->code}}</ins>
                                                </a>
                                            </td>
                                            <td class="text-left">{{date('d-m-Y h:m a', strtotime($item->created_at))}}</td>
                                            <td class="text-left text-primary">
                                                @if($item->Customer)<a><ins>{{$item->Customer->name}}</ins></a>@endif
                                            </td>
                                            <td class="text-left">@if($item->City){{$item->City->name}}@endif</td>
                                            <td class="text-left">{{number_format($item->total)}}</td>
                                            <td class="text-center">
                                                @if($item->status_payment == 1)
                                                    Chưa thanh toán
                                                @else
                                                    Đã thanh toán
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($item->status_transport == 1)
                                                    Đóng gói
                                                @elseif($item->status_transport == 2)
                                                    Vận chuyển
                                                @else
                                                    Đã giao hàng
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($item->status == 1)
                                                    Chưa xử lý
                                                @elseif($item->status == 2)
                                                    Đang xử lý
                                                @elseif($item->status == 3)
                                                    Hoàn thành
                                                @elseif($item->status == 4)
                                                    Hủy
                                                @else
                                                    Đóng lại
                                                @endif
                                            </td>
                                            <td class="text-center">@if($item->User){{$item->User->name}}@endif</td>
                                            <td class="text-center">
                                                @can('update', \App\Admin\Models\Order::class)
                                                    <a href="{{route('admin.orders.edit',['id' => $item->id])}}"
                                                       class="bs-tooltip font-20 text-primary mr-2 btn-edit"
                                                       title="Sửa">
                                                        <i class="las la-edit"></i>
                                                    </a>
                                                @endcan
                                                @can('delete', \App\Admin\Models\Order::class)
                                                    <a href="javascript:void(0);"
                                                       class="bs-tooltip font-20 text-danger mr-2 btn-delete"
                                                       title="Xóa"
                                                       data-toggle="modal"
                                                       data-target="#modal-delete"
                                                       data-value="{{$item->id}}">
                                                        <i class="las la-trash-alt"></i>
                                                    </a>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {!! $orders->links('admin.layouts.pagination') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.content.order.view')
        @include('admin.content.order.template_product')
        @include('admin.content.order.template_table')
        @include('admin.content.order.delete')
    @endcan
@endsection
@section('css')
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $(document).on('click', '.btn-view', function () {
                var id = $(this).attr('data-value');
                var template_table = $('#template_table').html();
                $('#modal-view .order-detail-table').html(template_table);
                $('#modal-view').modal('show');
                var input = {
                    id: id,
                }
                $.ajax({
                    url: "{{ route('admin.orders.view') }}",
                    method: "POST",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        if (output.success) {
                            $('#modal-view .modal-title').html('Đơn hàng #' + output.orders.code);
                            $('#modal-view .order-code').html('#' + output.orders.code);
                            var created_at = new Date(output.orders.created_at);
                            $('#modal-view .created-at').html(created_at.toLocaleDateString());
                            $('#modal-view .created-time').html(created_at.toTimeString());
                            $('#modal-view .staff-sale').html(output.orders.staff);
                            $('#modal-view .customer').html(output.orders.customer);
                            $('#modal-view .phone').html('SĐT: ' + output.orders.phone);
                            $('#modal-view .email').html('Email: ' + output.orders.email);
                            $('#modal-view .order-date').html('Ngày đặt hàng: ' + created_at.toLocaleDateString());
                            $('#modal-view .area').html('Địa chỉ giao hàng: ' + output.orders.city + '-' + output.orders.district);
                            $('#modal-view .address').html(output.orders.address);
                            $('#modal-view .payment-method').html('Phương thức thanh toán: ' + output.orders.payment_method);
                            $('#modal-view .shipping-method').html('Phương thức vận chuyển: ' + output.orders.shipping_method);
                            $('#modal-view .note').html('ghi chú: ' + output.orders.note);
                            $('#modal-view .subtotal').html(new Intl.NumberFormat('vi-VN').format(output.subtotal));
                            $('#modal-view .transport-fee').html(new Intl.NumberFormat('vi-VN').format(output.orders.transport_fee));
                            $('#modal-view .total').html(new Intl.NumberFormat('vi-VN').format(output.total));
                            if (output.products.length > 0) {
                                var template_product = $('#template_product').html();
                                $.each(output.products, function (k, v) {
                                    var tmp = $(template_product).clone();
                                    $(tmp).find('.name').html(v.name);
                                    $(tmp).find('.quantity').html(new Intl.NumberFormat('vi-VN').format(v.pivot_quantity));
                                    $(tmp).find('.price').html(new Intl.NumberFormat('vi-VN').format(v.pivot_price));
                                    $(tmp).find('.unit-total').html(new Intl.NumberFormat('vi-VN').format(v.pivot_price * v.pivot_quantity));
                                    $('#modal-view table tbody').prepend(tmp);
                                });
                            }
                        }
                    }
                })
            });

            /** Xác nhận xóa */
            $(document).on('click', '#destroy', function () {
                var id = $(this).attr('data-value');
                var url = "{{route('admin.orders.destroy')}}";
                var data = {
                    id: id,
                }
                $.ajax({
                    url: url,
                    method: "POST",
                    data: data,
                    dataType: "json",
                    success: function (data) {
                        if (data.success) {
                            $('#row_' + id).remove();
                            Snackbar.show({
                                text: 'Xóa thành công',
                                pos: 'top-center'
                            });
                        } else {
                            Snackbar.show({
                                text: 'Có lỗi xảy ra',
                                pos: 'top-center'
                            });
                        }
                    }
                })
            });
        });
    </script>
@endsection
