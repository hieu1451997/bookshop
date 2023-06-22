<?php

namespace App;

class Cart{
    public $products=null;//danh sách sản phẩm
    public $totalPrice =0;//tổng giá
    public $totalQuanty=0;//tổng số lượng
    
    public function __construct($cart){
        if($cart){
            $this->products=$cart->products;
            $this->totalPrice=$cart->totalPrice;
            $this->totalQuanty=$cart->totalQuanty;
        }
    }

    public function AddCart($product,$product_id){
        //$product_price=0;
        $new_Product = ['quanty' => 0,'price' => $product->product_price,'productInfo' =>$product];
        // nếu mà sản phẩm thêm vào giỏ hàng đã tồn tại thì hiện thị sản phẩm cũ và tăng số lượng nên +1
        if($this->products){
            if(array_key_exists($product_id, $this->products)){
                $new_Product=$this->products[$product_id];
            }
        }
        $new_Product['quanty']++;
        $new_Product['price']= $new_Product['quanty'] * $product->product_price;
        $this->products[$product_id]=$new_Product;
        $this->totalPrice += $product->product_price;
        $this->totalQuanty++;
    }

    public function DeleteItemCart($id){
        $this->totalQuanty -= $this->products[$id]['quanty'];
        $this->totalPrice -= $this->products[$id]['price'];
        unset($this->products[$id]);
    }
}


?>
