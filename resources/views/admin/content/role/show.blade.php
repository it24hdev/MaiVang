@can('view', \App\Admin\Models\Role::class)
<div id="modal-show" class="modal" tabindex="-1" aria-modal="true" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Chi tiết</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="las la-times"></i>
                </button>
            </div>
            <div class="modal-body text-center">
                    <div class="statbox col-12 px-0 ecommerce-table">
                        <div class="widget-content table-responsive">
                            <table class="table table-bordered mb-4">
                                <thead>
                                <tr>
                                    <th class="text-center"><h6>Tính năng</h6></th>
                                    <th class="text-center"><h6>Quyền</h6></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($permissionParents as $itemParent)
                                    <tr>
                                        <td>
                                            <p class="inline-block"><h6>{{ $itemParent->name }}</h6></p>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-wrap align-items-center">
                                            @foreach ($itemParent->permissionChilds as $item)
                                                <div class="form-check my-1 text-nowrap">
                                                    <input class="inp-cbx d-none" type="checkbox" name="permissions[]"
                                                           id="cbx-permission-{{ $item->id }}" value="{{$item->id}}">
                                                    <label class="cbx" for="cbx-permission-{{$item->id}}">
                                                        <span><svg width="12px" height="10px" viewBox="0 0 12 10"> <polyline
                                                                    points="1.5 6 4.5 9 10.5 1"></polyline> </svg></span>
                                                        <span class="text-dark">{{ $item->name }}</span>
                                                    </label>
                                                </div>
                                            @endforeach
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endcan

