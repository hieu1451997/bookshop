<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;//set time to false
    protected $fillable = ['category_product_id','publisher_id','product_name','product_content','product_desc','product_price','product_quantity','product_sold','product_image','product_status'];
    protected $primaryKey = 'product_id';
    protected $table = 'tbl_product';
    public function categoryproduct(){
        return $this->belongsTo('App\CategoryProduct','category_product_id');
    }

    public function publisher(){
        return $this->belongsTo('App\Publisher','publisher_id');
    }

    public function orderdetails(){
        return $this->hasMany('App\OrderDetails','product_id');
    }
}
