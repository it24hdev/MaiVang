<?php

namespace App\Admin\Services\Production;

use App\Admin\Http\Helpers\Common;
use App\Admin\Models\PostCategory;
use App\Admin\Models\Post;
use App\Admin\Models\Tag;
use App\Admin\Services\Interfaces\PostServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PostService extends BaseService implements PostServiceInterface
{
    public function index($request){
        $limit = Common::page_limit();
        $search = $request->search;
        $type = $request->type;
        $category_id = $request->category_post;
        if($request->limit){
            $limit = $request->limit;
        }
        $sort_by = $request->sort_by;
        $order_by = 'created_at';
        $sort = 'asc';
        if($sort_by == 'name'){
            $order_by = $sort_by;
        }
        if($sort_by == 'published_at'){
            $order_by = $sort_by;
            $sort = 'desc';
        }
        if($search.$sort_by.$type){
            $posts = Post::where(function ($query) use ($search) {
                if ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                }
            })->where(function ($query) use ($sort_by){
                if($sort_by == 'status_1'){
                    $query->where('status',1);
                }
                if($sort_by == 'status_2') {
                    $query->where('status',0);
                }
            })->where(function ($query) use ($type){
                if($type){
                    $query->where('type',$type);
                }
            })
            ->whereHas('CategoryPosts', function ($query) use ($category_id) {
                // Thêm điều kiện lọc theo danh mục
                if ($category_id) {
                    $query->where('category_post_id', $category_id);
                }
            })
            ->orderby($order_by,$sort)->paginate($limit,['*'],'active');

            if ($search) {
                $posts->appends(['search' => $search]);
            }
            if ($limit) {
                $posts->appends(['limit' => $limit]);
            }
            if ($sort_by) {
                $posts->appends(['sort_by' => $sort_by]);
            }
            if ($type) {
                $posts->appends(['type' => $type]);
            }
            if ($category_id) {
                $posts->appends(['category_post' => $category_id]);
            }
        }
        else{
            $posts = Post::paginate(Common::page_limit(),['*'],'active');
        }

        $postsTrashed = Post::onlyTrashed()->paginate(Common::page_limit(),['*'],'disable');
        $data = PostCategory::get();
        $categoryPosts = [];
        Common::recursive($data, 0, 0, $categoryPosts);
        $tags = Tag::all();

        return view('admin.content.post.index', compact('posts','postsTrashed','categoryPosts','tags'));
    }

    public function store($request)
    {
        $nameImage = Post::noImage;
        if ($request->hasFile('image')) {
            $domain = '';
            if (Common::imageSize()['post_image_license'] == 1) {
                $domain = parse_url(config('app.url'), PHP_URL_HOST);
            }
            $nameImage = Str::slug($request->name, '_') . '_' . $domain . '_' . time() . '.' . $request->image->extension();
        }
        try {
            $input = [
                'image' => $nameImage,
                'name' => $request->name,
                'slug' => $request->slug,
                'summary' => $request->summary,
                'published_at' => $request->published_at,
                'number_order' => $request->number_order,
                'description' => $request->description,
                'meta_title' => $request->meta_title,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
                'status' => $request->status,
                'type' => $request->type,
                'video' => $request->video,
                'users_id' => Auth::id(),
            ];
            DB::beginTransaction();
            $post = Post::create($input);
            Common::createShortUrl($request->slug,2, $request->published_at);
            if($request->category_post){
                $post->CategoryPosts()->sync(json_decode($request->category_post));
            }
            if(!empty(json_decode($request->tags))){
                foreach (json_decode($request->tags) as $item){
                    $tag = Tag::find($item);
                    if($tag){
                        $post->Tags()->attach($item,['type' => 2]);
                    }
                    else{
                        $slug = Str::slug($item,'-');
                        $countTag = Tag::where('name',$item)->where('slug',$slug)->count();
                        if($countTag<1){
                            $input = [
                                'name' => $item,
                                'slug' => $slug,
                            ];
                            $newTag = Tag::create($input);
                            $post->Tags()->attach($newTag->id, ['type' => 2]);
                        }
                    }
                }
            }
            $small_folder = public_path('media/posts/small');
            $medium_folder = public_path('media/posts/medium');
            $large_folder = public_path('media/posts/large');
            $folder = public_path('media/posts');
            File::ensureDirectoryExists($small_folder);
            File::ensureDirectoryExists($medium_folder);
            File::ensureDirectoryExists($large_folder);
            if ($request->hasFile('image')) {
                if (Common::imageSize()['post_image_type'] == 1) {
                    Common::resizeImage($request->image, $nameImage, Common::imageSize()['post_image_sm'][0], Common::imageSize()['post_image_sm'][1], $small_folder);
                    Common::resizeImage($request->image, $nameImage, Common::imageSize()['post_image_md'][0], Common::imageSize()['post_image_md'][1], $medium_folder);
                    Common::resizeImage($request->image, $nameImage, Common::imageSize()['post_image_lg'][0], Common::imageSize()['post_image_lg'][1], $large_folder);
                } else {
                    Common::resizeImageCanvas2($request->image, $nameImage, Common::imageSize()['post_image_sm'][0], Common::imageSize()['post_image_sm'][1], $small_folder);
                    Common::resizeImageCanvas2($request->image, $nameImage, Common::imageSize()['post_image_md'][0], Common::imageSize()['post_image_md'][1], $medium_folder);
                    Common::resizeImageCanvas2($request->image, $nameImage, Common::imageSize()['post_image_lg'][0], Common::imageSize()['post_image_lg'][1], $large_folder);
                }
                Common::uploadImage($request->image, $nameImage, $folder);
            }
            DB::commit();
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['success' => false]);
        }
    }

    public function edit($request){
        $post = Post::find($request->id);
        $categoryPosts = array();
        if($post->CategoryPosts){
            $categoryPosts = $post->CategoryPosts->pluck('id')->all();
        }
        $tags = $post->Tags->pluck('id')->all();;
        if($post){
            return response()->json(['success' => true,'post' => $post,'categoryPosts' => $categoryPosts, 'tags' => $tags]);
        }
        else{
            return response()->json(['success' => false]);
        }
    }

    public function destroy($request)
    {
        try {
            $post = Post::find($request->id);
            Common::deleteShortUrl($post->slug);
            $post->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function restore($request){
        try {
            $post = Post::onlyTrashed()->find($request->id);
            $post->restore();
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function update($request)
    {
        $post = Post::find($request->id);
        $nameOldImage = $post->image;
        if ($request->hasFile('image')) {
            $domain = '';
            if (Common::imageSize()['post_image_license'] == 1) {
                $domain = parse_url(config('app.url'), PHP_URL_HOST);
            }
            $nameImage = Str::slug($request->name, '_') . '_' . $domain . '_' . time() . '.' . $request->image->extension();
        } else {
            $nameImage = $nameOldImage;
        }
        try {
            $input = [
                'image' => $nameImage,
                'name' => $request->name,
                'slug' => $request->slug,
                'summary' => $request->summary,
                'published_at' => $request->published_at,
                'number_order' => $request->number_order,
                'description' => $request->description,
                'meta_title' => $request->meta_title,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
                'status' => $request->status,
                'type' => $request->type,
                'video' => $request->video,
                'users_id' => Auth::id(),
            ];
            DB::beginTransaction();
            Common::updateShortUrl($post->slug,$request->slug,$request->published_at);
            $post->update($input);
            if($request->category_post){
                $post->CategoryPosts()->sync(json_decode($request->category_post));
            }
            $post->Tags()->detach();
            if(!empty(json_decode($request->tags))){
                foreach (json_decode($request->tags) as $item){
                    $tag = Tag::find($item);
                    if($tag){
                        $post->Tags()->attach($item,['type' => 2]);
                    }
                    else{
                        $slug = Str::slug($item,'-');
                        $countTag = Tag::where('name',$item)->where('slug',$slug)->count();
                        if($countTag<1){
                            $input = [
                                'name' => $item,
                                'slug' => $slug,
                            ];
                            $newTag = Tag::create($input);
                            $post->Tags()->attach($newTag->id, ['type' => 2]);
                        }
                    }
                }
            }

            $small_folder = public_path('media/posts/small');
            $medium_folder = public_path('media/posts/medium');
            $large_folder = public_path('media/posts/large');
            $folder = public_path('media/posts');
            File::ensureDirectoryExists($small_folder);
            File::ensureDirectoryExists($medium_folder);
            File::ensureDirectoryExists($large_folder);
            if ($request->hasFile('image')) {
                if (Common::imageSize()['post_image_type'] == 1) {
                    Common::resizeImage($request->image, $nameImage, Common::imageSize()['post_image_sm'][0], Common::imageSize()['post_image_sm'][1], $small_folder);
                    Common::resizeImage($request->image, $nameImage, Common::imageSize()['post_image_md'][0], Common::imageSize()['post_image_md'][1], $medium_folder);
                    Common::resizeImage($request->image, $nameImage, Common::imageSize()['post_image_lg'][0], Common::imageSize()['post_image_lg'][1], $large_folder);
                } else {
                    Common::resizeImageCanvas2($request->image, $nameImage, Common::imageSize()['post_image_sm'][0], Common::imageSize()['post_image_sm'][1], $small_folder);
                    Common::resizeImageCanvas2($request->image, $nameImage, Common::imageSize()['post_image_md'][0], Common::imageSize()['post_image_md'][1], $medium_folder);
                    Common::resizeImageCanvas2($request->image, $nameImage, Common::imageSize()['post_image_lg'][0], Common::imageSize()['post_image_lg'][1], $large_folder);
                }

                Common::uploadImage($request->image, $nameImage, $folder);
                Common::deleteImage($nameOldImage, $folder);
                Common::deleteImage($nameOldImage, $small_folder);
                Common::deleteImage($nameOldImage, $medium_folder);
                Common::deleteImage($nameOldImage, $large_folder);
            }
            DB::commit();
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['success' => false]);
        }
    }
}
