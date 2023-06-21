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
        return redirect()->back();
       //dd($product);
    }
}
