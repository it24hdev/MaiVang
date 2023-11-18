<?php

namespace App\Admin\Imports;

use App\Admin\Models\ProductCategory;
use App\Admin\Models\JobProductImage;
use App\Admin\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImportProducts implements ToCollection, SkipsEmptyRows, WithStartRow, WithChunkReading
{
    use Importable;

    public function chunkSize(): int
    {
        return 200;
    }

    public function __construct()
    {
        ini_set('max_execution_time', 1800);
    }

    public function collection($excel)
    {
        try {
            foreach ($excel as $col) {
                $product = Product::where('code', $col[0])->withTrashed()->first();

                $cat_id = "";
                if (!empty($col[8])) {
                    $code_cat = explode(',', $col[8]);
                    foreach ($code_cat as &$value) {
                        $value = trim($value);
                    }
                    $cat = ProductCategory::whereIn('name', $code_cat)->get();
                    if (!empty($cat)) {
                        $cat_id = $cat->pluck('id')->all();
                    }
                }

                $album = [];
                $image = "";
                if ($col[10]) {
                    foreach (preg_split('/[\r\n]+/', $col[10]) as $key => $item) {
                        if ($item) {
                            if ($key == 0) {
                                $image = $item;
                            }
                            else{
                                array_push($album, $item);
                            }

                        }
                    }
                }
                if (empty($product)) {
                    $input = [
                        'code' => $col[0],
                        'name' => $col[1],
                        'cost' => $col[2],
                        'price' => $col[3],
                        'market_price' => $col[4],
                        'price_promotion' => $col[5],
                        'warranty' => $col[6],
                        'price_range' => $col[7],
                        'slug' => Str::slug($col[1]),
                        'users_id' => Auth::id(),
                    ];
                    DB::beginTransaction();
                    $newProduct = Product::create($input);
                    if($cat_id!=""){
                        $newProduct->CategoryProducts()->attach($cat_id);
                    }
                    if (!empty($col[10]) && $col[11] != 0) {
                        $input_upload_image = [
                            'code' => $col[0],
                            'image' => $image,
                            'album' => json_encode($album),
                            'status' => $col[11],
                        ];
                        JobProductImage::create($input_upload_image);
                    }
                    DB::commit();
                } else {
                    $input = [
                        'name' => $col[1],
                        'cost' => $col[2],
                        'price' => $col[3],
                        'market_price' => $col[4],
                        'price_promotion' => $col[5],
                        'warranty' => $col[6],
                        'price_range' => $col[7],
                        'slug' => Str::slug($col[1]),
                        'users_id' => Auth::id(),
                        'deleted_at' => null,
                    ];

                    DB::beginTransaction();
                    $product->restore();
                    $product->update($input);
                    if($cat_id!=""){
                        $product->CategoryProducts()->sync($cat_id);
                    }
                    if (!empty($col[10]) && $col[11] != 0) {
                        $input_upload_image = [
                            'code' => $col[0],
                            'image' => $image,
                            'album' => json_encode($album),
                            'status' => $col[11],
                        ];
                        JobProductImage::create($input_upload_image);
                    }
                    DB::commit();
                }
            }
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }

    public function startRow(): int
    {
        return 2;
    }
}
