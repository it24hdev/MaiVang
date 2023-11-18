@can('create', \App\Admin\Models\Product::class)
    <div id="album" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Album sản phẩm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="box-collection-product">
                        <div class="widget-content mt-2 profile-tabs">
                            <div class="attachments-wrapper">
                                <ul class="ui-sortable" id="collection-product">
                                </ul>
                            </div>
                        </div>
                        <div class="pagination p13 text-center mt-4">
                            <ul class="mx-auto"></ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endcan
