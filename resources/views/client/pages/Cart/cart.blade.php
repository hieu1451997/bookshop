{{-- kiểm tra xem có giá trị không --}}
@if(Session::has("Cart") != null)    
    <div class="items-total d-flex justify-content-between">
        <span>{{Session::get('Cart')->totalQuanty}} sản phẩm</span>
        <span>Tổng tiền</span>
    </div>
    <div class="total_amount text-right">
        <span>{{number_format(Session::get('Cart')->totalPrice).' VNĐ'}}</span>
    </div>
    <input hidden id="total-quanty-cart" type="number" value="{{Session::get('Cart')->totalQuanty}}">
    <div class="single__items">
        {{-- Lấy giá trị của Session --}}
        @foreach(Session::get('Cart')->products as $item_pro)
        <div class="miniproduct">
            
                <div class="item01 d-flex mt--20">
                    <div class="thumb">
                        <a href="product-details.html"><img src="{{URL::to('uploads/product/'.$item_pro['productInfo']->product_image)}}" alt="product images"></a>
                    </div>
                    <div class="content">
                        <h6><a href="product-details.html">{{$item_pro['productInfo']->product_name}}</a></h6>
                        <span class="product_price">{{number_format($item_pro['productInfo']->product_price).' VNĐ'}}</span>
                        <div class="product_prize d-flex justify-content-between">
                            <span class="qun">Số lượng: {{$item_pro['quanty']}}</span>
                            <ul class="d-flex justify-content-end">
                                <li class="cart-delete"><i class="zmdi zmdi-delete" data-id="{{$item_pro['productInfo']->product_id}}"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
          
        </div>
        @endforeach
    </div>
@endif