<script id="template_menu" type="text/x-custom-template">
    <li class="menu-item menu-item-page menu-item-edit-inactive">
        <div class="menu-item-bar">
            <div class="menu-item-handle ui-sortable-handle">
                <label class="item-title">
                    <span class="menu-item-title text-dark"></span>
                </label>
                <span class="item-controls">
                    <span class="item-order hide-if-js">
                        <a class="item-move-up" aria-label="Di chuyển lên">↑</a>|<a
                            class="item-move-down" aria-label="Di chuyển xuống">menu-item-title↓</a>
                    </span>
                    <a class="item-edit" href="javascript:void(0);">
                        <span class="screen-reader-text">Chỉnh sửa</span>
                    </a>
                </span>
            </div>
        </div>

        <div class="menu-item-settings wp-clearfix">
            <div class="description description-wide">
                <p class="m-0">Tên liên kết</p>
                <input type="text" class="widefat edit-menu-item-name">
            </div>
            <div class="menu-item-actions description-wide submitbox">
                <div>
                    <p class="m-0">URL</p>
                    <input type="text"class="widefat edit-menu-item-url" placeholder="Http://">
                </div>
                <div class="mt-2">
                    <p class="m-0">HTML</p>
                    <textarea class="widefat edit-menu-item-html-field"></textarea>
                </div>
                <div class="mt-2">
                    <a class="item-delete submitdelete deletion"
                       href="javascript:void(0);">Xóa bỏ</a>
                    <span class="meta-sep hide-if-no-js"> | </span>
                    <a class="item-cancel submitcancel hide-if-no-js"
                       href="javascript:void(0);">Hủy</a>
                </div>
            </div>

            <input class="menu-item-data-db-id" type="hidden"
                   name="menu_item_db_id[]">
            <input class="menu-item-data-parent-id" type="hidden">
            <input class="menu-item-data-position" type="hidden">
            <input class="menu_item_depth" type="hidden">
        </div>
        <ul class="menu-item-transport" style=""></ul>
    </li>
</script>
