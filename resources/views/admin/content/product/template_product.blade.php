<script id="template-product" type="text/x-customer-template">
    <tr id="">
        <td class="text-center">
            <p class="m-0 product-text product-serial"></p>
        </td>
        <td class="text-center product-images"><i
                class="las la-gift font-35"></i></td>
        <td class="text-left">
            <a href="javascript:void(0);"
               class="product-name product-text text-primary btn-show-info">
            </a>
            <p class="product-categories product-text m-0">
                Danh mục: <a href="javascript:void(0)" class="text-primary"></a>
            </p>
            <p class="product-text m-0">Mã SP:<span class="text-primary product-code"><ins></ins></span>
                | Kho: <span class="product-warehouse text-primary"><ins></ins></span>
                | Hãng:<span class="product-brand text-primary"><ins></ins></span></span>
            </p>
            <p class="product-updated-at product-text m-0"></p>
        </td>
        <td class="text-left">
            <p class="m-0 product-text">-Xem:</p>
            <p class="m-0 product-text">-Thích:</p>
            <p class="m-0 product-text">-Mua:</p>
        </td>
        <td class="text-left">
            <p class="m-0 product-text product-price"></p>
            <p class="m-0 product-text product-market-price"></p>
        </td>
        <td class="text-left">
            <p class="m-0 product-text product-warranty"></p>
            <p class="m-0 product-text product-promotion"></p>
        </td>
        <td class="text-center">
            <label
                class="switch switch-primary  m-auto d-block">
                <input type="checkbox"
                       class="btn-show product-show" name="show">
                <span class="slider round"></span>
            </label>
        </td>
        <td class="text-center">
            <a href="javascript:void(0);"
               class="bs-tooltip font-20 text-primary mr-2 btn-edit"
               title="Sửa">
                <i class="las la-edit"></i>
            </a>
            <a href="javascript:void(0);"
               class="bs-tooltip font-20 text-danger mr-2 btn-delete"
               title="Xóa"
               data-toggle="modal"
               data-target="#modal-delete">
                <i class="las la-trash-alt"></i>
            </a>
        </td>
    </tr>
</script>
