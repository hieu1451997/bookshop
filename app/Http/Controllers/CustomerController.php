<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Cart;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CustomerController extends Controller
{
    public function view_login_customer(){
        $category_product=DB::table('tbl_category_product')->where('category_product_status','0')->orderby('category_product_id','desc')->get();
        $publisher=DB::table('tbl_publisher')->where('publisher_status','0')->orderby('publisher_id','desc')->get();
        return view('client.pages.customer.sing_in')->with('category_product',$category_product)->with('publisher',$publisher);
    }
    public function login_customer(Request $request){
        $customer_email = $request->customer_email;
        $customer_password = md5($request->customer_password);

        $result = DB::table('tbl_customers')->where('customer_email',$customer_email)->where('customer_password',$customer_password)->first();

        if ($result) {
            Session::put('customer_name',$result->customer_name);
            Session::put('customer_id',$result->customer_id); 

            return Redirect::to('/');
            
        }else {
            Session::put('message','Email hoặc mật khẩu không đúng');
            return Redirect::to('/view-login-customer');
        }
    }
    public function add_customer(Request $request){
        $data = array();
        $data['customer_name']=$request->customer_name;
        $data['customer_phone']=$request->customer_phone;
        $data['customer_email']=$request->customer_email;
        $data['customer_password']=md5($request->customer_password);

        $customer_id=DB::table('tbl_customers')->insertGetId($data);
        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);
        return Redirect('/');
    }
    public function logout_customer(){
        Session::flush();
        return Redirect::to('/view-login-customer');
    }
}
