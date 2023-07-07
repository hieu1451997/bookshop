<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Cart;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
use App\Order;
use App\Shipping;
use App\OrderDetails;
use App\Customer;
use App\Product;
use PDF;

class OrderController extends Controller
{
    //check login
     public function AuthLogin(){
        $admin_id= Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin-login')->send();
        }
    }
    public function update_order(Request $request){
        //update order
        $data = $request->all();
        $order = Order::find($data['order_id']);
        $order->order_status = $data['order_status'];
        $order->save();

        //update số lượng trong kho và số lượng đã bán
        if($order->order_status==2){
            foreach($data['order_product_id'] as $key => $product_id){
                $product = Product::find($product_id);
                $product_quantity = $product->product_quantity;
                $product_sold = $product->product_sold;
                foreach($data['quantity'] as $key1 => $qty){
                    if($key==$key1){
                        $product->product_quantity = $product_quantity-$qty;
                        $product->product_sold = $product_sold+$qty;
                        $product->save();
                    }
                }
            }
        }elseif($order->order_status==3){
                foreach($data['order_product_id'] as $key => $product_id){
                    $product = Product::find($product_id);
                    $product_quantity = $product->product_quantity;
                    $product_sold = $product->product_sold;
                    foreach($data['quantity'] as $key1 => $qty){
                        if($key==$key1){
                            $product->product_quantity = $product_quantity+$qty;
                            $product->product_sold = $product_sold-$qty;
                            $product->save();
                        }
                    }
                }
            }
    }
    //danh sách order
    public function manage_order(){
        $this->AuthLogin();
        $all_order=Order::orderby('created_at','desc')
         ->limit(8)->get();
        return view('admin.pages.order.all_order')->with(compact('all_order'));
    }
    // chi tiết order
    public function view_order($order_code){
        $this->AuthLogin();
        $order_details=OrderDetails::where('order_code',$order_code)->get();
        $order=Order::where('order_code',$order_code)->get();
         foreach ($order as $value) {
            $customer_id=$value->customer_id;
            $shipping_id=$value->shipping_id;
         }
        $customer=Customer::where('customer_id',$customer_id)->first();

        $shipping=Shipping::where('shipping_id',$shipping_id)->first();

        $or_de=OrderDetails::with('product')->where('order_code',$order_code)->get();
        
        return view('admin.pages.order.view_order')->with(compact('order_details','customer','shipping','or_de','order'));
    }
    //in file PDF
    public function print_pdf($checkout_code){
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($checkout_code));
        return $pdf->stream();
    }
    Public function print_order_convert($checkout_code){
        $this->AuthLogin();
        $order_details=OrderDetails::where('order_code',$checkout_code)->get();
        $order=Order::where('order_code',$checkout_code)->get();
         foreach ($order as $value) {
            $customer_id=$value->customer_id;
            $shipping_id=$value->shipping_id;
            $created_at=$value->created_at;
         }
        $customer=Customer::where('customer_id',$customer_id)->first();
        $shipping=Shipping::where('shipping_id',$shipping_id)->first();
        $or_de=OrderDetails::with('product')->where('order_code',$checkout_code)->get();
        $total_price=0;

        $output ='';
        $output.='<style>
        body{
            font-family: DejaVu Sans !important;
            background-color: #F6F6F6; 
            margin: 0;
            padding: 0;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 100%;
            margin-right: auto;
            margin-left: auto;
        }
        .brand-section{
           background-color: #0d1033;
           padding: 10px 40px;
        }
        .logo{
            width: 50%;
        }

        .row{
            display: flex;
            flex-wrap: wrap;
        }
        .col-6{
            width: 50%;
            flex: 0 0 auto;
        }
        .text-white{
            color: #fff;
        }
        .company-details{
            float: right;
            // text-align: right;
        }
        .body-section{
            padding: 16px;
            border: 1px solid gray;
        }
        .heading{
            font-size: 20px;
            margin-bottom: 08px;
        }
        .sub-heading{
            color: #262626;
            margin-bottom: 05px;
        }
        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px gray;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align: end;
        }
        .w-25{
            width: 25%;
        }
        .w-10{
            width: 10%;
        }
        .float-right{
            float: right;
        }
    </style>
    <body>

        <div class="container">
            <div class="brand-section">
                <div class="row">
                    <div class="col-6">
                        <h1 class="text-white">BookShop</h1>
                    </div>
                </div>
            </div>

            <div class="body-section">
                <div class="row">
                    <div class="col-6">
                        <h2 class="heading">Người gửi:</h2>
                        <p class="sub-heading">bookshop</p>
                        <p class="sub-heading">Sđt: 0123456789 </p>
                        <p class="sub-heading">Email: bookshop@gmail.com </p>
                        <h2 class="heading">Mã đơn hàng: '.$checkout_code.'</h2>
                        <p class="sub-heading">Người đặt: '.$customer->customer_name.'  </p>
                        <p class="sub-heading">Ngày đặt: '.$created_at.' </p>
                        <p class="sub-heading">Email: '.$customer->customer_email.' </p>
                    </div>
                    <div class="col-6 float-right">
                    <h2 class="heading">Địa chỉ giao hàng</h2>
                        <p class="sub-heading">Họ tên người nhận: '.$shipping->shipping_name.'  </p>
                         <p class="sub-heading">SĐT: '.$shipping->shipping_phone.' </p>
                        <p class="sub-heading">Địa chỉ: '.$shipping->shipping_address.'  </p>
                       
                    </div>
                </div>
            </div>

            <div class="body-section">
                <h3 class="heading">Danh sách sản phẩm</h3>
                <br>
                <table class="table-bordered">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th class="w-25">Giá</th>
                            <th class="w-10">Sl</th>
                            <th class="w-25">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>';
                    foreach($or_de as $key => $val){
                        $subtotal=$val->product_price*$val->product_quantity;
                        $total_price=$total_price+$subtotal;
              $output.='<tr>
                            <td>'.$val->product_name.'</td>
                            <td>'.$val->product_price.' VNĐ</td>
                            <td>'.$val->product_quantity.'</td>
                            <td>'.number_format($val->product_quantity*$val->product_price).' VNĐ</td>
                        </tr>';
                    }
              $output.='<tr>
                            <td colspan="3" class="text-right">Tổng tiền thanh toán:</td>
                            <td>'.number_format($total_price).' VNĐ</td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <h3 class="heading">Hình thức thanh toán: Thanh toán khi nhận hàng</h3>
            </div>

            <div class="body-section">
                <p>Cảm ơn bạn đã mua hàng của chúng tôi.
                </p>
            </div>      
        </div>      

    </body>';

    return $output;
    }

}
