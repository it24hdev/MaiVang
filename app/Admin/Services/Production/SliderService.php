<?php

namespace App\Admin\Services\Production;

use App\Admin\Http\Helpers\Common;
use App\Admin\Models\Position;
use App\Admin\Models\Slider;
use App\Admin\Services\Interfaces\SliderServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SliderService extends BaseService implements SliderServiceInterface
{
    public function index()
    {
        $positions = Position::where('type','slider')->get();
        return view('admin.content.slider.index',compact('positions'));
    }

    public function load(){
        $sliders = Slider::select('sliders.*','positions.name as position')->leftjoin('positions','sliders.position_id','positions.id')->get();
        return response()->json(['sliders' => $sliders]);
    }

    public function store($request)
    {
        $nameImageWeb = $nameImageMobile = Slider::noImage;
        if ($request->hasFile('image_web')) {
            $nameImageWeb = Str::slug($request->name,'_') . '_' . time() . '.' . $request->image_web->extension();
         }
        if ($request->hasFile('image_mobile')) {
            $nameImageMobile = Str::slug($request->name,'_') . '_mobile_' . time() . '.' . $request->image_mobile->extension();
        }
        try {
            $input = [
                'name' => $request->name,
                'slug' => $request->slug,
                'image_web' => $nameImageWeb,
                'image_mobile' => $nameImageMobile,
                'order_number' => $request->order_number,
                'position_id' => $request->position_id,
                'status' => $request->status,
            ];
            Slider::create($input);
           $folderWeb = public_path('media/sliders/web');
           $folderMobile = public_path('media/sliders/mobile');
           File::ensureDirectoryExists($folderWeb);
           File::ensureDirectoryExists($folderMobile);
           if ($request->hasFile('image_web')) {
               Common::uploadImage($request->image_web, $nameImageWeb, $folderWeb);
           }
           if ($request->hasFile('image_mobile')) {
               Common::uploadImage($request->image_mobile, $nameImageMobile, $folderMobile);
           }
           return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function edit($request)
    {
        try {
            $sliders = Slider::find($request->id);
            return response()->json(['success' => true, 'sliders' => $sliders]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function update($request)
    {
        $sliders = Slider::find($request->id);
        $nameOldImageWeb = $sliders->image_web;
        $nameOldImageMobile = $sliders->image_mobile;
        if ($request->hasFile('image_web')) {
            $nameImageWeb = Str::slug($request->name,'_') . '_' . time() . '.' . $request->image_web->extension();
        }
        else{
            $nameImageWeb = $nameOldImageWeb;
        }
        if ($request->hasFile('image_mobile')) {
            $nameImageMobile = Str::slug($request->name,'_') . '_mobile_' . time() . '.' . $request->image_mobile->extension();
        }
        else{
            $nameImageMobile = $nameOldImageMobile;
        }

        try {
            $input = [
                'name' => $request->name,
                'slug' => $request->slug,
                'image_web' => $nameImageWeb,
                'image_mobile' => $nameImageMobile,
                'order_number' => $request->order_number,
                'position_id' => $request->position_id,
                'status' => $request->status,
            ];
            $sliders->update($input);
            $folderWeb = public_path('media/sliders/web');
            $folderMobile = public_path('media/sliders/mobile');
            File::ensureDirectoryExists($folderWeb);
            File::ensureDirectoryExists($folderMobile);
            if ($request->hasFile('image_web')) {
                Common::deleteImage($nameOldImageWeb, $folderWeb);
                Common::uploadImage($request->image_web, $nameImageWeb, $folderWeb);
            }
            if ($request->hasFile('image_mobile')) {
                Common::deleteImage($nameOldImageMobile, $folderMobile);
                Common::uploadImage($request->image_mobile, $nameImageMobile, $folderMobile);
            }
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function destroy($request)
    {
        $slider = Slider::find($request->id);
        try {
            $folderWeb = public_path('media/sliders/web');
            $folderMobile = public_path('media/sliders/mobile');
            DB::beginTransaction();
            Common::deleteImage($slider->image_web, $folderWeb);
            Common::deleteImage($slider->image_mobile, $folderMobile);
            $slider->delete();
            DB::commit();
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['success' => false]);
        }
    }
}
