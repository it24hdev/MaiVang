@can('create', \App\Admin\Models\Post::class)
    <div id="modal-create" data-backdrop="static"
         data-keyboard="false" class="modal" tabindex="-1" aria-modal="true" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm mới bài viết</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <div class="modal-body py-0">
                    <form id="create-post">
                        <div class="widget-content tab-horizontal-line">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab"
                                       href="#basic-tab" role="tab"
                                       aria-controls="basic-tab" aria-selected="true">Cơ bản</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab"
                                       href="#category-tab" role="tab"
                                       aria-controls="category-tab" aria-selected="false">Danh mục</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab"
                                       href="#seo-tab" role="tab"
                                       aria-controls="seo-tab" aria-selected="false">Seo</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active p-0" id="basic-tab" role="tabpanel"
                                     aria-labelledby="basic-tab">
                                    <div class="row my-2 general-info">
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                            <div class="widget-content widget-content-area pb-0">
                                                <div class="form-group info">
                                                    <label>Loại bài viết</label>
                                                    <select name="type" class="form-control">
                                                        <option value="1" selected>Bài viết</option>
                                                        <option value="2">Video</option>
                                                        <option value="3">Giải pháp</option>
                                                        <option value="4">Ảnh</option>
                                                    </select>
                                                </div>
                                                <div class="form-group info">
                                                    <label>Tiêu đề</label>
                                                    <input type="text" name="name" class="form-control typingInput">
                                                </div>
                                                <div class="form-group info">
                                                    <label>Đường dẫn</label>
                                                    <input type="text" name="slug" class="form-control slugChanged">
                                                </div>
                                                <div class="form-group info">
                                                    <label>Ngày đăng</label>
                                                    <input type="datetime-local" name="published_at" class="form-control" value="{{now()}}">
                                                </div>
                                                <div class="form-group info d-none area-video">
                                                    <label>Video</label>
                                                    <input type="text" name="video" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                            <div class="widget-content widget-content-area pb-0">
                                                <div class="form-group info">
                                                    <label>Thẻ Tag</label>
                                                    <select name="tags[]" class="form-control multiple" multiple>
                                                        @foreach($tags as $item)
                                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group info">
                                                    <label>Thứ tự</label>
                                                    <input type="number" name="number_order" class="form-control" value="0">
                                                </div>
                                                <div class="form-group info">
                                                    <label>Tóm tắt</label>
                                                    <textarea name="summary" class="form-control"></textarea>
                                                </div>
                                                <div class="d-flex justify-content-start">
                                                    <div class="form-group mr-4">
                                                        <p> Trạng thái</p>
                                                        <label
                                                            class="switch switch-primary m-0 d-block position-sticky">
                                                            <input type="checkbox" name="status" checked><span
                                                                class="slider round"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 text-center mt-4">
                                            <div class="form-group align-items-center d-flex justify-content-center">
                                                <label for="post-image">
                                                    <img src="{{asset('media/common/'.\App\Admin\Models\Post::noImage)}}"
                                                         width="150" height="150" id="view-image" class="object-cover"
                                                         data-src="{{asset('media/common/'.\App\Admin\Models\Post::noImage)}}">
                                                </label>
                                                <input type="file" accept="image/*" name="image" id="post-image"
                                                       class="d-none">
                                            </div>
                                            <label class="text-primary">Ảnh đại diện</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group editor-box">
                                            <label class="text-primary">Mô tả</label>
                                            <textarea id="description" name="description" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="category-tab" role="tabpanel"
                                     aria-labelledby="category-tab">
                                    <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <h6><strong>Danh mục bài viết</strong></h6>
                                        <select name="category_post[]" class="form-control" multiple>
                                            @foreach($categoryPosts as $item)
                                                <option value="{{$item->id}}">{{str_repeat('━ ',$item->level).$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="seo-tab" role="tabpanel"
                                     aria-labelledby="seo-tab">
                                    <div class="row my-2 general-info">
                                        <div class="col-12">
                                            <div class="form-group info">
                                                <label>Meta title</label>
                                                <input type="type" class="form-control" name="meta_title">
                                            </div>
                                            <div class="form-group info">
                                                <label>Meta keywords</label>
                                                <input type="type" class="form-control" name="meta_keyword">
                                            </div>
                                            <div class="form-group info">
                                                <label>Meta description</label>
                                                <textarea type="type" class="form-control" name="meta_description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-store">Thêm mới</button>
                </div>
            </div>
        </div>
    </div>
@endcan
