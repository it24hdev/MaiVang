<?php

namespace App\Admin\Services\Production;

use App\Admin\Http\Helpers\Common;
use App\Admin\Models\Unit;
use App\Admin\Models\Product;
use App\Admin\Services\Interfaces\UnitServiceInterface;
use Illuminate\Support\Facades\DB;

class UnitService extends BaseService implements UnitServiceInterface
{
    public function load($request)
    {
        $units = Unit::get();
        return response()->json(['units' => $units]);
    }

    public function store($request)
    {
        try {
            $input = [
                'name' => $request->name,
                'description' => $request->description,
            ];
            Unit::create($input);
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function destroy($request)
    {
        try {
            $unit = Unit::find($request->id);
            DB::beginTransaction();
            Product::where('units_id', $request->id)->update(['units_id' => 0]);
            $unit->delete();
            DB::commit();
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['success' => false]);
        }
    }

    public function edit($request)
    {
        try {
            $unit = Unit::find($request->id);
            return response()->json(['success' => true, 'unit' => $unit]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function update($request)
    {
        try {
            $input = [
                'name' => $request->name,
                'description' => $request->description,
            ];
            Unit::find($request->id)->update($input);
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }
}
