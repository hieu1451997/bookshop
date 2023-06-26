
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
							<form class="wn__checkout__form" action="#">
								<p>Nếu bạn chưa có tài khoản hãy đăng ký <a style="color: #e59285;" href="{{URL::to('/view-login-customer')}}">tại đây</a></p>

								<div class="input__box">
									<label>Email <span>*</span></label>
									<input type="text">
								</div>

								<div class="input__box">
									<label>Mật khẩu <span>*</span></label>
									<input type="password">
								</div>
								<div class="form__btn">
									<button>Đăng nhập</button>
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
		<div class="row">
			<div class="col-lg-6 col-12">
				<div class="customer_details">
					<h3>Thông tin nhận hàng</h3>
					<div class="customar__field">
						<div class="input_box">
							<label>Họ và tên <span>*</span></label>
							<input type="text">
						</div>
						<div class="input_box">
							<label>Email <span>*</span></label>
							<input type="text">
						</div>
						<div class="input_box">
							<label>Số điện thoại <span>*</span></label>
							<input type="number">
						</div>
						<div class="input_box">
							<label>Địa chỉ nhận hàng <span>*</span></label>
							<input type="text">
						</div>
					</div>
					
				</div>
				
			</div>
			<div class="col-lg-6 col-12 md-mt-40 sm-mt-40">
				<div class="wn__order__box">
					<h3 class="onder__title">Sản phẩm mua</h3>
					<ul class="order__total">
						<li>Sản phẩm</li>
						<li>Giá</li>
					</ul>
					<ul class="order_product">
						<li>Buscipit at magna × 1<span>$48.00</span></li>
						<li>Buscipit at magna × 1<span>$48.00</span></li>
						<li>Buscipit at magna × 1<span>$48.00</span></li>
						<li>Buscipit at magna × 1<span>$48.00</span></li>
					</ul>
					<ul class="total__amount">
						<li>Tổng tiền <span>$223.00</span></li>
					</ul>
				</div>
			    <div id="accordion" class="checkout_accordion mt--30" role="tablist">
				    <div class="payment">
				        <div class="che__header" role="tab" id="headingOne">
				          	<a class="checkout__title" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
				                <span>Đặt hàng</span>
				          	</a>
				        </div>
				    </div>
				   
			    </div>

			</div>
		</div>
	</div>
</section>
@endsection