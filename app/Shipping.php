<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    public $timestamps = false;//set time to false
    protected $fillable = ['shipping_name','shipping_email','shipping_phone','shipping_address','shipping_method','created_at'];
    protected $primaryKey = 'shipping_id';
    protected $table = 'tbl_shipping';
    public function order(){
        return $this->belongsTo('App\Order','shipping_id');
    }
}
