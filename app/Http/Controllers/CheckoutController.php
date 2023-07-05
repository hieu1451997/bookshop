<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Cart;
use App\Customer;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
use App\Order;
use App\Shipping;
use App\OrderDetails;
use App\CategoryProduct;
use App\Publisher;
class CheckoutController extends Controller
{
     public function checkout(){
        $category_product=CategoryProduct::where('category_product_status','0')->get();
        $publisher=Publisher::where('publisher_status','0')->get();
        return view('client.pages.checkout.show_checkout')->with('category_product',$category_product)->with('publisher',$publisher);
     }
     public function login_checkout(Request $request){
        $customer_email = $request->customer_email;
        $customer_password = md5($request->customer_password);
        $result=Customer::where('customer_email',$customer_email)->where('customer_password',$customer_password)->first();
        if ($result) {
            Session::put('customer_name',$result->customer_name);
            Session::put('customer_id',$result->customer_id); 

            return Redirect::to('/view-checkout');
            
        }else {
            Session::put('message','Email hoặc mật khẩu không đúng');
            return Redirect::to('/view-checkout');
        }
     }
   public function check_out(Request $request){
      $cus_id= Session::get('customer_id');
         if($cus_id){
             // Insert tbl_shipping
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $data_shipping=new Shipping;
            $data_shipping->shipping_name=$request->shipping_name;
            $data_shipping->shipping_email=$request->shipping_email;
            $data_shipping->shipping_phone=$request->shipping_phone;
            $data_shipping->shipping_address=$request->shipping_address;
            $data_shipping->shipping_method=$request->payment_method;
            $data_shipping->created_at=now();
            $data_shipping->save();
            $shipping_id=$data_shipping->shipping_id;

            //Insert tbl_order
            $data_order=new Order;
            $check_code=substr(md5(microtime()),rand(0,26),8);
            $data_order->customer_id=$cus_id;
            $data_order->shipping_id=$shipping_id;
            $data_order->order_status=1;
            $data_order->order_code= $check_code;
            $data_order->created_at=now();
            $data_order->save();

            // //Insert tbl_order_details
            
            if(Session::get('Cart')){
               foreach(Session::get('Cart')->products as $item_pro){
                  $data_order_details=new OrderDetails;
                  $data_order_details->order_code=$check_code;
                  $data_order_details->product_id=$item_pro['productInfo']->product_id;
                  $data_order_details->product_name=$item_pro['productInfo']->product_name;
                  $data_order_details->product_price=$item_pro['productInfo']->product_price;
                  $data_order_details->product_quantity=$item_pro['quanty'];
                  $data_order_details->created_at=now();
                  $data_order_details->save();
               }
            }
            
            session()->forget('Cart');
            $category_product=CategoryProduct::where('category_product_status','0')->get();
            $publisher=Publisher::where('publisher_status','0')->get();
            return view('client.pages.checkout.handcash')->with('category_product',$category_product)->with('publisher',$publisher);
            
        }else{
            Session::put('message','Vui lòng đăng nhập để thanh toán');
            return Redirect::to('/view-login-customer');
        }
      
   }
}
