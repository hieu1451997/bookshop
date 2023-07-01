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
class CheckoutController extends Controller
{
     public function checkout(){
        $category_product=DB::table('tbl_category_product')->where('category_product_status','0')->orderby('category_product_id','desc')->get();
        $publisher=DB::table('tbl_publisher')->where('publisher_status','0')->orderby('publisher_id','desc')->get();
        return view('client.pages.checkout.show_checkout')->with('category_product',$category_product)->with('publisher',$publisher);
     }
     public function login_checkout(Request $request){
        $customer_email = $request->customer_email;
        $customer_password = md5($request->customer_password);
        //$result = DB::table('tbl_customers')->where('customer_email',$customer_email)->where('customer_password',$customer_password)->first();
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
            //Insert tbl_shipping
            $data_shipping=array();
            $data_shipping['customer_id']=Session::get('customer_id');
            $data_shipping['shipping_name']=$request->shipping_name;
            $data_shipping['shipping_email']=$request->shipping_email;
            $data_shipping['shipping_phone']=$request->shipping_phone;
            $data_shipping['shipping_address']=$request->shipping_address;
            $shipping_id=DB::table('tbl_shipping')->insertGetId($data_shipping);

            //Insert tbl_payment
            $data_payment=array();
            $data_payment['payment_method']=$request->payment_method;
            $data_payment['payment_status']='Đang chờ xử lý';
            $payment_id=DB::table('tbl_payment')->insertGetId($data_payment);

            //Insert tbl_order
            $data_order=array();
            $data_order['customer_id']=Session::get('customer_id');
            $data_order['shipping_id']=$shipping_id;
            $data_order['payment_id']=$payment_id;
            $data_order['order_total']=Session('Cart')->totalPrice;
            $data_order['order_status']='Đang chờ xử lý';
            $order_id=DB::table('tbl_order')->insertGetId($data_order);

            //Insert tbl_order_details
            foreach(Session::get('Cart')->products as $item_pro){
               $data_order_details['order_id']=$order_id;
               $data_order_details['product_id']=$item_pro['productInfo']->product_id;
               $data_order_details['product_name']=$item_pro['productInfo']->product_name;
               $data_order_details['product_price']=$item_pro['productInfo']->product_price;
               $data_order_details['product_quantity']=$item_pro['quanty'];
               DB::table('tbl_order_details')->insert($data_order_details);
            }
            if($data_payment['payment_method']==1){
               session()->forget('Cart');
               $category_product=DB::table('tbl_category_product')->where('category_product_status','0')->orderby('category_product_id','desc')->get();
               $publisher=DB::table('tbl_publisher')->where('publisher_status','0')->orderby('publisher_id','desc')->get();
               return view('client.pages.checkout.handcash')->with('category_product',$category_product)->with('publisher',$publisher);
            }
        }else{
            Session::put('message','Vui lòng đăng nhập để thanh toán');
            return Redirect::to('/view-checkout');
        }
      
   }
}
