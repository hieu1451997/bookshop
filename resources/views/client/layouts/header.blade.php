<header id="wn__header" class="header__area header__absolute sticky__header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-6 col-lg-2">
                <div class="logo">
                    <a href="{{URL::to('/')}}">
                        <img src="{{URl::to('frontend/images/logo/logo.png')}}" alt="logo images">
                    </a>
                </div>
            </div>
            <div class="col-lg-8 d-none d-lg-block">
                <nav class="mainmenu__nav">
                    <ul class="meninmenu d-flex justify-content-start">
                        <li class="drop with--one--item"><a href="{{URL::to('/')}}">Trang chủ</a></li>
                        
                        <li class="drop"><a href="shop-grid.html">Sách</a>
                            <div class="megamenu mega02">
                                <ul class="item item02">
                                    <li class="title">Thể loại</li>
                                    @foreach($category_product as $key => $cate_pro)
                                        <li><a href="{{URL::to('/danh-muc-san-pham/'.$cate_pro->category_product_id)}}">{{$cate_pro->category_product_name}} </a></li>
                                    @endforeach
                                </ul>
                                <ul class="item item03">
                                    <li class="title">NXB</li>
                                    @foreach($publisher as $key => $vall)
                                        <li><a href="{{URL::to('/nha-xuat-ban/'.$vall->publisher_id)}}">{{$vall->publisher_name}} </a></li>
                                    @endforeach
                                    
                                </ul>
                            </div>
                        </li>
                        
                        <li class="drop"><a href="blog.html">Tin tức</a>
                            
                        </li>
                        <li><a href="contact.html">Liên hệ</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-6 col-sm-6 col-6 col-lg-2">
                
                <ul class="header__sidebar__right d-flex justify-content-end align-items-center">
                    <li class="shop_search"><a class="search__active" href="#"></a></li>
                    <li class="wishlist"><a href="#"></a></li>
                    <li class="shopcart"><a class="cartbox_active" href="#">
                        @if(Session::has("Cart") != null) 
                            <span id="quanty-product" class="product_qun">{{Session::get('Cart')->totalQuanty}}</span>
                        @else
                            <span id="quanty-product" class="product_qun">0</span>
                        @endif
                        </a>
                        <!-- Start Shopping Cart -->
                        <div class="block-minicart minicart__active">
                            <div class="minicart-content-wrapper">
                                <div class="micart__close">
                                    <span>Đóng</span>
                                </div>
                                <div id="change-item-cart">
                                    @if(Session::has("Cart") != null)    
    
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
                                        <div class="items-total d-flex justify-content-between">
                                            <span>{{Session::get('Cart')->totalQuanty}} sản phẩm</span>
                                            <span>Tổng tiền</span>
                                        </div>

                                        <div class="total_amount text-right">
                                            <span>{{number_format(Session::get('Cart')->totalPrice).' VNĐ'}}</span>
                                        </div>

                                    @endif
                                </div>
                               
                                <div class="mini_action checkout">
                                    <a class="checkout__btn" href="cart.html">Thanh toán</a>
                                </div>
                                <div class="mini_action cart">
                                    <a class="cart__btn" href="{{URL::to('/view-cart')}}">Xem giỏ hàng</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Shopping Cart -->
                    </li>
                    
                    <li class="setting__bar__icon"><a class="setting__active" href="#"></a>
                        <div class="searchbar__content setting__block">
                            <div class="content-inner">
                                <div class="switcher-currency">
                                    <strong class="label switcher-label">
                                        <span>Currency</span>
                                    </strong>
                                    <div class="switcher-options">
                                        <div class="switcher-currency-trigger">
                                            <span class="currency-trigger">USD - US Dollar</span>
                                            <ul class="switcher-dropdown">
                                                <li>GBP - British Pound Sterling</li>
                                                <li>EUR - Euro</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="switcher-currency">
                                    <strong class="label switcher-label">
                                        <span>Language</span>
                                    </strong>
                                    <div class="switcher-options">
                                        <div class="switcher-currency-trigger">
                                            <span class="currency-trigger">English01</span>
                                            <ul class="switcher-dropdown">
                                                <li>English02</li>
                                                <li>English03</li>
                                                <li>English04</li>
                                                <li>English05</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="switcher-currency">
                                    <strong class="label switcher-label">
                                        <span>Select Store</span>
                                    </strong>
                                    <div class="switcher-options">
                                        <div class="switcher-currency-trigger">
                                            <span class="currency-trigger">Fashion Store</span>
                                            <ul class="switcher-dropdown">
                                                <li>Furniture</li>
                                                <li>Shoes</li>
                                                <li>Speaker Store</li>
                                                <li>Furniture</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="switcher-currency">
                                    <strong class="label switcher-label">
                                        <span>My Account</span>
                                    </strong>
                                    <div class="switcher-options">
                                        <div class="switcher-currency-trigger">
                                            <div class="setting__menu">
                                                <span><a href="#">Compare Product</a></span>
                                                <span><a href="#">My Account</a></span>
                                                <span><a href="#">My Wishlist</a></span>
                                                <span><a href="#">Sign In</a></span>
                                                <span><a href="#">Create An Account</a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Start Mobile Menu -->
        <div class="row d-none">
            <div class="col-lg-12 d-none">
                <nav class="mobilemenu__nav">
                    <ul class="meninmenu">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="#">Pages</a>
                            <ul>
                                <li><a href="about.html">About Page</a></li>
                                <li><a href="portfolio.html">Portfolio</a>
                                    <ul>
                                        <li><a href="portfolio.html">Portfolio</a></li>
                                        <li><a href="portfolio-details.html">Portfolio Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="my-account.html">My Account</a></li>
                                <li><a href="cart.html">Cart Page</a></li>
                                <li><a href="checkout.html">Checkout Page</a></li>
                                <li><a href="wishlist.html">Wishlist Page</a></li>
                                <li><a href="error404.html">404 Page</a></li>
                                <li><a href="faq.html">Faq Page</a></li>
                                <li><a href="team.html">Team Page</a></li>
                            </ul>
                        </li>
                        <li><a href="shop-grid.html">Shop</a>
                            <ul>
                                <li><a href="shop-grid.html">Shop Grid</a></li>
                                <li><a href="single-product.html">Single Product</a></li>
                            </ul>
                        </li>
                        <li><a href="blog.html">Blog</a>
                            <ul>
                                <li><a href="blog.html">Blog Page</a></li>
                                <li><a href="blog-details.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- End Mobile Menu -->
        <div class="mobile-menu d-block d-lg-none">
        </div>
        <!-- Mobile Menu -->    
    </div>      
</header>
<!-- Start Search Popup -->
    <div class="brown--color box-search-content search_active block-bg close__top">
        <form id="search_mini_form" class="minisearch" action="#">
            <div class="field__search">
                <input type="text" placeholder="Search entire store here...">
                <div class="action">
                    <a href="#"><i class="zmdi zmdi-search"></i></a>
                </div>
            </div>
        </form>
        <div class="close__wrap">
            <span>close</span>
        </div>
    </div>
<!-- End Search Popup -->