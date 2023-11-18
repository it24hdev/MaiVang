<?php

namespace App\Admin\Services\Production;

use App\Admin\Models\ShortUrl;
use App\Admin\Services\Interfaces\ShortUrlServiceInterface;
use Illuminate\Support\Facades\DB;

class ShortUrlService extends BaseService implements ShortUrlServiceInterface
{
    public function index($request)
    {
        $search = $request->search;
        $short_url = ShortUrl::when($search, function ($query) use ($search){
            $query->where('url_key','like','%'.$search.'%');
        })->paginate(10);
        return view('admin.content.short_url.index', compact('short_url'));
    }

    public function edit($request)
    {
        $short_url = ShortUrl::find($request->id);
        return view('admin.content.short_url.edit', compact('short_url'));
    }

    public function update($request)
    {
        try {
            $input = [
                'url_key' => $request->url_key,
                'redirect_url' => $request->redirect_url,
                'activated_at' => $request->activated_at,
                'deactivated_at' => $request->deactivated_at,
            ];

            $short_url = ShortUrl::find($request->id);
            DB::beginTransaction();
            if($request->type == 1){
                $short_url->Product->update(['slug' => $request->url_key]);
            }
            if($request->type == 2){
                $short_url->Post->update(['slug' => $request->url_key]);
            }
            if($request->type == 3){
                $short_url->CategoryProduct->update(['slug' => $request->url_key]);
            }
            if($request->type == 4){
                $short_url->CategoryPost->update(['slug' => $request->url_key]);
            }
            if($request->type == 5){
                $short_url->Page->update(['slug' => $request->url_key]);
            }
            $short_url->update($input);
            DB::commit();
            return redirect()->route('admin.short_url.index')->with('success','Cập nhật thành công!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('admin.short_url.index')->with('error','Có lỗi xảy ra!');
        }
    }
}
