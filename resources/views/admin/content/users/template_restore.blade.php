<script id="template_restore" type="text/x-custom-template">
    <tr id="">
        <td class="text-center py-2">
            <div class="login-one-inputs check">
                <input class="inp-cbx d-none" id="" type="checkbox" name="cbx[]" value="">
                <label class="cbx" for="">
                    <span>
                        <svg width="12px" height="10px" viewBox="0 0 12 10">
                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                        </svg>
                    </span>
                </label>
            </div>
        </td>
        <td class="text-left py-2 user-name"></td>
        <td class="text-left py-2 user-email"></td>
        <td class="text-left py-2 user-created-at"></td>
        <td class="text-left py-2 user-last-login-at"></td>
        <td class="text-left py-2 user-last-login-at"></td>
        <td class="text-center py-2">
            <div class="d-flex justify-content-center">
                <a href="" class="bs-tooltip font-20 text-primary ml-2 btn-edit" title="Sửa">
                    <i class="las la-edit"></i>
                </a>
                <a href="javascript:void(0);"
                   class="bs-tooltip font-20 text-danger ml-2 btn-delete"
                   title="Xóa"
                   data-toggle="modal"
                   data-target="#modal-delete"
                   data-value="">
                    <i class="las la-trash-alt"></i>
                </a>
            </div>
        </td>
    </tr>
</script>
