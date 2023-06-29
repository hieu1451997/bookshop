<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;//set time to false
    protected $fillable = ['customer_id','shipping_id','payment_id','order_total','order_status'];
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
    public function payment(){
        //
        return $this->belongsTo('App\Payment','payment_id');
    }
    public function orderdetails(){
        return $this->hasMany('App\OrderDetails','order_id');
    }
}
