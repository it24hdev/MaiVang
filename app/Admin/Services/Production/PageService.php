<?php

namespace App\Admin\Services\Production;

use App\Admin\Http\Helpers\Common;
use App\Admin\Models\Page;
use App\Admin\Services\Interfaces\PageServiceInterface;
use Illuminate\Support\Facades\DB;

class PageService extends BaseService implements PageServiceInterface
{
    public function load()
    {
        $pages = Page::all();
        return response()->json(['success' => true, 'pages' => $pages]);
    }

    public function store($request)
    {
        try {
            $input = [
                'name' => $request->name,
                'slug' => $request->slug,
                'summary' => $request->summary,
                'description' => $request->description,
                'meta_title' => $request->meta_title,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
            ];
            Page::create($input);
            Common::createShortUrl($request->slug, 5,null);
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function edit($request)
    {
        try {
            $page = Page::find($request->id);
            return response()->json(['success' => true, 'page' => $page]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function update($request)
    {
        $page = Page::find($request->id);
        try {
            $input = [
                'name' => $request->name,
                'slug' => $request->slug,
                'summary' => $request->summary,
                'description' => $request->description,
                'meta_title' => $request->meta_title,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
            ];
            DB::beginTransaction();
            Common::updateShortUrl($page->slug, $request->slug,null);
            $page->update($input);
            DB::commit();
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['success' => false]);
        }
    }

    public function destroy($request)
    {
        try {
            $page = Page::find($request->id);
            Common::deleteShortUrl($page->slug);
            $page->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }
}
