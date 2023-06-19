<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class HomeController extends Controller
{
    public function index(){

        $category_product=DB::table('tbl_category_product')->where('category_product_status','0')->orderby('category_product_id','desc')->get();
        $publisher=DB::table('tbl_publisher')->where('publisher_status','0')->orderby('publisher_id','desc')->get();

        $all_product=DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(8)->get();
        return view('client.pages.index')->with('category_product',$category_product)->with('publisher',$publisher)->with('all_product',$all_product);

    }

    

}
