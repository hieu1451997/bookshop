
 @extends('client.layouts.master' )

 @section('title')
    Thanh toán
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
	     	<div class="row">
				<div class="col-lg-12">
					<div class="wn_checkout_wrap">
						<div class="checkout_info">
							<span>Cảm ơn bạn đã mua hàng chúng tôi sẽ liên hệ với bạn sớm nhất có thể. </span>
						</div>
						
					</div>
				</div>
			</div>
	</div>
</section>
@endsection