<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Cart;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class OrderController extends Controller
{
     public function AuthLogin(){
        $admin_id= Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin-login')->send();
        }
    }
    public function manage_order(){
        $this->AuthLogin();
        $all_order=DB::table('tbl_order')
         ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
         ->select('tbl_order.*','tbl_customers.customer_name')
         ->orderby('tbl_order.order_id','desc')
         ->limit(8)->get();
        return view('admin.pages.order.all_order')->with('all_order',$all_order);
    }
    public function view_order($order_id){

        $this->AuthLogin();
        $order_by_id=DB::table('tbl_order')
         ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
         ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
         ->where('tbl_order.order_id',$order_id)->get();
         // ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id');
         $order_details=DB::table('tbl_order_details')
         ->where('tbl_order_details.order_id',$order_id)->get();
         
         //dd($order_details);
        return view('admin.pages.order.view_order')->with('order_by_id',$order_by_id)->with('order_details',$order_details);
    }
}
