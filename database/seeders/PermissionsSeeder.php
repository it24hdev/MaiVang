<?php

namespace Database\Seeders;

use App\Admin\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::truncate();
        /** Users */
        Permission::create(['id' => '10','name' => 'Người dùng','code' => NULL, 'parent'=>0]);
        Permission::create(['id' => '11','name' => 'Xem danh sách','code' => 'viewAnyUser', 'parent'=>10]);
        Permission::create(['id' => '12','name' => 'Xem chi tiết','code' => 'viewUser', 'parent'=>10]);
        Permission::create(['id' => '13','name' => 'Thêm mới','code' => 'createUser', 'parent'=>10]);
        Permission::create(['id' => '14','name' => 'Cập nhật','code' => 'updateUser', 'parent'=>10]);
        Permission::create(['id' => '15','name' => 'Xóa','code' => 'deleteUser', 'parent'=>10]);
        Permission::create(['id' => '16','name' => 'Khôi phục','code' => 'restoreUser', 'parent'=>10]);


        /** Roles */
        Permission::create(['id' => '20','name' => 'Vai trò','code' => NULL, 'parent'=>0]);
        Permission::create(['id' => '21','name' => 'Xem danh sách','code' => 'viewAnyRole', 'parent'=>20]);
        Permission::create(['id' => '22','name' => 'Xem chi tiết','code' => 'viewRole', 'parent'=>20]);
        Permission::create(['id' => '23','name' => 'Thêm mới','code' => 'createRole', 'parent'=>20]);
        Permission::create(['id' => '24','name' => 'Cập nhật','code' => 'updateRole', 'parent'=>20]);
        Permission::create(['id' => '25','name' => 'Xóa','code' => 'deleteRole', 'parent'=>20]);
        Permission::create(['id' => '26','name' => 'Khôi phục','code' => 'restoreRole', 'parent'=>20]);

        /** Systems */
        Permission::create(['id' => '30','name' => 'Cài đặt','code' => NULL, 'parent'=>0]);
        Permission::create(['id' => '31','name' => 'Xem','code' => 'viewAnySystem', 'parent'=>30]);
        Permission::create(['id' => '32','name' => 'Cập nhật','code' => 'updateSystem', 'parent'=>30]);

        /** Templates */
        Permission::create(['id' => '40','name' => 'Mẫu giao diện website','code' => NULL, 'parent'=>0]);
        Permission::create(['id' => '41','name' => 'Xem danh sách','code' => 'viewAnyTemplate', 'parent'=>40]);
        Permission::create(['id' => '42','name' => 'Thêm mới','code' => 'createTemplate', 'parent'=>40]);
        Permission::create(['id' => '43','name' => 'Cập nhật','code' => 'updateTemplate', 'parent'=>40]);
        Permission::create(['id' => '44','name' => 'xóa','code' => 'deleteTemplate', 'parent'=>40]);
        Permission::create(['id' => '45','name' => 'Khôi phục','code' => 'restoreTemplate', 'parent'=>40]);

        /** TemplateDetails */
        Permission::create(['id' => '50','name' => 'Template file','code' => NULL, 'parent'=>0]);
        Permission::create(['id' => '51','name' => 'Xem danh sách','code' => 'viewAnyTemplateDetail', 'parent'=>50]);
        Permission::create(['id' => '52','name' => 'Thêm mới','code' => 'createTemplateDetail', 'parent'=>50]);
        Permission::create(['id' => '53','name' => 'Cập nhật','code' => 'updateTemplateDetail', 'parent'=>50]);
        Permission::create(['id' => '54','name' => 'xóa','code' => 'deleteTemplateDetail', 'parent'=>50]);
        Permission::create(['id' => '55','name' => 'Khôi phục','code' => 'restoreTemplateDetail', 'parent'=>50]);

        /** FileManagers */
        Permission::create(['id' => '60','name' => 'Quản lý Media','code' => NULL, 'parent'=>0]);
        Permission::create(['id' => '61','name' => 'Xem danh sách','code' => 'viewAnyFileManager', 'parent'=>60]);
        Permission::create(['id' => '62','name' => 'Thêm mới','code' => 'createFileManager', 'parent'=>60]);
        Permission::create(['id' => '63','name' => 'Cập nhật','code' => 'updateFileManager', 'parent'=>60]);
        Permission::create(['id' => '64','name' => 'xóa','code' => 'deleteFileManager', 'parent'=>60]);
        Permission::create(['id' => '65','name' => 'Khôi phục','code' => 'restoreFileManager', 'parent'=>60]);

        /** Products */
        Permission::create(['id' => '80','name' => 'Quản lý sản phẩm','code' => NULL, 'parent'=>0]);
        Permission::create(['id' => '81','name' => 'Xem danh sách','code' => 'viewAnyProduct', 'parent'=>80]);
        Permission::create(['id' => '82','name' => 'Xem chi tiết','code' => 'viewProduct', 'parent'=>80]);
        Permission::create(['id' => '83','name' => 'Thêm mới','code' => 'createProduct', 'parent'=>80]);
        Permission::create(['id' => '84','name' => 'Cập nhật','code' => 'updateProduct', 'parent'=>80]);
        Permission::create(['id' => '85','name' => 'xóa','code' => 'deleteProduct', 'parent'=>80]);
        Permission::create(['id' => '86','name' => 'Khôi phục','code' => 'restoreProduct', 'parent'=>80]);

        /** Posts */
        Permission::create(['id' => '90','name' => 'Bài viết','code' => NULL, 'parent'=>0]);
        Permission::create(['id' => '91','name' => 'Xem bài viết','code' => 'viewAnyPost', 'parent'=>90]);
        Permission::create(['id' => '92','name' => 'Cập nhật','code' => 'updatePost', 'parent'=>90]);
        Permission::create(['id' => '93','name' => 'Thêm mới','code' => 'createPost', 'parent'=>90]);
        Permission::create(['id' => '94','name' => 'Xóa','code' => 'deletePost', 'parent'=>90]);
        Permission::create(['id' => '95','name' => 'Khôi phục','code' => 'restorePost', 'parent'=>90]);

        /** Unit */
        Permission::create(['id' => '100','name' => 'Quản lý đơn vị tính','code' => NULL, 'parent'=>0]);
        Permission::create(['id' => '101','name' => 'Xem danh sách','code' => 'viewAnyUnit', 'parent'=>100]);
        Permission::create(['id' => '102','name' => 'Thêm mới','code' => 'createUnit', 'parent'=>100]);
        Permission::create(['id' => '103','name' => 'Cập nhật','code' => 'updateUnit', 'parent'=>100]);
        Permission::create(['id' => '104','name' => 'xóa','code' => 'deleteUnit', 'parent'=>100]);

        /** Tax */
        Permission::create(['id' => '110','name' => 'Quản lý thuế','code' => NULL, 'parent'=>0]);
        Permission::create(['id' => '111','name' => 'Xem danh sách','code' => 'viewAnyTax', 'parent'=>110]);
        Permission::create(['id' => '112','name' => 'Thêm mới','code' => 'createTax', 'parent'=>110]);
        Permission::create(['id' => '113','name' => 'Cập nhật','code' => 'updateTax', 'parent'=>110]);
        Permission::create(['id' => '114','name' => 'xóa','code' => 'deleteTax', 'parent'=>110]);

        /** Branch */
        Permission::create(['id' => '120','name' => 'Quản lý chi nhánh','code' => NULL, 'parent'=>0]);
        Permission::create(['id' => '121','name' => 'Xem danh sách','code' => 'viewAnyBranch', 'parent'=>120]);
        Permission::create(['id' => '122','name' => 'Thêm mới','code' => 'createBranch', 'parent'=>120]);
        Permission::create(['id' => '123','name' => 'Cập nhật','code' => 'updateBranch', 'parent'=>120]);
        Permission::create(['id' => '124','name' => 'xóa','code' => 'deleteBranch', 'parent'=>120]);

        /** Payment Methods */
        Permission::create(['id' => '140','name' => 'Quản lý phương thức thanh toán','code' => NULL, 'parent'=>0]);
        Permission::create(['id' => '141','name' => 'Xem danh sách','code' => 'viewAnyPaymentMethod', 'parent'=>140]);
        Permission::create(['id' => '142','name' => 'Thêm mới','code' => 'createPaymentMethod', 'parent'=>140]);
        Permission::create(['id' => '143','name' => 'Cập nhật','code' => 'updatePaymentMethod', 'parent'=>140]);
        Permission::create(['id' => '144','name' => 'xóa','code' => 'deletePaymentMethod', 'parent'=>140]);

        /** Shipping Methods */
        Permission::create(['id' => '150','name' => 'Quản lý phương thức vân chuyển','code' => NULL, 'parent'=>0]);
        Permission::create(['id' => '151','name' => 'Xem danh sách','code' => 'viewAnyShippingMethod', 'parent'=>150]);
        Permission::create(['id' => '152','name' => 'Thêm mới','code' => 'createShippingMethod', 'parent'=>150]);
        Permission::create(['id' => '153','name' => 'Cập nhật','code' => 'updateShippingMethod', 'parent'=>150]);
        Permission::create(['id' => '154','name' => 'xóa','code' => 'deleteShippingMethod', 'parent'=>150]);

        /** Transport Fee */
        Permission::create(['id' => '160','name' => 'Quản lý phí vận chuyển','code' => NULL, 'parent'=>0]);
        Permission::create(['id' => '161','name' => 'Xem danh sách','code' => 'viewAnyTransportFee', 'parent'=>160]);
        Permission::create(['id' => '162','name' => 'Thêm mới','code' => 'createTransportFee', 'parent'=>160]);
        Permission::create(['id' => '163','name' => 'Cập nhật','code' => 'updateTransportFee', 'parent'=>160]);
        Permission::create(['id' => '164','name' => 'xóa','code' => 'deleteTransportFee', 'parent'=>160]);

        /** Ware House
        /**Permission::create(['id' => '170','name' => 'Quản lý kho','code' => NULL, 'parent'=>0]);
        Permission::create(['id' => '171','name' => 'Xem danh sách','code' => 'viewAnyWareHouse', 'parent'=>170]);
        Permission::create(['id' => '172','name' => 'Thêm mới','code' => 'createWareHouse', 'parent'=>170]);
        Permission::create(['id' => '173','name' => 'Cập nhật','code' => 'updateWareHouse', 'parent'=>170]);
        Permission::create(['id' => '174','name' => 'xóa','code' => 'deleteWareHouse', 'parent'=>170]);
         */

        /** Category Product */
        Permission::create(['id' => '180','name' => 'Danh sách DMSP','code' => NULL, 'parent'=>0]);
        Permission::create(['id' => '181','name' => 'Xem danh sách','code' => 'viewAnyCategoryProduct', 'parent'=>180]);
        Permission::create(['id' => '182','name' => 'Thêm mới','code' => 'createCategoryProduct', 'parent'=>180]);
        Permission::create(['id' => '183','name' => 'Cập nhật','code' => 'updateCategoryProduct', 'parent'=>180]);
        Permission::create(['id' => '184','name' => 'xóa','code' => 'deleteCategoryProduct', 'parent'=>180]);

        /** Brand */
        Permission::create(['id' => '190','name' => 'Quản lý thương hiệu','code' => NULL, 'parent'=>0]);
        Permission::create(['id' => '191','name' => 'Xem danh sách','code' => 'viewAnyBrand', 'parent'=>190]);
        Permission::create(['id' => '192','name' => 'Thêm mới','code' => 'createBrand', 'parent'=>190]);
        Permission::create(['id' => '193','name' => 'Cập nhật','code' => 'updateBrand', 'parent'=>190]);
        Permission::create(['id' => '194','name' => 'xóa','code' => 'deleteBrand', 'parent'=>190]);

        /** Menus */
        Permission::create(['id' => '200','name' => 'Menu','code' => NULL, 'parent'=>0]);
        Permission::create(['id' => '201','name' => 'Xem danh sách','code' => 'viewAnyMenu', 'parent'=>200]);
        Permission::create(['id' => '202','name' => 'Thêm mới','code' => 'createMenu', 'parent'=>200]);
        Permission::create(['id' => '203','name' => 'Cập nhật','code' => 'updateMenu', 'parent'=>200]);

        /** Pages */
        Permission::create(['id' => '210','name' => 'Quản lý trang','code' => NULL, 'parent'=>0]);
        Permission::create(['id' => '211','name' => 'Xem danh sách','code' => 'viewAnyPage', 'parent'=>210]);
        Permission::create(['id' => '212','name' => 'Thêm mới','code' => 'createPage', 'parent'=>210]);
        Permission::create(['id' => '213','name' => 'Cập nhật','code' => 'updatePage', 'parent'=>210]);
        Permission::create(['id' => '214','name' => 'Xóa','code' => 'deletePage', 'parent'=>210]);

        /** Attributes */
        Permission::create(['id' => '220','name' => 'Thuộc tính sản phẩm','code' => NULL, 'parent'=>0]);
        Permission::create(['id' => '221','name' => 'Xem danh sách','code' => 'viewAnyAttribute', 'parent'=>220]);
        Permission::create(['id' => '222','name' => 'Thêm mới','code' => 'createAttribute', 'parent'=>220]);
        Permission::create(['id' => '223','name' => 'Cập nhật','code' => 'updateAttribute', 'parent'=>220]);
        Permission::create(['id' => '224','name' => 'Xóa','code' => 'deleteAttribute', 'parent'=>220]);

        /** Tag */
        Permission::create(['id' => '260','name' => 'Quản lý tag','code' => NULL, 'parent'=>0]);
        Permission::create(['id' => '261','name' => 'Xem danh sách','code' => 'viewAnyTag', 'parent'=>260]);
        Permission::create(['id' => '262','name' => 'Thêm mới','code' => 'createTag', 'parent'=>260]);
        Permission::create(['id' => '263','name' => 'Cập nhật','code' => 'updateTag', 'parent'=>260]);
        Permission::create(['id' => '264','name' => 'Xóa','code' => 'deleteTag', 'parent'=>260]);

        /** Collection */
        Permission::create(['id' => '270','name' => 'Bộ sưu tập','code' => NULL, 'parent'=>0]);
        Permission::create(['id' => '271','name' => 'Xem danh sách','code' => 'viewAnyCollection', 'parent'=>270]);
        Permission::create(['id' => '272','name' => 'Thêm mới','code' => 'createCollection', 'parent'=>270]);
        Permission::create(['id' => '273','name' => 'Cập nhật','code' => 'updateCollection', 'parent'=>270]);
        Permission::create(['id' => '274','name' => 'Xóa','code' => 'deleteCollection', 'parent'=>270]);

        /** Customer */
        Permission::create(['id' => '280','name' => 'Khách hàng','code' => NULL, 'parent'=>0]);
        Permission::create(['id' => '281','name' => 'Xem danh sách','code' => 'viewAnyCustomer', 'parent'=>280]);
        Permission::create(['id' => '282','name' => 'Thêm mới','code' => 'createCustomer', 'parent'=>280]);
        Permission::create(['id' => '283','name' => 'Cập nhật','code' => 'updateCustomer', 'parent'=>280]);
        Permission::create(['id' => '284','name' => 'Xóa','code' => 'deleteCustomer', 'parent'=>280]);

        /** Order */
        Permission::create(['id' => '290','name' => 'Danh sách đơn hàng','code' => NULL, 'parent'=>0]);
        Permission::create(['id' => '291','name' => 'Xem danh sách','code' => 'viewAnyCustomer', 'parent'=>290]);
        Permission::create(['id' => '292','name' => 'Xem chi tiết','code' => 'viewCustomer', 'parent'=>290]);
        Permission::create(['id' => '293','name' => 'Thêm mới','code' => 'createCustomer', 'parent'=>290]);
        Permission::create(['id' => '294','name' => 'Cập nhật','code' => 'updateCustomer', 'parent'=>290]);
        Permission::create(['id' => '295','name' => 'Xóa','code' => 'deleteCustomer', 'parent'=>290]);

        /** Category Post */
        Permission::create(['id' => '300','name' => 'Danh mục bài viết','code' => NULL, 'parent'=>0]);
        Permission::create(['id' => '301','name' => 'Xem danh sách','code' => 'viewAnyCategoryPost', 'parent'=>300]);
        Permission::create(['id' => '302','name' => 'Thêm mới','code' => 'createCategoryPost', 'parent'=>300]);
        Permission::create(['id' => '303','name' => 'Cập nhật','code' => 'updateCategoryPost', 'parent'=>300]);
        Permission::create(['id' => '304','name' => 'Xóa','code' => 'deleteCategoryPost', 'parent'=>300]);

        /** Group Product */
        Permission::create(['id' => '310','name' => 'Nhóm sản phẩm','code' => NULL, 'parent'=>0]);
        Permission::create(['id' => '311','name' => 'Xem danh sách','code' => 'viewAnyGroupProduct', 'parent'=>310]);
        Permission::create(['id' => '312','name' => 'Thêm mới','code' => 'createGroupProduct', 'parent'=>310]);
        Permission::create(['id' => '313','name' => 'Cập nhật','code' => 'updateGroupProduct', 'parent'=>310]);
        Permission::create(['id' => '314','name' => 'Xóa','code' => 'deleteGroupProduct', 'parent'=>310]);

        /** Short Url */
        Permission::create(['id' => '320','name' => 'Danh sách đường dẫn','code' => NULL, 'parent'=>0]);
        Permission::create(['id' => '321','name' => 'Xem danh sách','code' => 'viewAnyShortUrl', 'parent'=>320]);
        Permission::create(['id' => '322','name' => 'Thêm mới','code' => 'createShortUrl', 'parent'=>320]);
        Permission::create(['id' => '323','name' => 'Cập nhật','code' => 'updateShortUrl', 'parent'=>320]);
        Permission::create(['id' => '324','name' => 'Xóa','code' => 'deleteShortUrl', 'parent'=>320]);
    }
}
