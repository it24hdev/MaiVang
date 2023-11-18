<?php

namespace App\Admin\Http\Helpers;

use App\Admin\Models\Permission;
use App\Admin\Models\ShortUrl;
use App\Admin\Models\System;
use App\Admin\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
class Common
{
    const noImage = "no-image.jpg";

    /** Hàm upload ảnh*/
    public static function uploadImage($file, $nameImage, $folder)
    {
        $file = $file->move($folder, $nameImage);
        return $file;
    }

    /** Hàm resize ảnh */
    public static function resizeImage($file, $nameImage, $width, $height, $folder)
    {
        $image = Image::make($file->getRealPath())->resize($width, $height,
            function ($constraint) {
                $constraint->aspectRatio();
            });
//            ->resizeCanvas($width, $height);
        $image->save($folder . '/' . $nameImage);
        return true;
    }

    /** Hàm resize fit ảnh */
    public static function resizeFitImage($file, $width, $height, $nameImage, $folder)
    {
        $image = Image::make($file->getRealPath())->fit($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        })->resizeCanvas($width, $height);
        $image->save($folder . '/' . $nameImage);
        return true;
    }

    /** Hàm chuyển tên ảnh upload*/
    public static function imageName($table_name, $name, $extention)
    {
        return $table_name . '_' . Str::slug($name, '_') . '.' . $extention;
    }

    public static function resizeImageCanvas2($path, $nameImage, $width, $height, $folder)
    {
        File::copy($path, $folder . '/' . $nameImage);
        $image = Image::make($path);
        $image_width = $image->width();
        $image_height = $image->height();

        // Nếu kích thước của ảnh nhỏ hơn kích thước cần resize
        if ($image_width < $width && $image_height < $height) {
            $new_width = $image_width;
            $new_height = $image_height;
        } else {
            // Tính toán kích thước mới dựa trên tỷ lệ khung hình
            $ratio = max($width / $image_width, $height / $image_height);
            $new_width = intval($image_width * $ratio);
            $new_height = intval($image_height * $ratio);
        }

        // Resize ảnh
        $image->fit($new_width, $new_height, function ($constraint) {
            $constraint->aspectRatio();
        })->resizeCanvas($width, $height);

        // Lưu ảnh vào thư mục và trả về true nếu thành công
        $image->save($folder . '/' . $nameImage);
        return true;
    }

    /** Hàm xóa ảnh*/
    public static function deleteImage($nameImage, $folder)
    {
        File::delete($folder . '/' . $nameImage);
        return true;
    }

    /** Kiểm tra quyền truy cập chức năng*/
    public static function checkPermission($code)
    {
        $user = User::with('Role.Permission')->find(Auth::id());
        if ($user->admin == 1) {
            return true;
        }
        $listPermissionId = $user->Role->pluck('Permission.*.id')->flatten()->unique()->all();
        return Permission::whereIn('id', $listPermissionId)->where('code', $code)->exists();
    }


    /** Tải thông tin cài đặt*/
    public static function systems()
    {
        return System::find(1);
    }

    /** Cài đặt số bản ghi/trang admin*/
    public static function page_limit()
    {
        return config('system.page_limit');
    }

    /** Cài đặt mặc định tiền tệ */
    public static function default_currency()
    {
        return config('system.default_currency');
    }

    public static function imageSize()
    {
        $product_image_sm = config('system.product_image_sm');
        $product_image_md = config('system.product_image_md');
        $product_image_lg = config('system.product_image_lg');
        $product_image_type = config('system.product_image_type');
        $product_image_license = config('system.product_image_license');
        $post_image_sm = config('system.post_image_sm');
        $post_image_md = config('system.post_image_md');
        $post_image_lg = config('system.post_image_lg');
        $post_image_type = config('system.post_image_type');
        $post_image_license = config('system.post_image_license');

        $system = System::first();

        if ($system) {
            if (json_decode($system->product_image_sm) != [0, 0]) {
                $product_image_sm = json_decode($system->product_image_sm);
            }
            if (json_decode($system->product_image_md) != [0, 0]) {
                $product_image_md = json_decode($system->product_image_md);
            }
            if (json_decode($system->product_image_lg) != [0, 0]) {
                $product_image_lg = json_decode($system->product_image_lg);
            }
            if (json_decode($system->post_image_sm) != [0, 0]) {
                $post_image_sm = json_decode($system->post_image_sm);
            }
            if (json_decode($system->post_image_md) != [0, 0]) {
                $post_image_md = json_decode($system->post_image_md);
            }
            if (json_decode($system->post_image_lg) != [0, 0]) {
                $post_image_lg = json_decode($system->post_image_lg);
            }
            $post_image_type = $system->post_image_type;
            $product_image_type = $system->product_image_type;
            $post_image_license = $system->post_image_license;
            $product_image_license = $system->product_image_license;
        }

        return [
            'product_image_sm' => $product_image_sm,
            'product_image_md' => $product_image_md,
            'product_image_lg' => $product_image_lg,
            'product_image_type' => $product_image_type,
            'product_image_license' => $product_image_license,
            'post_image_sm' => $post_image_sm,
            'post_image_md' => $post_image_md,
            'post_image_lg' => $post_image_lg,
            'post_image_type' => $post_image_type,
            'post_image_license' => $post_image_license,
        ];
    }

    /** Hàm sắp xếp cha con */
    public static function recursive($data, $parents, $level, &$lists)
    {
        if (count($data) > 0) {
            foreach ($data as $key => $item) {
                if ($item->parent == $parents) {
                    $item->level = $level;
                    $lists[] = $item;
                    unset($data[$key]);
                    $parent = $item->id;
                    self::recursive($data, $parent, $level + 1, $lists);
                }
            }
        }
    }

    public static function updateShortUrl($oldSlug, $newSlug,$activated_at)
    {
        $short_url = ShortUrl::where('url_key', $oldSlug)->first();
        if ($short_url) {
            $route = route('home') . '/' . $newSlug;
            $input = [
                'url_key' => $newSlug,
                'default_short_url' => $route,
                'activated_at' => $activated_at ? $activated_at:$short_url->activated_at
            ];
            $short_url->update($input);
        }
    }

    public static function createShortUrl($newSlug, $type,$activated_at)
    {
        $route = route('home') . '/' . $newSlug;
        $input = [
            'type' => $type,
            'url_key' => $newSlug,
            'default_short_url' => $route,
            'activated_at' => $activated_at ? $activated_at:now(),
        ];
        ShortUrl::create($input);
    }

    public static function deleteShortUrl($slug)
    {
        $short_url = ShortUrl::where('url_key', $slug)->first();
        if($short_url){
            $short_url->delete();
        }
    }
}

