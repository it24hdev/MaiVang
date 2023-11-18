<?php

namespace App\Admin\Http\Controllers;

use App\Admin\Http\Requests\PostRequest;
use App\Admin\Models\Post;
use App\Admin\Services\Interfaces\PostServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{

    protected $postsService;

    public function __construct(PostServiceInterface $postsService)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {session(['menu' => 'post']);return $next($request);});
        $this->postsService = $postsService;
    }
    public function index(Request $request)
    {
        $this->authorize('viewAny', Post::class);
        return $this->postsService->index($request);
    }

    public function edit(Request $request)
    {
        $this->authorize('update', Post::class);
        return $this->postsService->edit($request);
    }

    public function store(PostRequest $request){
        $this->authorize('create', Post::class);
        return $this->postsService->store($request);
    }

    public function destroy(Request $request){
        $this->authorize('delete', Post::class);
        return $this->postsService->destroy($request);
    }

    public function restore(Request $request){
        $this->authorize('restore', Post::class);
        return $this->postsService->restore($request);
    }

    public function update(PostRequest $request){
        $this->authorize('update', Post::class);
        return $this->postsService->update($request);
    }

    public function resizeImagesInDirectory(){
        $this->rz(public_path('media/posts'),[public_path('media/posts/small')],300,300);
        $this->rz(public_path('media/posts'),[public_path('media/posts/medium')],600,600);
        $this->rz(public_path('media/posts'),[public_path('media/posts/large')],900,900);
        $this->rz(public_path('media/products'),[public_path('media/products/small')],300,300);
        $this->rz(public_path('media/products'),[public_path('media/products/medium')],600,600);
        $this->rz(public_path('media/products'),[public_path('media/products/large')],900,900);
    }

    public function rz($sourceDirectory,$destinationDirectories,$width,$height)
    {

        // Lấy danh sách tệp tin ảnh trong thư mục nguồn
        $files = File::files($sourceDirectory);

        // Duyệt qua từng tệp tin ảnh
        foreach ($files as $file) {
            // Lấy tên tệp tin
            $filename = $file->getFilename();

            // Đường dẫn đầy đủ đến tệp tin nguồn
            $sourcePath = $sourceDirectory . '/' . $filename;

            // Kiểm tra xem tệp tin có phải là ảnh
            if (is_file($sourcePath)) {
            foreach ($destinationDirectories as $destinationDirectory) {
                $destinationPath = $destinationDirectory . '/' . $filename;

                // Tạo thư mục đích nếu chưa tồn tại
                File::ensureDirectoryExists(dirname($destinationPath));

                // Cắt ảnh và lưu vào thư mục đích
                Image::make($sourcePath)->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath,90);
            }
        }
        }
    }


}
