<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Admin;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id= Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin-login')->send();
        }
    }
    public function login(){
        return view('auth.login');
    }
    public function index(){
        $this->AuthLogin();
        return view('admin.pages.index');
    }
    public function dashboard(Request $request){
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);
        // $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        $result=Admin::where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        //dd($result);
        if ($result) {
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id); 

            return Redirect::to('/dashboard');
            
        }else {
            Session::put('message','Email hoặc mật khẩu không đúng');
            return Redirect::to('/admin-login');
        }

    }

    public function logout(){
        Session::put('admin_name',null);
        Session::put('admin_id',null); 
        return Redirect::to('admin-login');
    }
}
