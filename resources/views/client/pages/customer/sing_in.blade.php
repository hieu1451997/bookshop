
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
                       
                            <h2 class="bradcaump-title">Đăng nhập</h2>
                            <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="{{URL::to('/')}}">Trang chủ</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">Đăng nhập</span>
                            </nav>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
 @endsection

 @section('content')
	<!-- Start My Account Area -->
	<section class="my_account_area pt--80 pb--55 bg--white">
		<div class="container">
			
			<div class="row">
				<div class="col-lg-6 col-12">
					<div class="my__account__wrapper">
						<h3 class="account__title">Đăng nhập</h3>
						<?php  
							$message = Session::get('message');
							if ($message) {
								echo '<span class="text-alert" style="color: red;">'.$message.'</span>';
								Session::put('message',null);
							}
						?>
						<form action="{{URL::to('/login-customer')}}" method="post">
							{{csrf_field()}}
							<div class="account__form">
								<div class="input__box">
									<label>Tài khoản hặc Email <span>*</span></label>
									<input type="text" name="customer_email">
								</div>
								<div class="input__box">
									<label>Mật khẩu<span>*</span></label>
									<input type="password" name="customer_password">
								</div>
								<div class="form__btn">
									<button type="submit">Đăng nhập</button>
									<label class="label-for-checkbox">
										<input id="rememberme" class="input-checkbox" name="rememberme" value="forever" type="checkbox">
										<span>Ghi nhớ đăng nhập</span>
									</label>
								</div>
								<a class="forget_pass" href="#">Quên mật khẩu ?</a>
							</div>
						</form>
					</div>
				</div>
				<div class="col-lg-6 col-12">
					<div class="my__account__wrapper">
						<h3 class="account__title">Đăng ký</h3>
						<form action="{{URL::to('/add-customer')}}" method="post">
							{{csrf_field()}}
							<div class="account__form">
								<div class="input__box">
									<label>Họ và Tên <span>*</span></label>
									<input type="text" name="customer_name">
								</div>
								<div class="input__box">
									<label>Số điện thoại <span>*</span></label>
									<input type="number"name="customer_phone">
								</div>
								<div class="input__box">
									<label>Email đăng ký <span>*</span></label>
									<input type="email"name="customer_email">
								</div>
								<div class="input__box">
									<label>Mật khẩu<span>*</span></label>
									<input type="password"name="customer_password">
								</div>
								<div class="form__btn">
									<button type="submit">Đăng ký</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection