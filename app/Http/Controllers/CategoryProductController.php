<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publisher;
use App\Product;
use DB;
use App\CategoryProduct;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProductController extends Controller
{
    //admin
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
        //$all_category_product= DB::table('tbl_category_product')->get();
        $all_category_product=CategoryProduct::all();
        return view('admin.pages.category.all',compact("all_category_product"));
    }

    public function save(Request $request){
        $this->AuthLogin();
        // $data=array();
        // $data['category_product_name'] = $request->category_product_name;
        // $data['category_product_desc'] = $request->category_product_desc;
        // $data['category_product_status'] = $request->category_product_status;

        // DB::table('tbl_category_product')->insert($data);
        $data=new CategoryProduct;
        $data->category_product_name=$request->category_product_name;
        $data->category_product_desc=$request->category_product_desc;
        $data->category_product_status=$request->category_product_status;
        $data->save();
        Session::put('message','Them danh muc san pham thanh cong');
        return Redirect::to('/add-category-product');

    }

    public function edit($category_product_id){
        $this->AuthLogin();
        // $edit_category_product= DB::table('tbl_category_product')->where('category_product_id',$category_product_id)->get();
        $edit_category_product=CategoryProduct::where('category_product_id',$category_product_id)->get();
        return view('admin.pages.category.edit')->with('edit_category_product',$edit_category_product);   
    }

    public function update(Request $request, $category_product_id){     
        $this->AuthLogin();
        // $data=array();
        // $data['category_product_name'] = $request->category_product_name;
        // $data['category_product_desc'] = $request->category_product_desc;
        // $data['category_product_status'] = $request->category_product_status;

        // DB::table('tbl_category_product')->where('category_product_id',$category_product_id)->update($data);
        $data=CategoryProduct::find($category_product_id);
        $data->category_product_name=$request->category_product_name;
        $data->category_product_desc=$request->category_product_desc;
        $data->category_product_status=$request->category_product_status;
        $data->save();
        Session::put('message','Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('/edit-category-product/'.$category_product_id);

    }
    public function delete($category_product_id){
        $this->AuthLogin();
        //DB::table('tbl_category_product')->where('category_product_id',$category_product_id)->delete();
        $cate_pro=CategoryProduct::where('category_product_id',$category_product_id)->first();
        $cate_pro->delete();
        Session::put('message','Xóa danh mục sản phẩm thành công');
        return Redirect::to('/all-category-product');

    }

    // client
    public function show_category_home($category_id){
        // $category_product=DB::table('tbl_category_product')->where('category_product_status','0')->orderby('category_product_id','desc')->get();
        // $publisher=DB::table('tbl_publisher')->where('publisher_status','0')->orderby('publisher_id','desc')->get();
        // $category=DB::table('tbl_category_product')->where('tbl_category_product.category_product_id',$category_id)->get('category_product_name');
         //$all_product_by_category=DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_product_id','=','tbl_category_product.category_product_id')->where('tbl_product.category_product_id',$category_id)->where('tbl_product.product_status','0')->get();
        $category_product=CategoryProduct::where('category_product_status','0')->get();
        $publisher=Publisher::where('publisher_status','0')->get();
        $category=CategoryProduct::where('category_product_id',$category_id)->get();
        $all_product_by_category=Product::where('category_product_id',$category_id)->where('product_status','0')->get();
       
        return view('client.pages.category.show_category')->with('category_product',$category_product)->with('publisher',$publisher)->with('all_product_by_category',$all_product_by_category)->with('category',$category);
    }

    
}
