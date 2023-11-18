<?php

namespace App\Admin\Services\Production;

use App\Admin\Exports\ProductExport;
use App\Admin\Http\Helpers\Common;
use App\Admin\Imports\ImportProducts;
use App\Admin\Models\ProductCategory;
use App\Admin\Models\Product;
use App\Admin\Models\ProductAlbum;
use App\Admin\Models\ProductDetail;
use App\Admin\Models\Tag;
use App\Admin\Services\Interfaces\ProductServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductService extends BaseService implements ProductServiceInterface
{
    public function index($request)
    {
        $search = $request->search;
        $categoryId = $request->categoryId;
        $orderBy = $request->orderBy ?? 'created_at';
        $limit = $request->limit ?? 10;
        $product = Product::when($categoryId, function ($query) use ($categoryId) {
            $query->whereReLation('ProductCategory', 'category_id', $categoryId);
        })
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
                $query->orwhere('code', 'like', '%' . $search . '%');
            })->orderby($orderBy ?? 'created_at')->paginate($limit);
        $product->appends(['search' => $search, 'orderBy' => $orderBy, 'category_id' => $categoryId, 'limit' => $limit]);

        $data = ProductCategory::all();
        $productCategory = [];
        Common::recursive($data, 0, 0, $productCategory);

        return view('admin.content.product.index', compact('product', 'productCategory'));
    }

    public function store($request)
    {
        $price = preg_replace('/[^0-9\-]/', '', $request->price);
        $cost = preg_replace('/[^0-9\-]/', '', $request->cost);
        $price_market = preg_replace('/[^0-9\-]/', '', $request->price_market);

        $input = [
            'name' => $request->name,
            'code' => $request->code,
            'slug' => $request->slug,
            'cost' => intval($cost),
            'price' => intval($price),
            'price_market' => intval($price_market),
            'show' => $request->has('show'),
            'user_id' => Auth::id(),
            'warranty' => $request->warranty,
            'price_range' => $request->price_range,
        ];

        try {
            DB::beginTransaction();
            $product = Product::create($input);
            $product->ProductCategory()->sync($request->cat_id);
            DB::commit();
            $this->image($request->image,$product->id);
            Common::createShortUrl($product->slug, 1, null);
            return response()->json(['success' => true, 'product' => $product]);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['success' => false]);
        }
    }

    function image($image, $id)
    {
        if (!empty($image)) {
            foreach ($image as $key => $item) {
                $product = Product::find($id);
                $imageName = Str::slug($product->name, '_') . '_' . $key . '_' . time() . '.' . $item->extension();
                $folder_small = public_path('media/product/small');
                $folder_medium = public_path('media/product/medium');
                $folder_large = public_path('media/product/large');
                File::ensureDirectoryExists($folder_small);
                File::ensureDirectoryExists($folder_medium);
                File::ensureDirectoryExists($folder_large);
                Common::resizeImage($item, $imageName, Common::imageSize()['product_image_type'] == 1 ? Common::imageSize()['product_image_sm'][0]:150 ,
                    Common::imageSize()['product_image_type'] == 1 ? Common::imageSize()['product_image_sm'][1]:300, $folder_small);
                Common::resizeImage($item, $imageName, Common::imageSize()['product_image_type'] == 1 ? Common::imageSize()['product_image_md'][0]:150 ,
                    Common::imageSize()['product_image_type'] == 1 ? Common::imageSize()['product_image_md'][1]:300, $folder_medium);
                Common::resizeImage($item, $imageName, Common::imageSize()['product_image_type'] == 1 ? Common::imageSize()['product_image_lg'][0]:150 ,
                    Common::imageSize()['product_image_type'] == 1 ? Common::imageSize()['product_image_lg'][1]:300, $folder_large);
                $product->ProductAlbum->create(['image' => $imageName]);
                if ($product->image != Common::noImage) {
                    $product->ProductAlbum->create(['image' => $imageName]);
                } else {
                    $product->update(['image' => $imageName]);
                }
            }
        }
    }

    public function edit($request)
    {
            $product = Product::find($request->id);
            if($product){
                return view('admin.content.product.edit', compact('product'));
            }else{
                abort(404);
            }
    }

    public function editCategory($request)
    {
        $product = Product::find($request->id);
        if ($product) {
            return view('admin.content.product.edit_category', compact('product'));
        } else {
            abort(404);
        }
    }

    public function editImage($request)
    {
        $product = Product::find($request->id);
        $productAlbum = $product->ProductAlbum;
        if ($product) {
            return view('admin.content.product.edit_image', compact('product', 'productAlbum'));
        } else {
            abort(404);
        }
    }

    public function editTag($request)
    {
        $product = Product::find($request->id);
        $tagsUsed = $product->Tags->pluck('id')->all();
        $tags = Tag::all();
        if ($product) {
            return view('admin.content.product.edit_tag', compact('product', 'tags', 'tagsUsed'));
        } else {
            abort(404);
        }
    }

    public function editVariant($request)
    {
        $product = Product::find($request->id);
        if ($product) {
            return view('admin.content.product.edit_variant', compact('product'));
        } else {
            abort(404);
        }
    }

    public function editAttribute($request)
    {
        $product = Product::find($request->id);
        $category_products = $product->CategoryProducts;
        $arr_attribute = [];
        foreach ($category_products as $itemCategory) {
            foreach ($itemCategory->Attributes as $itemAttribute) {
                $arr_attribute[] = $itemAttribute->id;
            }
        }
        $arr_attribute = array_unique($arr_attribute);
        $attribute = Attribute::whereIn('id', $arr_attribute)->get();
        $attribute_has = [];
        foreach ($product->Attributes as $item) {
            $attribute_has[] = $item->id;
        }
        if ($product) {
            return view('admin.content.product.edit_attribute', compact('product', 'attribute', 'attribute_has'));
        } else {
            abort(404);
        }
    }

    public function editDetail($request)
    {
        $product = Product::find($request->id);
        $productDetail = $product->ProductDetail;
        if ($product) {
            return view('admin.content.product.edit_detail', compact('product', 'productDetail'));
        } else {
            abort(404);
        }
    }

    public function updateAttribute($request)
    {
        try {
            $product = Product::find($request->product_id);
            if ($request->status == 1) {
                $product->Attributes()->attach($request->attribute_id);
            } else {
                $product->Attributes()->detach($request->attribute_id);
            }
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function updateDetail($request)
    {
        try {
            $product = Product::find($request->product_id);
            $input = [
                'product_id' => $request->product_id,
                'meta_title' => $request->meta_title,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
                'description' => $request->description,
            ];
            if ($product->ProductDetail) {
                $product->ProductDetail->update($input);
            } else {
                ProductDetail::create($input);
            }
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function updateTag($request)
    {
        try {
            $product = Product::find($request->id);
            $product->Tags()->detach();
            if (!empty($request->tags)) {
                foreach ($request->tags as $item) {
                    $tag = Tag::find($item);
                    if ($tag) {
                        $product->Tags()->attach($item, ['type' => 1]);
                    } else {
                        $slug = Str::slug($item, '-');
                        $countTag = Tag::where('name', $item)->where('slug', $slug)->count();
                        if ($countTag < 1) {
                            $input = [
                                'name' => $item,
                                'slug' => $slug,
                            ];
                            $newTag = Tag::create($input);
                            $product->Tags()->attach($newTag->id, ['type' => 1]);
                        }
                    }
                }
            }
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function updateVariant($request)
    {
        try {
            $input = [
                'name' => $request->name,
                'price' => intval($request->price),
                'products_id' => intval($request->id),
            ];
            Variant::create($input);
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function destroyVariant($request)
    {
        try {
            Variant::find($request->id)->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function loadCategory($request)
    {
        $product_id = $request->id;
        $data = ProductCategory::get();
        $categoryProducts = [];
        Common::recursive($data, 0, 1, $categoryProducts);
        $product = Product::find($request->id);
        $added = [];
        foreach ($product->CategoryProducts as $item) {
            array_push($added, $item->id);
        }
        $hasChild = [];
        foreach ($categoryProducts as $item) {
            if ($item->children->count()) {
                array_push($hasChild, $item->id);
            }
        }
        return response()->json(['success' => true, 'product_id' => $product_id, 'categoryProducts' => $categoryProducts, 'hasChild' => $hasChild, 'added' => $added]);
    }

    public function loadImage($request)
    {
        $product = Product::select('id', 'image')->find($request->id);
        $productAlbum = $product->ProductAlbum;
        return response()->json(['success' => true, 'product' => $product, 'productAlbum' => $productAlbum]);
    }

    public function uploadImage($request)
    {
        try {
            $product = Product::find($request->id);
            // nếu chưa có ảnh chính thì
            $folder = public_path('media/products');
            $folder_small = public_path('media/products/small');
            $folder_medium = public_path('media/products/medium');
            $folder_large = public_path('media/products/large');
            File::ensureDirectoryExists($folder);
            File::ensureDirectoryExists($folder_small);
            File::ensureDirectoryExists($folder_medium);
            File::ensureDirectoryExists($folder_large);

            foreach ($request->album as $key => $item) {
                $domain = '';
                if (Common::imageSize()['product_image_license'] == 1) {
                    $domain = parse_url(config('app.url'), PHP_URL_HOST);
                }
                $nameImage = Str::slug($product->name, '_') . '_' . $domain . '_' . time() . '.' . $item->extension();

                if ($product->image == Product::noImage) {
                    if ($key == 0) {
                        $product->update(['image' => $nameImage]);
                    } else {
                        $input = [
                            'product_id' => $request->id,
                            'name' => $nameImage,
                        ];
                        ProductAlbum::create($input);
                    }
                } else {
                    $input = [
                        'product_id' => $request->id,
                        'name' => $nameImage,
                    ];
                    ProductAlbum::create($input);
                }
                if ($request->hasFile('image')) {
                    if (Common::imageSize()['product_image_type'] == 1) {
                        Common::resizeImage($request->image, $nameImage, Common::imageSize()['product_image_sm'][0], Common::imageSize()['product_image_sm'][1], $folder_small);
                        Common::resizeImage($request->image, $nameImage, Common::imageSize()['product_image_md'][0], Common::imageSize()['product_image_md'][1], $folder_medium);
                        Common::resizeImage($request->image, $nameImage, Common::imageSize()['product_image_lg'][0], Common::imageSize()['product_image_lg'][1], $folder_large);
                    } else {
                        Common::resizeFitImage($item, Common::imageSize()['product_image_sm'][0], Common::imageSize()['product_image_sm'][1], $nameImage, $folder_small);
                        Common::resizeFitImage($item, Common::imageSize()['product_image_md'][0], Common::imageSize()['product_image_md'][1], $nameImage, $folder_medium);
                        Common::resizeFitImage($item, Common::imageSize()['product_image_lg'][0], Common::imageSize()['product_image_lg'][1], $nameImage, $folder_large);
                    }
                    Common::uploadImage($item, $nameImage, $folder);
                }
            }
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function deleteImage($request)
    {
        try {
            $product = Product::find($request->id);
            if ($product->image == $request->image) {
                if ($product->ProductAlbum->count()) {
                    $image = $product->ProductAlbum->first();
                    $product->update(['image' => $image->name]);
                    $image->delete();
                } else {
                    $product->update(['image' => Product::noImage]);
                }
            } else {
                ProductAlbum::where('name', $request->image)->delete();
            }

            $folder = public_path('media/products');
            $folder_small = public_path('media/products/small');
            $folder_medium = public_path('media/products/medium');
            $folder_large = public_path('media/products/large');
            Common::deleteImage($request->image, $folder);
            Common::deleteImage($request->image, $folder_small);
            Common::deleteImage($request->image, $folder_medium);
            Common::deleteImage($request->image, $folder_large);
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function updateImage($request)
    {
        try {
            $product = Product::find($request->id);
            $input = [
                'name' => $product->image,
                'product_id' => $request->id,
            ];
            ProductAlbum::create($input);
            $product->update(['image' => $request->image]);
            ProductAlbum::where('name', $request->image)->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function loadAlbum($request)
    {
        $product = Product::find($request->product_id);
        $used = [];
        if ($product->image != Product::noImage) {
            $used[] = $product->image;
        }
        if ($product->ProductAlbum->count()) {
            foreach ($product->ProductAlbum as $item) {
                $used[] = $item->name;
            }
        }
        $sortby = $request->sortby;
        $fileManagers = FileManagers::where('type_media', $sortby)->paginate(Common::page_limit());
        return response()->json(['fileManagers' => $fileManagers, 'used' => $used]);
    }

    public function uploadFromAlbum($request)
    {
        try {
            $product = Product::find($request->id);
            if ($product->image == Product::noImage) {
                $product->update(['image' => $request->image]);
            } else {
                if ($product->album == Product::noImage) {
                    $product->update(['album' => $request->image]);
                } else {
                    if (str_contains($product->album, $request->image) == false) {
                        $product->update(['album' => $product->album . ',' . $request->image]);
                    }
                }
            }
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function updateCategory($request)
    {
        if ($request->status == 1) {
            Product::find($request->product_id)->CategoryProducts()->attach($request->category_product_id);
        } else {
            Product::find($request->product_id)->CategoryProducts()->detach($request->category_product_id);
        }
        return response()->json(['success' => true]);
    }

    public function update($request)
    {
        $price = preg_replace('/[^0-9\-]/', '', $request->price);
        $price_promotion = preg_replace('/[^0-9\-]/', '', $request->price_promotion);
        $cost = preg_replace('/[^0-9\-]/', '', $request->cost);
        $market_price = preg_replace('/[^0-9\-]/', '', $request->market_price);
        $quantity_alert = preg_replace('/[^0-9\-]/', '', $request->quantity_alert);
        $weight = preg_replace('/[^0-9\-]/', '', $request->weight);

        $input = [
            'name' => $request->name,
            'code' => $request->code,
            'model' => $request->model,
            'slug' => $request->slug,
            'types_id' => $request->types_id,
            'weight' => intval($weight),
            'barcode' => $request->barcode,
            'serial_no' => $request->serial_no,
            'cost' => intval($cost),
            'price' => intval($price),
            'market_price' => intval($market_price),
            'taxes_id' => intval($request->taxes_id),
            'quantity_alert' => intval($quantity_alert),
            'special_promotion' => $request->special_promotion,
            'start_promotion' => $request->start_promotion,
            'end_promotion' => $request->end_promotion,
            'price_promotion' => intval($price_promotion),
            'status' => $request->has('status'),
            'show' => $request->has('show'),
            'brands_id' => intval($request->brands_id),
            'units_id' => intval($request->units_id),
            'users_id' => Auth::id(),
            'currency' => $request->currency,
            'warranty' => $request->warranty,
            'price_range' => $request->price_range,
        ];
        try {
            DB::beginTransaction();
            $product = Product::find($request->id);
            Common::updateShortUrl($product->slug, $request->slug, null);
            $product->update($input);
            $product->Branches()->sync($request->branches_id);
            DB::commit();
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['success' => false]);
        }
    }

    public function restore($request)
    {
        try {
            $productTrashed = Product::withTrashed()->find($request->id);
            DB::beginTransaction();
            $productTrashed->restore();
            DB::commit();
            return response()->json(['success' => true, 'product' => $productTrashed]);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['success' => false]);
        }
    }

    public function destroy($request)
    {
        try {
            Product::find($request->id)->delete();
            $product = Product::withTrashed()->find($request->id);
            Common::deleteShortUrl($product->slug);
            return response()->json(['success' => true, 'product' => $product]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function changeStatus($request)
    {
        try {
            Product::find($request->id)->update(['status' => $request->status]);
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function changeShow($request)
    {
        try {
            Product::find($request->id)->update(['show' => $request->status]);
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function show($request)
    {
        $product = Product::select('products.*', DB::raw('units.name as unit'), DB::raw('brands.name as brand')
            , DB::raw('taxes.name as tax'))
            ->leftjoin('units', 'products.units_id', 'units.id')
            ->leftjoin('brands', 'products.brands_id', 'brands.id')
            ->leftjoin('taxes', 'products.taxes_id', 'taxes.id')
            ->withTrashed()->find($request->id);

        $album = $product->ProductAlbum;
        if (!empty($product)) {
            return response()->json(['success' => true, 'product' => $product, 'album' => $album]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function loadVariant($request)
    {
        $variants = Variant::where('products_id', $request->id)->get();
        return response()->json(['success' => true, 'variants' => $variants]);
    }

    public function export()
    {
        return Excel::download(new ProductExport(), 'products.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }

    public function import($request)
    {
        try {
            JobProductImage::truncate();
            if ($request->hasFile('file')) {
                Excel::import(new ImportProducts(), $request->file);
            }
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function ProductImageImport()
    {
        try {
            $import_img = JobProductImage::where('status', 1)->limit(50)->get();
            $folder_small = public_path('media/products/small');
            $folder_medium = public_path('media/products/medium');
            $folder_large = public_path('media/products/large');
            File::ensureDirectoryExists($folder_small);
            File::ensureDirectoryExists($folder_medium);
            File::ensureDirectoryExists($folder_large);
            File::ensureDirectoryExists(public_path('media/import'));
            foreach ($import_img as $item) {
                $data_import = JobProductImage::where('code', $item->code)->first();
                if ($data_import) {
                    $count_err = 0;
                    $products = Product::where('code', $data_import->code)->first();
                    $album = [];
                    $name_image = "";

                    if ($data_import->image != "") {
                        try {
                            $path = 'media/import/img_' . time() . '_0_.png';
                            $data = $this->file_get_contents_curl(trim(str_replace('http://', 'https://', $data_import->image)));
                            file_put_contents($path, $data);
                            $name_image = $products->slug . time() . "_img_0" . ".png";
                            // sửa ảnh và đẩy vào thư mục ảnh sản phẩm
                            Common::resizeImageCanvas2($path, $name_image, json_decode(Common::imageSize()['product_image_sm'])[0], json_decode(Common::imageSize()['product_image_sm'])[1], $folder_small);
                            Common::resizeImageCanvas2($path, $name_image, json_decode(Common::imageSize()['product_image_md'])[0], json_decode(Common::imageSize()['product_image_md'])[1], $folder_medium);
                            Common::resizeImageCanvas2($path, $name_image, json_decode(Common::imageSize()['product_image_lg'])[0], json_decode(Common::imageSize()['product_image_lg'])[1], $folder_large);
                            File::move(public_path($path), public_path('media/products/' . $name_image));
                            //xóa ảnh sản phẩm cũ
                            Common::deleteImage($products->image, $folder_small);
                            Common::deleteImage($products->image, $folder_medium);
                            Common::deleteImage($products->image, $folder_large);
                        } catch (\Exception $exception) {
                            $count_err += 1;
                        }
                    }

                    if (!empty(json_decode($data_import->album))) {
                        foreach (json_decode($data_import->album) as $key => $item) {

                            if ($item) {
                                try {
                                    //nếu đường dẫn có ảnh thì đẩy vào folder import lưu trữ tạm thời
                                    $path = 'media/import/img_' . time() . '_' . $key . '_.png';
                                    $data = $this->file_get_contents_curl(trim(str_replace('http://', 'https://', $item)));
                                    file_put_contents($path, $data);
                                    $name_album = $products->slug . time() . "_album_" . $key . ".png";
                                    // sửa ảnh và đẩy vào thư mục ảnh sản phẩm
                                    Common::resizeImageCanvas2($path, $name_album, json_decode(Common::imageSize()['product_image_sm'])[0], json_decode(Common::imageSize()['product_image_sm'])[1], $folder_small);
                                    Common::resizeImageCanvas2($path, $name_album, json_decode(Common::imageSize()['product_image_md'])[0], json_decode(Common::imageSize()['product_image_md'])[1], $folder_medium);
                                    Common::resizeImageCanvas2($path, $name_album, json_decode(Common::imageSize()['product_image_lg'])[0], json_decode(Common::imageSize()['product_image_lg'])[1], $folder_large);
                                    File::move(public_path($path), public_path('media/products/' . $name_album));
                                    array_push($album, $name_album);
                                } catch (\Exception $exception) {
                                    $count_err += 1;
                                }
                            }
                        }
                        foreach ($products->ProductAlbum as $item) {
                            //xóa ảnh sản phẩm cũ
                            Common::deleteImage($item->name, $folder_small);
                            Common::deleteImage($item->name, $folder_medium);
                            Common::deleteImage($item->name, $folder_large);
                        }
                    }

                    try {
                        DB::beginTransaction();
                        if ($name_image != "") {
                            $products->update(['image' => $name_image]);
                            $products->ProductAlbum()->delete();
                            if (!empty($album)) {
                                foreach ($album as $item) {
                                    $input = [
                                        'product_id' => $products->id,
                                        'name' => $item
                                    ];
                                    ProductAlbum::create($input);
                                }
                            }
                        }
                        if ($count_err == 0) {
                            $data_import->delete();
                        } else {
                            $data_import->update(['status' => 4]);
                        }
                        DB::commit();
                    } catch (\Exception $exception) {
                        DB::rollBack();
                    }
                }
            }
        } catch (\Exception $exception) {
        }
    }

    function file_get_contents_curl($url)
    {
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            $userAgent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)';
            curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
            $data = curl_exec($ch);
            if (curl_errno($ch)) {
                $error_message = curl_error($ch);
                echo "Error downloading image from URL: $url ($error_message)\n";
                $data = "";
            }
            curl_close($ch);
            return $data;
        } catch (\Exception $exception) {
        }
    }
}
