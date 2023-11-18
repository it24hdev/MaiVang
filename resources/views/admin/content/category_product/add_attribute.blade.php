@extends('admin.layouts.iframe')
@section('body')
    @can('update', \App\Admin\Models\CategoryProduct::class)
        <h5 class="mx-3">Lựa chọn thuộc tính</h5>
        <div class="table-responsive date-table-container ecommerce-table">
            <table class="table table-hover" id="Attribute">
                <thead>
                <tr class="tbl_head">
                    <th class="th-content">STT</th>
                    <th class="th-content">Mã</th>
                    <th class="th-content">Thuộc tính</th>
                    <th class="th-content">Chức năng</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    @endcan
@endsection
@section('css')
    <link href="{{asset('css/admin/dt-global_style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('library/datatable/datatables.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('js')
    <script src="{{asset('library/datatable/datatables.js')}}"></script>
    <script src="{{asset('library/datatable/datatables.buttons.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            load({{$attribute}});
            function load(id) {
                $('.tooltip').hide();
                $.ajax({
                    async: true,
                    url: "{{route('admin.category_products.load_add_attribute')}}",
                    data:{
                        id:id,
                    },
                    method: "post",
                    dataType: "json",
                    success: function (output) {
                        $('#Attribute').DataTable().destroy();
                        $('#Attribute').DataTable({
                            data: output.attribute,
                            columns: [
                                {
                                    data: 'id',
                                    render: function (data, type, row, meta) {
                                        return meta.row + meta.settings._iDisplayStart + 1;
                                    }
                                },
                                {data: 'code'},
                                {data: 'name'},
                                {
                                    data: 'id',
                                    render: function (data) {
                                        return '<a href="javascript:void(0);" class="bs-tooltip font-20 text-primary ml-2 btn-add" data-value="'+data+'" data-category-product="'+id+'" title="Thêm mới" data-original-title="Thêm mới"><i class="las la-plus-circle"></i></a>';
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
                                {className: 'text-center', targets: [0, 3]},
                                {className: 'text-left', targets: [1, 2]},
                            ],
                            lengthMenu: [10, 25, 50, 100],
                            pageLength: 10,
                        });
                    }
                });
            }
            $(document).on('click', '.btn-add', function () {
                var attribute_id = $(this).attr('data-value');
                var category_product_id = $(this).attr('data-category-product');
                var input = {
                    attribute_id:attribute_id,
                    category_product_id:category_product_id,
                };
                $this_btn = $(this);
                $.ajax({
                    async: true,
                    url: "{{route('admin.category_products.adding_attribute')}}",
                    data: input,
                    method: "post",
                    dataType: "json",
                    success: function (output) {
                        if(output.success){
                            $this_btn.html('Đã thêm');
                            $this_btn.removeClass('font-20');
                        }
                        else{
                            $this_btn.html('Lỗi');
                            $this_btn.removeClass('font-20');
                        }
                    }
                });
            });
        });
    </script>
@endsection
