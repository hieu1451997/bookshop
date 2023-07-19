<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ExcelImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'category_product_id'=>$row[0],
            'publisher_id'=>$row[1],
            'product_name'=>$row[2],
            'product_content'=>$row[3],
            'product_desc'=>$row[4],
            'product_price'=>$row[5],
            'product_quantity'=>$row[6],
            'product_image'=>$row[7],
            'product_status'=>$row[8]
        ]);
    }
}
