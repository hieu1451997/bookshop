<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    public $timestamps = false;//set time to false
    protected $fillable = ['category_product_name','category_product_desc','category_product_status'];
    protected $primaryKey = 'category_product_id';
    protected $table = 'tbl_category_product';
    // quan hệ giữa bảng thể loại và bảng sản phẩm
    public function product(){
        return $this->hasMany('App\Product','category_product_id');
    }
}
