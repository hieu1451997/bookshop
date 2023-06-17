<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
{
    public function AuthLogin(){
        $admin_id= Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin-login')->send();
        }
    }
    public function add(){
        $this->AuthLogin();
        return view('admin.pages.category.add');
    }

    public function all(){
        $this->AuthLogin();
        $all_category_product= DB::table('tbl_category_product')->get();

        return view('admin.pages.category.all',compact("all_category_product"));
    }

    public function save(Request $request){
        $this->AuthLogin();
        $data=array();
        $data['category_product_name'] = $request->category_product_name;
        $data['category_product_desc'] = $request->category_product_desc;
        $data['category_product_status'] = $request->category_product_status;

        DB::table('tbl_category_product')->insert($data);

        Session::put('message','Them danh muc san pham thanh cong');
        return Redirect::to('/add-category-product');

    }

    public function edit($category_product_id){
        $this->AuthLogin();
        $edit_category_product= DB::table('tbl_category_product')->where('category_product_id',$category_product_id)->get();

        return view('admin.pages.category.edit')->with('edit_category_product',$edit_category_product);   
    }

    public function update(Request $request, $category_product_id){
        $this->AuthLogin();
        $data=array();
        $data['category_product_name'] = $request->category_product_name;
        $data['category_product_desc'] = $request->category_product_desc;
        $data['category_product_status'] = $request->category_product_status;

        DB::table('tbl_category_product')->where('category_product_id',$category_product_id)->update($data);

        Session::put('message','Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('/edit-category-product/'.$category_product_id);

    }
    public function delete($category_product_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_product_id',$category_product_id)->delete();

        Session::put('message','Xóa danh mục sản phẩm thành công');
        return Redirect::to('/all-category-product');

    }
}
