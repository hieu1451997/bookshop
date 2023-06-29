<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = false;//set time to false
    protected $fillable = ['customer_name','customer_phone','customer_email','customer_password'];
    protected $primaryKey = 'customer_id';
    protected $table = 'tbl_customers';
    // quan hệ giữa bảng khách hàng và bảng hóa đơn
    public function order(){
        //
        return $this->hasMany('App\Order','customer_id');
    }
    public function shipping(){
        //
        return $this->hasMany('App\Shipping','customer_id');
    }
}
