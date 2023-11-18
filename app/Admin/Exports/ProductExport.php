<?php

namespace App\Admin\Exports;

use App\Admin\Models\Product;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;

class ProductExport implements FromCollection, WithHeadings, WithEvents
{
    public function __construct()
    {
        ini_set('max_execution_time', 1800);
    }
    public function collection()
    {
         $products = Product::select("code", "name", "cost", "price", "market_price", "price_promotion", "warranty","price_range",DB::raw('null as category'),"id")->get();

         foreach ($products as $item)
         {
             $cat = $item->CategoryProducts->pluck('name')->all();
             if(is_array($cat)){
                 $item->category = implode(',',$cat);
             }
         }
         return $products;
    }


    public function headings(): array
    {
        return ["Mã SP", "Tên SP", "Giá nhập","Giá bán","Giá thị trường", "Giá khuyến mại", "Bảo hành", "Khoảng giá","Danh mục","ID","Ảnh", "Trạng thái"];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getColumnDimension('J')->setWidth(0);
            },
        ];
    }
}


