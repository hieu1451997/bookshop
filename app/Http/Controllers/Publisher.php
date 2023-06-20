<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class Publisher extends Controller
{
    public function AuthLogin(){
        $admin_id= Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin-login')->send();
        }
    }
    public function all(){
        $this->AuthLogin();
        $all_publisher=DB::table('tbl_publisher')->get();
        return view('admin.pages.publisher.all',compact("all_publisher"));
    }

    public function add(){
        $this->AuthLogin();
        return view('admin.pages.publisher.add');
    }
    public function save(Request $request){
        $this->AuthLogin();
        $data=array();

        $data['publisher_name']=$request->publisher_name;
        $data['publisher_desc']=$request->publisher_desc;
        $data['publisher_status']=$request->publisher_status;

        DB::table('tbl_publisher')->insert($data);

        Session::put('message','Thêm nhà xuất bản thành công');
        return Redirect::to('/add-publisher');
    }

    public function edit($publisher_id){
        $this->AuthLogin();

        $edit_publisher= DB::table('tbl_publisher')->where('publisher_id',$publisher_id)->get();

        return view('admin.pages.publisher.edit')->with('edit_publisher',$edit_publisher);   
    }

    public function update(Request $request,$publisher_id){
        $this->AuthLogin();
        $data=array();

        $data['publisher_name']=$request->publisher_name;
        $data['publisher_desc']=$request->publisher_desc;
        $data['publisher_status']=$request->publisher_status;

        DB::table('tbl_publisher')->where('publisher_id',$publisher_id)->update($data);

        Session::put('message','Cập nhật nhà xuất bản thành công');
        return Redirect::to('/all-publisher');
    }

    public function delete($publisher_id){
        $this->AuthLogin();
        DB::table('tbl_publisher')->where('publisher_id',$publisher_id)->delete();

        Session::put('message','Xóa NXB thành công');
        return Redirect::to('/all-publisher');
        
    }

    // client
    public function show_publisher_home($publisher_id){
        $category_product=DB::table('tbl_category_product')->where('category_product_status','0')->orderby('category_product_id','desc')->get();

        $publi=DB::table('tbl_publisher')->where('tbl_publisher.publisher_id',$publisher_id)->get();

        $publisher=DB::table('tbl_publisher')->where('publisher_status','0')->orderby('publisher_id','desc')->get();

        $all_product_by_publisher=DB::table('tbl_product')->join('tbl_publisher','tbl_product.publisher_id','=','tbl_publisher.publisher_id')->where('tbl_product.publisher_id',$publisher_id)->where('tbl_product.product_status','0')->get();

        return view('client.pages.publisher.show_publisher')->with('category_product',$category_product)->with('publisher',$publisher)->with('all_product_by_publisher',$all_product_by_publisher)->with('publi',$publi);
    }
}
