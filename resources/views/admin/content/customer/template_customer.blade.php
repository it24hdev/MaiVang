<script id="template-customer" type="text/x-customer-template">
    <tr>
        <td class="text-center customer-id"></td>
        <td class="text-center customer-image">
            <img src="" width="100px" class="object-cover">
        </td>
        <td class="text-left customer-name"></td>
        <td class="text-left">
            <p class="m-0 customer-email"></p>
            <p class="m-0 customer-phone">SĐT: {{$item->phone}}</p>
        </td>
        <td class="text-center customer-cities">
        </td>
        <td class="text-center">
                <a href="javascript:void(0);"
                   class="bs-tooltip font-20 text-primary mr-2 btn-edit"
                   title="Sửa">
                    <i class="las la-edit"></i>
                </a>
                <a href="javascript:void(0);"
                   class="bs-tooltip font-20 text-danger mr-2 btn-delete"
                   title="Xóa" data-toggle="modal" data-target="#modal-delete">
                    <i class="las la-trash-alt"></i>
                </a>
        </td>
    </tr>
</script>
