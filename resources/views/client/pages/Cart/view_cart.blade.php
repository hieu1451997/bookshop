 @extends('client.layouts.master' )

 @section('title')
    Thể loại
 @endsection
 
 @section('slideshow')
    <div class="ht__bradcaump__area bg-image--6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcaump__inner text-center">
                       
                            <h2 class="bradcaump-title">Giỏ hàng</h2>
                            <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="{{URL::to('/')}}">Trang chủ</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">giỏ hàng</span>
                            </nav>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
 @endsection

 @section('content')
    <div class="cart-main-area section-padding--lg bg--white">
        <div class="container">
            <div id="list-item-cart">
                <div class="row">
                    <div class="col-md-12 col-sm-12 ol-lg-12">
                       
                        <form action="#">               
                            <div class="table-content wnro__table table-responsive">
                                <table>
                                    <thead>
                                        <tr class="title-top">
                                            <th class="product-thumbnail">Ảnh</th>
                                            <th class="product-name">Sản phẩm</th>
                                            <th class="product-price">giá</th>
                                            <th class="product-quantity">Số lượng</th>
                                            <th class="product-subtotal">Tổng tiền</th>                                       
                                            <th class="product-remove">Sửa</th>
                                            <th class="product-remove">Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(Session::has("Cart") != null)
                                        @foreach(Session::get('Cart')->products as $item_pro)
                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img style="width:80px;height: 100px;" src="{{URL::to('uploads/product/'.$item_pro['productInfo']->product_image)}}" alt="product img"></a></td>
                                            <td class="product-name"><a href="#">{{$item_pro['productInfo']->product_name}}</a></td>
                                            <td class="product-price"><span class="amount">{{number_format($item_pro['productInfo']->product_price).' VNĐ'}}</span></td>
                                            <td class="product-quantity">
                                                <input type="number" id="quanty-item-{{$item_pro['productInfo']->product_id}}" value="{{$item_pro['quanty']}}">
                                            </td>
                                            <td class="product-subtotal">{{number_format($item_pro['price']).' VNĐ'}}</td>
                                            <td class="product-save">
                                                <a id="save-cart-item-{{$item_pro['productInfo']->product_id}}" onclick="SaveItemListCart({{$item_pro['productInfo']->product_id}});" href="javascript:;">
                                                    <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                            <td class="product-remove"><a onclick="DeleteItemListCart({{$item_pro['productInfo']->product_id}});" href="javascript:;">X</a></td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </form> 
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 offset-lg-6">
                        <div class="cartbox__total__area">
                            @if(Session::has("Cart") != null)
                            <div class="cartbox-total d-flex justify-content-between">
                                <ul class="cart__total__list">
                                    <li>Số lượng sản phẩm</li>
                                    <li>Tổng tiền</li>
                                </ul>
                                <ul class="cart__total__tk">
                                    <li >{{Session::get('Cart')->totalQuanty}}</li>
                                    <input hidden id="total-quanty-cart-2" type="number" value="{{Session::get('Cart')->totalQuanty}}">
                                    <li>{{number_format(Session::get('Cart')->totalPrice).' VNĐ'}}</li>
                                </ul>
                            </div>
                            <div class="cart__total__amount">                               
                                    <a href="{{URL::to('/login-check')}}" style=" width: 100%;text-align: center;"><span>Thanh Toán</span></a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
@endsection