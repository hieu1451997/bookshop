<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Cart;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class CartController extends Controller
{
    public function AddCart(Request $request,$product_id){
        $product=DB::table('tbl_product')->where('tbl_product.product_id',$product_id)->first();
        if($product != null){
            $oldCart= Session('Cart') ? Session('Cart') : null;
            $newCart= new Cart($oldCart);
            $newCart->AddCart($product,$product_id);
            $request->session()->put('Cart',$newCart);
        }
        return view('client.pages.Cart.cart');
    }
    public function DeleteItemCart(Request $request,$product_id){
        $oldCart= Session('Cart') ? Session('Cart') : null;
        $newCart= new Cart($oldCart);
        $newCart->DeleteItemCart($product_id);
        if(count($newCart->products)>0){
            $request->session()->put('Cart',$newCart);
        }else{
            $request->session()->forget('Cart');// nếu không tồn tại xóa bỏ luôn
        }
        return view('client.pages.Cart.cart');

    }

    public function ViewCart(){
        $category_product=DB::table('tbl_category_product')->where('category_product_status','0')->orderby('category_product_id','desc')->get();
        $publisher=DB::table('tbl_publisher')->where('publisher_status','0')->orderby('publisher_id','desc')->get();
        
        return view('client.pages.Cart.view_cart')->with('category_product',$category_product)->with('publisher',$publisher);
    }
    public function DeleteItemListCart(Request $request,$product_id){
        $category_product=DB::table('tbl_category_product')->where('category_product_status','0')->orderby('category_product_id','desc')->get();
        $publisher=DB::table('tbl_publisher')->where('publisher_status','0')->orderby('publisher_id','desc')->get();

        $oldCart= Session('Cart') ? Session('Cart') : null;
        $newCart= new Cart($oldCart);
        $newCart->DeleteItemCart($product_id);
        if(count($newCart->products)>0){
            $request->session()->put('Cart',$newCart);
        }else{
            $request->session()->forget('Cart');// nếu không tồn tại xóa bỏ luôn
        }
        return view('client.pages.Cart.list_cart')->with('category_product',$category_product)->with('publisher',$publisher);

    }
    public function SaveItemListCart(Request $request,$product_id,$quanty){

        $oldCart= Session('Cart') ? Session('Cart') : null;
        $newCart= new Cart($oldCart);
        $newCart->UpdateItemCart($product_id,$quanty);
        
        $request->session()->put('Cart',$newCart);
        
        return view('client.pages.Cart.list_cart');

    }
}
