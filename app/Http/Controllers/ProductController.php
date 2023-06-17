<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use File;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class ProductController extends Controller
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
        $category_product=DB::table('tbl_category_product')->orderby('category_product_id','desc')->get();
        $publisher=DB::table('tbl_publisher')->orderby('publisher_id','desc')->get();

        return view('admin.pages.product.add')->with('category_product',$category_product)->with('publisher',$publisher);
    }

    public function save(Request $request){
        $this->AuthLogin();
        $data=array();
        $data['product_name']=$request->product_name;
        $data['category_product_id']=$request->category_product_name;  
        $data['publisher_id']=$request->publisher_name;
        $data['product_desc']=$request->product_desc;  
        $data['product_content']=$request->product_content;
        $data['product_price']=$request->product_price;  
        $data['product_status']=$request->product_status;
        $get_image=$request->file('product_image');
        if ($get_image) {
            $get_name_image=$get_image->getClientOriginalName();
            $name_image=current(explode('.',$get_name_image));
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/product',$new_image);
            $data['product_image']=$new_image;

            DB::table('tbl_product')->insert($data);
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('/add-product');
        }else{
            $data['product_image']='';
            DB::table('tbl_product')->insert($data);
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('/add-product');
        }
    }

    public function all(){
        $this->AuthLogin();
        $all_product=DB::table('tbl_product')->join('tbl_category_product','tbl_category_product.category_product_id','=','tbl_product.category_product_id')->join('tbl_publisher','tbl_publisher.publisher_id','=','tbl_product.publisher_id')->get();
        return view('admin.pages.product.all',compact("all_product"));
    }

    public function edit($product_id){
        $this->AuthLogin();
        $edit_product= DB::table('tbl_product')->where('product_id',$product_id)->get();

        $category_product=DB::table('tbl_category_product')->orderby('category_product_id','desc')->get();

        $publisher=DB::table('tbl_publisher')->orderby('publisher_id','desc')->get();

        return view('admin.pages.product.edit')->with('edit_product',$edit_product)->with('category_product',$category_product)->with('publisher',$publisher); 
    }

    public function update(Request $request,$product_id){
        $this->AuthLogin();
        $product=DB::table('tbl_product')->where('product_id',$product_id);
        $pro=DB::table('tbl_product')->where('product_id',$product_id)->value('product_image');
        $data=array();
        $data['product_name']=$request->product_name;
        $data['category_product_id']=$request->category_product_name;  
        $data['publisher_id']=$request->publisher_name;
        $data['product_desc']=$request->product_desc;  
        $data['product_content']=$request->product_content;
        $data['product_price']=$request->product_price;  
        $data['product_status']=$request->product_status;
        

        $get_image=$request->file('product_image');
        if ($get_image) {

            $get_name_image=$get_image->getClientOriginalName();
            $name_image=current(explode('.',$get_name_image));
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            //if(File::exists('uploads/product/'.$product->product_image)){
                            unlink('uploads/product/'.$pro);
                       // }
            $get_image->move('uploads/product',$new_image);
            $data['product_image']=$new_image;

            $product->update($data);
            Session::put('message','Cập nhật sản phẩm thành công');
            return Redirect::to('/add-product');
            //echo'<pre>';
              //  print_r($data);
            //echo'/<pre>';
        }
            $product->update($data);
            Session::put('message','Cập nhật sản phẩm thành công');
            return Redirect::to('/all-product');
            
        
    }

    public function delete($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->delete();

        Session::put('message','Xóa sản phẩm thành công');
        return Redirect::to('/all-product');

    }
}