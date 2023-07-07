<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExcelExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data= Product::all();
        foreach ($data as $value) {
            if($value->product_status==0){
                $value->product_status='Hiển thị';
            }else{
                $value->product_status='Không hiển thị';
            }
        }
        return $data;
    }
}
