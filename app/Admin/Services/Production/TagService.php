<?php

namespace App\Admin\Services\Production;

use App\Admin\Models\Tag;
use App\Admin\Services\Interfaces\TagServiceInterface;

class TagService extends BaseService implements TagServiceInterface
{
    public function index(){
        return view('admin.content.tag.index');
    }

    public function load($request)
    {
        $tags = Tag::get();
        return response()->json(['tags' => $tags]);
    }

    public function store($request)
    {
        try {
            $input = [
                'name' => $request->name,
                'slug' => trim($request->slug),
                'description' => $request->description,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
            ];
            Tag::create($input);
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function destroy($request)
    {
        try {
            $tax = tag::find($request->id);
            $tax->Products()->detach();
            $tax->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function edit($request)
    {
        try {
            $tag = Tag::find($request->id);
            return response()->json(['success' => true, 'tag' => $tag]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function update($request)
    {
        try {
            $input = [
                'name' => $request->name,
                'slug' => trim($request->slug),
                'description' => $request->description,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
            ];
            Tag::find($request->id)->update($input);
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }
}
