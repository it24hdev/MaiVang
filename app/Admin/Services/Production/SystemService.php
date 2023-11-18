<?php

namespace App\Admin\Services\Production;

use App\Admin\Models\System;
use App\Admin\Services\Interfaces\SystemServiceInterface;

class SystemService extends BaseService implements SystemServiceInterface
{

    public function index(){
        $systems = System::first();
        return view('admin.content.system.index',compact('systems'));
    }

    public function load(){
       return System::first();
    }

    public function updateProductImageSize($request)
    {
        try {
            $input = [
                'product_image_sm' => json_encode($request->product_image_sm),
                'product_image_md' => json_encode($request->product_image_md),
                'product_image_lg' => json_encode($request->product_image_lg),
                'product_image_license' => $request->product_image_license,
                'product_image_type' => $request->product_image_type,
            ];

            // Tìm bản ghi đầu tiên hoặc tạo một mô hình mới nếu không tồn tại
            $system = System::firstOrNew([]);

            // Cập nhật thông tin mô hình
            $system->fill($input);
            $system->save();

            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function updatePostImageSize($request)
    {
        try {
            $input = [
                'post_image_sm' => json_encode($request->post_image_sm),
                'post_image_md' => json_encode($request->post_image_md),
                'post_image_lg' => json_encode($request->post_image_lg),
                'post_image_license' => $request->post_image_license,
                'post_image_type' => $request->post_image_type,
            ];

            // Tìm bản ghi đầu tiên hoặc tạo một mô hình mới nếu không tồn tại
            $system = System::firstOrNew([]);

            // Cập nhật thông tin mô hình
            $system->fill($input);
            $system->save();

            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }
}
