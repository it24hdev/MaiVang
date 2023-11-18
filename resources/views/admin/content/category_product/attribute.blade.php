@can('viewAny', \App\Admin\Models\CategoryProduct::class)
    <div id="modal-attribute" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <div class="modal-body pt-0 ecommerce-table">
                    <div class="table-responsive date-table-container mt-3">
                        <table class="table table-hover" id="attributes">
                            <thead>
                            <tr class="tbl_head">
                                <th class="th-content">STT</th>
                                <th class="th-content">Mã</th>
                                <th class="th-content">Tên thuộc tính</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endcan
