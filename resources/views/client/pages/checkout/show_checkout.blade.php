
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
                       
                            <h2 class="bradcaump-title">Thanh toán</h2>
                            <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="{{URL::to('/')}}">Trang chủ</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">Thanh toán</span>
                            </nav>                       
                    </div>
                </div>
            </div>
        </div>
    </div>
 @endsection

 @section('content')
 <section class="wn__checkout__area section-padding--lg bg__white">
     <div class="container">
     	@if(Session::get('customer_name') ==null)
	     	<div class="row">
				<div class="col-lg-12">
					<div class="wn_checkout_wrap">
						<div class="checkout_info">
							<span>Vui lòng đăng nhập để mua hàng. </span>
							<a class="showlogin" href="#">Đăng nhập</a>
						</div>
						<div class="checkout_login">
							<?php  
								$message = Session::get('message');
								if ($message) {
									echo '<span class="text-alert" style="color: red;">'.$message.'</span>';
									Session::put('message',null);
								}
							?>
							<form class="wn__checkout__form" action="{{URL::to('/login-checkout')}}" method="post">
								{{csrf_field()}}
								<p>Nếu bạn chưa có tài khoản hãy đăng ký <a style="color: #e59285;" href="{{URL::to('/view-login-customer')}}">tại đây</a></p>

								<div class="input__box">
									<label>Email <span>*</span></label>
									<input type="text" name="customer_email">
								</div>

								<div class="input__box">
									<label>Mật khẩu <span>*</span></label>
									<input type="password" name="customer_password">
								</div>
								<div class="form__btn">
									<button type="submit">Đăng nhập</button>
									<label class="label-for-checkbox">
										<input id="rememberme" name="rememberme" value="forever" type="checkbox">
										<span>Ghi nhớ đăng nhập</span>
									</label>

								</div>
								<div style="margin-top: 10px;">
									<span><a href="#">Quên mật khẩu?</a></span>
								</div>
								
							</form>
						</div>
					</div>
				</div>
			</div>
		@endif
		<form method="post" action="{{URL::to('/check-out')}}">
			{{csrf_field()}}
			<div class="row">			
				<div class="col-lg-6 col-12">
					<div class="customer_details">
						<h3>Thông tin nhận hàng</h3>
						<div class="customar__field">
							<div class="input_box">
								<label>Họ và tên <span>*</span></label>
								<input type="text" name="shipping_name">
							</div>
							<div class="input_box">
								<label>Email <span>*</span></label>
								<input type="text" name="shipping_email">
							</div>
							<div class="input_box">
								<label>Số điện thoại <span>*</span></label>
								<input type="number"name="shipping_phone">
							</div>
							<div class="input_box">
								<label>Địa chỉ nhận hàng <span>*</span></label>
								<input type="text"name="shipping_address">
							</div>
						</div>					
					</div>
					<div class="wn__accountbox">
						<input class="input-checkbox" name="payment_method" value="1" type="checkbox">
						<span>Thanh toán khi nhận hàng</span>
					</div>				
				</div>
				<div class="col-lg-6 col-12 md-mt-40 sm-mt-40">
					<div class="wn__order__box">
						<h3 class="onder__title">Sản phẩm mua</h3>
						<ul class="order__total">
							<li>Sản phẩm</li>
							<li>Giá</li>
						</ul>
						@if(Session::has("Cart") != null)
	                    @foreach(Session::get('Cart')->products as $item_pro)
							<ul class="order_product">
								<li>{{$item_pro['productInfo']->product_name}} × {{$item_pro['quanty']}}<span>{{number_format($item_pro['price']).' VNĐ'}}</span></li>
								
							</ul>
						@endforeach
	                    
						<ul class="total__amount">
							<li>Tổng tiền <span>{{number_format(Session::get('Cart')->totalPrice).' VNĐ'}}</span></li>
						</ul>
						@endif
					</div>
				    
					    <div class="check_out" style="padding-top: 30px;" >
					        <button style="width: 50%;height: 50px;float: right;background: #d0011b;font-size: 16px;color: #fff;border: none;" type="submit">Mua hàng</button>
					    </div>				   			   
				</div>
			</div>
		</form>
	</div>
</section>
@endsection