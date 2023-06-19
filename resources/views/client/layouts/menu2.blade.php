<div class="col-lg-3 col-12 order-2 order-lg-1 md-mt-40 sm-mt-40">
	<div class="shop__sidebar">
		<aside class="wedget__categories poroduct--cat">
			<h3 class="wedget__title">Thể loại</h3>
			<ul>
				@foreach($category_product as $key => $cate_pro)
                    <li><a href="{{URL::to('/danh-muc-san-pham/'.$cate_pro->category_product_id)}}">{{$cate_pro->category_product_name}} </a></li>
                @endforeach
			</ul>
		</aside>
		<aside class="wedget__categories pro--range">
			<h3 class="wedget__title">Giá</h3>
			<div class="content-shopby">
			    <div class="price_filter s-filter clear">
			        <form action="#" method="GET">
			            <div id="slider-range"></div>
			            <div class="slider__range--output">
			                <div class="price__output--wrap">
			                    <div class="price--output">
			                        <span>Price :</span><input type="text" id="amount" readonly="">
			                    </div>
			                    <div class="price--filter">
			                        <a href="#">Filter</a>
			                    </div>
			                </div>
			            </div>
			        </form>
			    </div>
			</div>
		</aside>
		<aside class="wedget__categories poroduct--tag">
			<h3 class="wedget__title">Product Tags</h3>
			<ul>
				<li><a href="#">Biography</a></li>
				<li><a href="#">Business</a></li>
				<li><a href="#">Cookbooks</a></li>
				<li><a href="#">Health & Fitness</a></li>
				<li><a href="#">History</a></li>
				<li><a href="#">Mystery</a></li>
				<li><a href="#">Inspiration</a></li>
				<li><a href="#">Religion</a></li>
				<li><a href="#">Fiction</a></li>
				<li><a href="#">Fantasy</a></li>
				<li><a href="#">Music</a></li>
				<li><a href="#">Toys</a></li>
				<li><a href="#">Hoodies</a></li>
			</ul>
		</aside>
		<aside class="wedget__categories sidebar--banner">
			<img src="{{URL::to('frontend/images/others/banner_left.jpg')}}" alt="banner images">
			<div class="text">
				<h2>new products</h2>
				<h6>save up to <br> <strong>40%</strong>off</h6>
			</div>
		</aside>
	</div>
</div>