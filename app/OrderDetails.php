<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    
    public $timestamps = false;//set time to false
    protected $fillable = ['order_code','product_id','product_name','product_price','product_quantity','created_at'];
    protected $primaryKey = 'order_details_id';
    protected $table = 'tbl_order_details';
    
    public function order(){
        return $this->belongsTo('App\Order','order_code');
    }
    public function product(){
        return $this->belongsTo('App\Product','product_id');
    }
}
