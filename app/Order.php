<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;//set time to false
    protected $fillable = ['customer_id','shipping_id','order_status','order_code','created_at'];
    protected $primaryKey = 'order_id';
    protected $table = 'tbl_order';
    
    public function customer(){
        //
        return $this->belongsTo('App\Customer','customer_id');
    }
    public function shipping(){
        //
        return $this->belongsTo('App\Shipping','shipping_id');
    }
    public function orderdetails(){
        return $this->hasMany('App\OrderDetails','order_code');
    }
}
