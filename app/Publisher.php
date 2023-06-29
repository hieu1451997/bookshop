<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    public $timestamps = false;//set time to false
    protected $fillable = ['publisher_name','publisher_desc','publisher_status'];
    protected $primaryKey = 'publisher_id';
    protected $table = 'tbl_publisher';
    
    public function product(){
        return $this->hasMany('App\Product','publisher_id');
    }
}
