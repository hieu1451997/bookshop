<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Cart;
use App\Publisher;
use App\Customer;
use App\CategoryProduct;
use App\Social;
use Socialite;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CustomerController extends Controller
{
    public function view_login_customer(){
        //$category_product=DB::table('tbl_category_product')->where('category_product_status','0')->orderby('category_product_id','desc')->get();
        //$publisher=DB::table('tbl_publisher')->where('publisher_status','0')->orderby('publisher_id','desc')->get();
        $category_product=CategoryProduct::where('category_product_status','0')->get();
        $publisher=Publisher::where('publisher_status','0')->get();
        return view('client.pages.customer.sing_in')->with('category_product',$category_product)->with('publisher',$publisher);
    }
    public function login_customer(Request $request){
        $customer_email = $request->customer_email;
        $customer_password = md5($request->customer_password);

        //$result = DB::table('tbl_customers')->where('customer_email',$customer_email)->where('customer_password',$customer_password)->first();
        $result=Customer::where('customer_email',$customer_email)->where('customer_password',$customer_password)->first();
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
    public function login_facebook(){
        
        return Socialite::driver('facebook')->stateless()->redirect();
        
    }

    public function callback_facebook(){
        $provider = Socialite::driver('facebook')->stateless()->user();
        $account = Social::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
        if($account){
            //login in vao trang quan tri  
            $account_name = Customer::where('customer_id',$account->user)->first();
            Session::put('customer_name',$account_name->customer_name);
            Session::put('customer_id',$account_name->customer_id);
            return redirect('/')->with('message', 'Đăng nhập thành công');
        }else{

            $customer = new Social([
                'provider_user_id' => $provider->getId(),
                'provider' => 'facebook'
            ]);
            $orang = Customer::where('customer_email',$provider->getEmail())->first();

            if(!$orang){
                $orang = Customer::create([
                    'customer_name' => $provider->getName(),
                    'customer_email' => $provider->getEmail(),
                    'customer_password' => '',
                    'customer_phone' => ''

                ]);
            }
            $customer->login()->associate($orang);
            $customer->save();

            $account_name = Customer::where('customer_id',$customer->user)->first();

            Session::put('customer_name',$account_name->customer_name);
            Session::put('customer_id',$account_name->customer_id);
            return redirect('/')->with('message', 'Đăng nhập thành công');
        } 
    }

}
