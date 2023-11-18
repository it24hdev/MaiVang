@extends('admin.layouts.base')
@section('body')
    @can('viewAny', \App\Admin\Models\Customer::class)
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
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Khách hàng</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <a href="{{route('admin.customers.index')}}">Danh sách khách hàng</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </li>
                </ul>
            </header>
        </div>
        <div class="layout-px-spacing">
            <div class="row layout-spacing layout-top-spacing">
                <div class="col-lg-12">
                    <div class="statbox widget box box-shadow mb-4 py-2">
                        <div class="general-info box-info-profile ecommerce-table">
                            <div class="widget-heading m-0 d-flex justify-content-between align-center">
                                <h5>Danh sách khách hàng</h5>
                                <div class="d-flex justify-content-sm-end justify-content-center contact-options">
                                    @can('create', \App\Admin\Models\Customer::class)
                                        <a class="pointer s-o mr-2 bs-tooltip btn-create" href="javascript:void(0);"
                                           title="Thêm mới" data-toggle="modal" data-target="#modal-create">
                                            <i class="las la-plus-circle"></i>
                                        </a>
                                    @endcan
                                    <a class="pointer s-o mr-2 bs-tooltip" title="reload"
                                       onClick="window.location.reload();">
                                        <i class="las la-sync-alt"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <form method="get" action="{{route('admin.customers.index')}}"
                                      enctype="multipart/form-data"
                                      class="col-12 d-flex justify-content-between flex-wrap align-center">
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 filtered-list-search align-self-center p-0">
                                        <div class="box-search form-inline my-2 my-lg-0 justify-content-end col-12 px-0 m-0">
                                            <i class="las la-search toggle-search"></i>
                                            <input
                                                class="form-control w-100 search-form-control ml-lg-auto pr-3"
                                                type="search" placeholder="Tìm kiếm" name="search"
                                                value="{{request()->input('search')}}">
                                        </div>
                                    </div>
                                    <div class="text-sm-right text-center align-self-center">
                                        <div
                                            class="d-flex justify-content-sm-end justify-content-center align-center contact-options">
                                            <div class="form-inline my-2 my-lg-0">
                                                <select name="limit"
                                                        class="btn btn-outline-primary btn-sm h-auto p-2 mr-2 text-left"
                                                        onchange="this.form.submit()">
                                                    <option
                                                        value="{{\App\Admin\Http\Helpers\Common::page_limit()}}" {{request()->input('limit') == \App\Admin\Http\Helpers\Common::page_limit() ? 'selected':''}}>
                                                        {{\App\Admin\Http\Helpers\Common::page_limit()}}
                                                    </option>
                                                    <option
                                                        value="30" {{request()->input('limit') == 30?'selected':''}}>
                                                        30
                                                    </option>
                                                    <option
                                                        value="50" {{request()->input('limit') == 50?'selected':''}}>
                                                        50
                                                    </option>
                                                    <option
                                                        value="100" {{request()->input('limit') == 100?'selected':''}}>
                                                        100
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-inline my-2 my-lg-0">
                                                <select name="cities"
                                                        class="btn btn-outline-primary btn-sm h-auto p-2 mr-2 text-left"
                                                        onchange="this.form.submit()">
                                                    <option value="">Địa chỉ</option>
                                                    @foreach($cities as $item)
                                                    <option value="{{$item->id}}" {{request()->input('cities') == $item->id?'selected':''}}>{{$item->name}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="widget-content date-table-container mt-1 table-responsive">
                                <table id="customers" class="table table-hover dataTable">
                                    <thead>
                                    <tr>
                                        <th class="text-center">STT</th>
                                        <th class="text-center">Ảnh</th>
                                        <th class="text-center">Khách hàng</th>
                                        <th class="text-center">Thông tin</th>
                                        <th class="text-center">Địa chỉ</th>
                                        <th class="text-center">Chức năng</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($customers as $item)
                                        <tr id="row_{{$item->id}}">
                                            <td class="text-center customer-id">{{ ($customers->currentPage() - 1) * $customers->perPage() + $loop->iteration }}</td>
                                            <td class="text-center customer-image">
                                                @if($item->image != \App\Admin\Http\Helpers\Common::noImage)
                                                    <img src="{{asset('media/customers/'.$item->image)}}" width="100px" class="object-cover">
                                                @else
                                                    <img src="{{asset('media/common/no-image.jpg')}}" width="100px" class="object-cover">
                                                @endif
                                            </td>
                                            <td class="text-left customer-name">{{$item->name}}</td>
                                            <td class="text-left">
                                                <p class="m-0 customer-email">Email: {{$item->email}}</p>
                                                <p class="m-0 customer-phone">SĐT: {{$item->phone}}</p>
                                            </td>
                                            <td class="text-center customer-cities">
                                                @if($item->City)
                                                    {{$item->City->name}}
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @can('update', \App\Admin\Models\Customer::class)
                                                    <a href="javascript:void(0);"
                                                       data-value="{{$item->id}}"
                                                       class="bs-tooltip font-20 text-primary mr-2 btn-edit"
                                                       title="Sửa">
                                                        <i class="las la-edit"></i>
                                                    </a>
                                                @endcan
                                                @can('delete', \App\Admin\Models\Customer::class)
                                                    <a href="javascript:void(0);"
                                                       class="bs-tooltip font-20 text-danger mr-2 btn-delete"
                                                       title="Xóa" data-toggle="modal" data-target="#modal-delete"
                                                       data-value="{{$item->id}}">
                                                        <i class="las la-trash-alt"></i>
                                                    </a>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {!! $customers->links('admin.layouts.pagination') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        @include('admin.content.customer.create')
        @include('admin.content.customer.delete')
        @include('admin.content.customer.edit')
        @include('admin.content.customer.template_customer')
    @endcan
@endsection
@section('css')
    <!-- Page Level Plugin/Style Starts -->
    <link href="{{asset('css/admin/dt-global_style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('library/datatable/datatables.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/select2.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/custom-switch.css')}}" rel="stylesheet" type="text/css">
    <!-- Page Level Plugin/Style Ends -->
@endsection
@section('js')
    <script src="{{asset('library/datatable/datatables.js')}}"></script>
    <script src="{{asset('js/admin/select2.min.js')}}"></script>
    <script src="{{asset('js/admin/custom-select2.js')}}"></script>
    <script>
        $(document).ready(function () {
            changeImage('image-edit','view-image-edit');
            changeImage('image','view-image');

            function changeImage(inputId, viewId) {
                $(document).on('change', '#' + inputId, function () {
                    $('form#create-slider .text-error').remove();
                    var default_src = $('#' + viewId).attr('data-src');
                    const file = this.files[0];
                    const acceptedImageTypes = ['image/gif', 'image/jpeg', 'image/png', 'image/webp'];
                    if (typeof (file) != "undefined" && acceptedImageTypes.includes(file['type'])) {
                        let reader = new FileReader();
                        reader.onload = function (event) {
                            $('#' + viewId).attr("src", event.target.result);
                        };
                        reader.readAsDataURL(file);
                    } else {
                        $('#' + viewId).attr("src", default_src);
                    }
                });
            }

            /** reset form thêm mới */
            $(document).on('click', '.btn-create', function () {
                $('#create-customer')[0].reset();
                $('form#create-customer').find(':checkbox').prop('checked', true);
                $('form#create-customer .text-error').remove();
                $('select[name="districts_id"]').html('');
                $('select[name="districts_id"]').append($('<option>', {
                    value: 0,
                    text: "Chọn"
                }));
                $('#view-image').attr('src', $('#view-image').attr('data-src'));
                $('.btn-store').attr('disabled', false);
            });

            /** Thêm mới */
            $(document).on('click', '.btn-store', function () {
                $('form#create-customer .text-error').remove();
                $('.btn-store').attr('disabled', true);
                $('.tooltip').hide();

                var name = $('form#create-customer input[name="name"]');
                var email = $('form#create-customer input[name="email"]');
                var phone = $('form#create-customer input[name="phone"]');
                var gender = $('form#create-customer input[name="gender"]:checked');
                var birthday = $('form#create-customer input[name="birthday"]');
                var cities_id = $('form#create-customer select[name="cities_id"]');
                var districts_id = $('form#create-customer select[name="districts_id"]');
                var address = $('form#create-customer textarea[name="address"]');
                var company_name = $('form#create-customer input[name="company_name"]');
                var company_tax_code = $('form#create-customer input[name="company_tax_code"]');
                var show = $('form#create-customer input[name="show"]');
                var note = $('form#create-customer textarea[name="note"]');
                var image = $("#image").prop("files")[0];

                var form_data = new FormData();
                //thêm vào trong form data

                form_data.append("image", image);
                form_data.append("name", name.val());
                form_data.append("email", email.val());
                form_data.append("phone", phone.val());
                form_data.append("gender", gender.val());
                form_data.append("birthday", birthday.val());
                form_data.append("cities_id", cities_id.val());
                form_data.append("districts_id", districts_id.val());
                form_data.append("address", address.val());
                form_data.append("company_name", company_name.val());
                form_data.append("company_tax_code", company_tax_code.val());
                form_data.append("note", note.val());
                form_data.append("show", show.is(':checked') ? 1:0);

                $.ajax({
                    url: "{{route('admin.customers.store')}}",
                    method: "post",
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function (output) {
                        $('#modal-create').modal('hide');
                        if (output.success) {
                            var template_customer = $('#template-customer').html();
                            var tmp = $(template_customer).clone();
                            $(tmp).attr('id','row_'+output.customer.id);
                            var img = "{{asset('media/common/no-image.jpg')}}";
                            if(output.customer.image !== "{{\App\Admin\Http\Helpers\Common::noImage}}"){
                                img = "{{asset('media/customers/customer_img')}}";
                                img = img.replace('customer_img', output.customer.image);
                            }
                            $(tmp).find('.customer-image img').attr('src',img);
                            $(tmp).find('.customer-name').html(output.customer.name);
                            $(tmp).find('.customer-email').html('Email: '+output.customer.email);
                            $(tmp).find('.customer-phone').html('SĐT: '+output.customer.phone);
                            $(tmp).find('.customer-cities').html(output.customer.cities_name);
                            $(tmp).find('.btn-edit').attr('data-value',output.customer.id);
                            $(tmp).find('.btn-delete').attr('data-value',output.customer.id);
                            $('#customers tbody').append(tmp);
                            Snackbar.show({
                                text: 'Thêm mới thành công',
                                pos: 'top-center'
                            });
                        } else {
                            Snackbar.show({
                                text: 'Có lỗi xảy ra',
                                pos: 'top-center'
                            });
                        }
                    },
                    error: function (output) {
                        $('.btn-store').attr('disabled', false);
                        var message = output.responseJSON.errors;
                        if (message.name) {
                            name.after(error(message.name));
                        }
                        if (message.phone) {
                            phone.after(error(message.phone));
                        }
                        if (message.email) {
                            email.after(error(message.email));
                        }
                        if (message.address) {
                            address.after(error(message.address));
                        }
                        if (message.company_name) {
                            company_name.after(error(message.company_name));
                        }
                        if (message.company_tax_code) {
                            company_tax_code.after(error(message.company_tax_code));
                        }
                        if (message.note) {
                            note.after(error(message.note));
                        }
                        if (message.districts_id) {
                            districts_id.after(error(message.districts_id));
                        }
                        if (message.cities_id) {
                            cities_id.after(error(message.cities_id));
                        }
                    }
                });
            });

            /** xóa */
            $(document).on('click', '#destroy', function () {
                var id = $(this).attr('data-value');
                var data = {
                    id: id,
                }
                $('.tooltip').hide();
                $.ajax({
                    url: "{{route('admin.customers.destroy')}}",
                    method: "POST",
                    data: data,
                    dataType: "json",
                    success: function (data) {
                        if (data.success) {
                            $('#row_'+id).remove();
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

            /** Form cập nhật */
            $(document).on('click', '.btn-edit', function () {
                $('form#edit-customer')[0].reset();
                $('form#edit-customer .text-error').remove();
                $('select[name="districts_id"]').html('');
                $('select[name="districts_id"]').append($('<option>', {
                    value: 0,
                    text: "Chọn"
                }));
                $('.btn-update').attr('disabled', false);
                var id = $(this).attr('data-value');
                var input = {
                    id: id,
                }
                $.ajax({
                    url: "{{route('admin.customers.edit')}}",
                    method: "POST",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        if (output.success) {
                            $('#modal-edit').modal('show');
                            $('form#edit-customer input[name="name"]').val(output.customer.name);
                            $('form#edit-customer input[name="id"]').val(output.customer.id);
                            $('form#edit-customer input[name="email"]').val(output.customer.email);
                            $('form#edit-customer input[name="phone"]').val(output.customer.phone);
                            var img = "{{asset('media/common/no-image.jpg')}}";
                            if(output.customer.image !== "{{\App\Admin\Http\Helpers\Common::noImage}}"){
                                img = "{{asset('media/customers/customer_img')}}";
                                img = img.replace('customer_img', output.customer.image);
                            }
                            if(output.customer.show === 1){
                                $('form#edit-customer input[name="show"]').attr('checked', true);
                            }
                            else{
                                $('form#edit-customer input[name="show"]').attr('checked', false);
                            }

                            $('#view-image-edit').attr('src',img);
                            $('#view-image-edit').attr('data-src',img);

                            if (output.customer.gender === 1) {
                                $('#female-edit').attr('checked', true);
                            } else {
                                $('#male-edit').attr('checked', true);
                            }
                            $('form#edit-customer input[name="birthday"]').val(output.customer.birthday);
                            $('form#edit-customer select[name="cities_id"]').val(output.customer.cities_id);
                            $('form#edit-customer textarea[name="address"]').val(output.customer.address);
                            $('form#edit-customer input[name="company_name"]').val(output.customer.company_name);
                            $('form#edit-customer input[name="company_tax_code"]').val(output.customer.company_tax_code);
                            $('form#edit-customer textarea[name="note"]').val(output.customer.note);
                            $('form#edit-customer select[name="districts_id"]').html('');
                            $('form#edit-customer select[name="districts_id"]').append($('<option>', {
                                value: 0,
                                text: "Chọn"
                            }));
                            if (output.districts.length > 0) {
                                $.each(output.districts, function () {
                                    $('form#edit-customer select[name="districts_id"]').append($('<option>', {
                                        value: this.id,
                                        text: this.name,
                                        selected: this.id === output.customer.districts_id ? true : false
                                    }));
                                })
                            }
                        } else {
                            Snackbar.show({
                                text: 'Có lỗi xảy ra',
                                pos: 'top-center'
                            });
                        }
                    }
                })
            });

            /** Cập nhật */
            $(document).on('click', '.btn-update', function () {
                $('form#edit-customer .text-error').remove();
                $('.btn-update').attr('disabled', true);
                $('.tooltip').hide();

                var name = $('form#edit-customer input[name="name"]');
                var id = $('form#edit-customer input[name="id"]');
                var email = $('form#edit-customer input[name="email"]');
                var phone = $('form#edit-customer input[name="phone"]');
                var gender = $('form#edit-customer input[name="gender"]:checked');
                var birthday = $('form#edit-customer input[name="birthday"]');
                var cities_id = $('form#edit-customer select[name="cities_id"]');
                var districts_id = $('form#edit-customer select[name="districts_id"]');
                var address = $('form#edit-customer textarea[name="address"]');
                var company_name = $('form#edit-customer input[name="company_name"]');
                var company_tax_code = $('form#edit-customer input[name="company_tax_code"]');
                var show = $('form#edit-customer input[name="show"]');
                var note = $('form#edit-customer textarea[name="note"]');
                var image = $("#image-edit").prop("files")[0];

                var form_data = new FormData();
                //thêm vào trong form data

                form_data.append("image", image);
                form_data.append("id", id.val());
                form_data.append("name", name.val());
                form_data.append("email", email.val());
                form_data.append("phone", phone.val());
                form_data.append("gender", gender.val());
                form_data.append("birthday", birthday.val());
                form_data.append("cities_id", cities_id.val());
                form_data.append("districts_id", districts_id.val());
                form_data.append("address", address.val());
                form_data.append("company_name", company_name.val());
                form_data.append("company_tax_code", company_tax_code.val());
                form_data.append("note", note.val());
                form_data.append("show", show.is(':checked') ? 1:0);

                $.ajax({
                    url: "{{route('admin.customers.update')}}",
                    method: "post",
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function (output) {
                        $('#modal-edit').modal('hide');
                        if (output.success) {
                            var tmp = $('#row_'+output.customer.id);
                            var img = "{{asset('media/common/no-image.jpg')}}";
                            if(output.customer.image !== "{{\App\Admin\Http\Helpers\Common::noImage}}"){
                                img = "{{asset('media/customers/customer_img')}}";
                                img = img.replace('customer_img', output.customer.image);
                            }
                            $(tmp).find('.customer-image img').attr('src',img);
                            $(tmp).find('.customer-name').html(output.customer.name);
                            $(tmp).find('.customer-email').html('Email: '+output.customer.email);
                            $(tmp).find('.customer-phone').html('SĐT: '+output.customer.phone);
                            $(tmp).find('.customer-cities').html(output.customer.cities_name);
                            Snackbar.show({
                                text: 'Cập nhật thành công',
                                pos: 'top-center'
                            });
                        } else {
                            Snackbar.show({
                                text: 'Có lỗi xảy ra',
                                pos: 'top-center'
                            });
                        }
                    },
                    error: function (output) {
                        $('.btn-update').attr('disabled', false);
                        var message = output.responseJSON.errors;
                        if (message.name) {
                            name.after(error(message.name));
                        }
                        if (message.phone) {
                            phone.after(error(message.phone));
                        }
                        if (message.email) {
                            email.after(error(message.email));
                        }
                        if (message.address) {
                            address.after(error(message.address));
                        }
                        if (message.company_name) {
                            company_name.after(error(message.company_name));
                        }
                        if (message.company_tax_code) {
                            company_tax_code.after(error(message.company_tax_code));
                        }
                        if (message.note) {
                            note.after(error(message.note));
                        }
                        if (message.cities_id) {
                            cities_id.after(error(message.cities_id));
                        }
                        if (message.districts_id) {
                            districts_id.after(error(message.districts_id));
                        }
                    }
                });
            });

            /** Thay đổi tỉnh thành*/
            $(document).on('change', 'select[name="cities_id"]', function () {
                var city_id = $(this).val();
                var input = {
                    city_id: city_id,
                };
                $.ajax({
                    async: true,
                    url: "{{route('admin.customers.load_district')}}",
                    method: "post",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        $('select[name="districts_id"]').html('');
                        $('select[name="districts_id"]').append($('<option>', {
                            value: 0,
                            text: "Chọn"
                        }));
                        if (output.districts.length > 0) {
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

            $('#cities').select2({
                width: '100%',
                dropdownParent: $("#modal-create")
            });

            $('#cities-edit').select2({
                width: '100%',
                dropdownParent: $("#modal-edit")
            });
        });
    </script>
@endsection
