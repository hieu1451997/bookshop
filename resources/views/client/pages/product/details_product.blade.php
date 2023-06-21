 @extends('client.layouts.master')

 @section('title')
    Chi tiết sản phẩm
 @endsection
 
 @section('slideshow')
    <div class="ht__bradcaump__area bg-image--6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Chi tiết sản phẩm</h2>
                        <nav class="bradcaump-content">
                          <a class="breadcrumb_item" href="{{URL::to('/')}}">Trang chủ</a>
                          <span class="brd-separetor">/</span>
                          <span class="breadcrumb_item active">Chi tiết sản phẩm</span>
                        </nav>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
 @endsection

 @section('content')
    <div class="maincontent bg--white pt--80 pb--55">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-12">
                    @foreach($details_product as $key => $de_pro)
                        <div class="wn__single__product">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="wn__fotorama__wrapper">
                                        <div class="fotorama wn__fotorama__action" data-nav="thumbs">
                                              <a href=""><img src="{{URL::to('uploads/product/'.$de_pro->product_image)}}" alt=""></a>                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="product__info__main">
                                        <h1>{{$de_pro->product_name}}</h1>
                                        <div class="product-reviews-summary d-flex">
                                            <ul class="rating-summary d-flex">
                                                <li><i class="zmdi zmdi-star-outline"></i></li>
                                                <li><i class="zmdi zmdi-star-outline"></i></li>
                                                <li><i class="zmdi zmdi-star-outline"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star-outline"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star-outline"></i></li>
                                            </ul>
                                        </div>
                                        <div class="price-box">
                                            <span>{{number_format($de_pro->product_price).' VNĐ'}}</span>
                                        </div>
                                        <div class="product__overview">
                                            <p>{{$de_pro->product_desc}}</p>
                                        </div>
                                        <div class="box-tocart d-flex">
                                            <form action="{{URL::to('add-cart/'.$de_pro->product_id)}}" method="post">{{csrf_field()}}
                                                <span>Số lượng</span>
                                                <input id="qty" class="input-text qty" name="qty" min="1" value="1" title="Qty" type="number">

                                                <div class="addtocart__actions">
                                                    <button class="tocart" type="submit" title="Add to Cart">Thêm vào giỏ hàng</button>
                                                </div>
                                            </form>                                           
                                        </div>
                                        <div class="product_meta price-box">
                                            <span class="posted_in">Thể loại: 
                                                <a href="{{URL::to('/danh-muc-san-pham/'.$de_pro->category_product_id)}}">{{$de_pro->category_product_name}}</a> 
                                            </span>
                                        </div>
                                        <div class="product_meta price-box">
                                            <span class="posted_in">NXB: 
                                                <a href="{{URL::to('/nha-xuat-ban/'.$de_pro->publisher_id)}}">{{$de_pro->publisher_name}}</a> 
                                            </span>
                                        </div>
                                        <div class="product-share">
                                            <ul>
                                                <li class="categories-title">Chia sẻ :</li>
                                                <li>
                                                    <a href="#">
                                                        <i class="icon-social-twitter icons"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="icon-social-tumblr icons"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="icon-social-facebook icons"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="icon-social-linkedin icons"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product__info__detailed">
                            <div class="pro_details_nav nav justify-content-start" role="tablist">
                                <a class="nav-item nav-link active" data-toggle="tab" href="#nav-details" role="tab">Tóm tắt</a>
                                <a class="nav-item nav-link" data-toggle="tab" href="#nav-review" role="tab">Đánh giá</a>
                            </div>
                            <div class="tab__container">
                                <!-- Start Single Tab Content -->
                                <div class="pro__tab_label tab-pane fade show active" id="nav-details" role="tabpanel">
                                    <div class="escription__attribute">
                                        <p>{{$de_pro->product_content}}</p>
                                    </div>
                                </div>
                                <!-- End Single Tab Content -->
                                <!-- Start Single Tab Content -->
                                <div class="pro__tab_label tab-pane fade" id="nav-review" role="tabpanel">
                                    <div class="review__attribute">
                                        <h1>Customer Reviews</h1>
                                        <h2>Hastech</h2>
                                        <div class="review__ratings__type d-flex">
                                            <div class="review-ratings">
                                                <div class="rating-summary d-flex">
                                                    <span>Quality</span>
                                                    <ul class="rating d-flex">
                                                        <li><i class="zmdi zmdi-star"></i></li>
                                                        <li><i class="zmdi zmdi-star"></i></li>
                                                        <li><i class="zmdi zmdi-star"></i></li>
                                                        <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                        <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                    </ul>
                                                </div>

                                                <div class="rating-summary d-flex">
                                                    <span>Price</span>
                                                    <ul class="rating d-flex">
                                                        <li><i class="zmdi zmdi-star"></i></li>
                                                        <li><i class="zmdi zmdi-star"></i></li>
                                                        <li><i class="zmdi zmdi-star"></i></li>
                                                        <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                        <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                    </ul>
                                                </div>
                                                <div class="rating-summary d-flex">
                                                    <span>value</span>
                                                    <ul class="rating d-flex">
                                                        <li><i class="zmdi zmdi-star"></i></li>
                                                        <li><i class="zmdi zmdi-star"></i></li>
                                                        <li><i class="zmdi zmdi-star"></i></li>
                                                        <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                        <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="review-content">
                                                <p>Hastech</p>
                                                <p>Review by Hastech</p>
                                                <p>Posted on 11/6/2018</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="review-fieldset">
                                        <h2>You're reviewing:</h2>
                                        <h3>Chaz Kangeroo Hoodie</h3>
                                        <div class="review-field-ratings">
                                            <div class="product-review-table">
                                                <div class="review-field-rating d-flex">
                                                    <span>Quality</span>
                                                    <ul class="rating d-flex">
                                                        <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                        <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                        <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                        <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                        <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                    </ul>
                                                </div>
                                                <div class="review-field-rating d-flex">
                                                    <span>Price</span>
                                                    <ul class="rating d-flex">
                                                        <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                        <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                        <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                        <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                        <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                    </ul>
                                                </div>
                                                <div class="review-field-rating d-flex">
                                                    <span>Value</span>
                                                    <ul class="rating d-flex">
                                                        <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                        <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                        <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                        <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                        <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="review_form_field">
                                            <div class="input__box">
                                                <span>Nickname</span>
                                                <input id="nickname_field" type="text" name="nickname">
                                            </div>
                                            <div class="input__box">
                                                <span>Summary</span>
                                                <input id="summery_field" type="text" name="summery">
                                            </div>
                                            <div class="input__box">
                                                <span>Review</span>
                                                <textarea name="review"></textarea>
                                            </div>
                                            <div class="review-form-actions">
                                                <button>Submit Review</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Tab Content -->
                            </div>
                        </div>
                    @endforeach
                    <div class="wn__related__product pt--80 pb--50">
                        <div class="section__title text-center">
                            <h2 class="title__be--2">Sản phẩm liên quan</h2>
                        </div>
                        <div class="row mt--60">
                            <div class="productcategory__slide--2 arrows_style owl-carousel owl-theme">
                                <!-- Start Single Product -->
                                @foreach($related_product as $key => $rel_pro)
                                    <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
                                        <div class="product__thumb">
                                            <a class="first__img" href="{{URL::to('/chi-tiet-san-pham/'.$rel_pro->product_id)}}"><img src="{{URL::to('uploads/product/'.$rel_pro->product_image)}}" alt="product image"></a>
                                            <a class="second__img animation1" href="{{URL::to('/chi-tiet-san-pham/'.$rel_pro->product_id)}}"><img src="{{URL::to('uploads/product/'.$rel_pro->product_image)}}" alt="product image"></a>
                                            <div class="hot__box">
                                                <span class="hot-label">BEST SALLER</span>
                                            </div>
                                        </div>
                                        <div class="product__content content--center">
                                            <h4><a href="{{URL::to('/chi-tiet-san-pham/'.$rel_pro->product_id)}}">{{$rel_pro->product_name}}</a></h4>
                                            <ul class="prize d-flex">
                                                <li>{{number_format($rel_pro->product_price).' VNĐ'}}</li>
                                                <li class="old_prize">0 VNĐ</li>
                                            </ul>
                                            <div class="action">
                                                <div class="actions_inner">
                                                    <ul class="add_to_links">
                                                        <li><a class="cart" href="cart.html"><i class="bi bi-shopping-bag4"></i></a></li>
                                                        <li><a class="wishlist" href="wishlist.html"><i class="bi bi-shopping-cart-full"></i></a></li>
                                                        <li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a></li>
                                                        <li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal"><i class="bi bi-search"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product__hover--content">
                                                <ul class="rating d-flex">
                                                    <li class="on"><i class="fa fa-star-o"></i></li>
                                                    <li class="on"><i class="fa fa-star-o"></i></li>
                                                    <li class="on"><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <!-- End Single Product -->
                                
                                
                            </div>
                        </div>
                    </div>
                    {{-- <div class="wn__related__product">
                        <div class="section__title text-center">
                            <h2 class="title__be--2">upsell products</h2>
                        </div>
                        <div class="row mt--60">
                            <div class="productcategory__slide--2 arrows_style owl-carousel owl-theme">
                                <!-- Start Single Product -->
                                <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="product__thumb">
                                        <a class="first__img" href="single-product.html"><img src="images/books/1.jpg" alt="product image"></a>
                                        <a class="second__img animation1" href="single-product.html"><img src="images/books/2.jpg" alt="product image"></a>
                                        <div class="hot__box">
                                            <span class="hot-label">BEST SALLER</span>
                                        </div>
                                    </div>
                                    <div class="product__content content--center">
                                        <h4><a href="single-product.html">robin parrish</a></h4>
                                        <ul class="prize d-flex">
                                            <li>$35.00</li>
                                            <li class="old_prize">$35.00</li>
                                        </ul>
                                        <div class="action">
                                            <div class="actions_inner">
                                                <ul class="add_to_links">
                                                    <li><a class="cart" href="cart.html"><i class="bi bi-shopping-bag4"></i></a></li>
                                                    <li><a class="wishlist" href="wishlist.html"><i class="bi bi-shopping-cart-full"></i></a></li>
                                                    <li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a></li>
                                                    <li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal"><i class="bi bi-search"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product__hover--content">
                                            <ul class="rating d-flex">
                                                <li class="on"><i class="fa fa-star-o"></i></li>
                                                <li class="on"><i class="fa fa-star-o"></i></li>
                                                <li class="on"><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Start Single Product -->
                                
                            </div>
                        </div>
                    </div> --}}
                </div>
               @include('client.layouts.menu2')
            </div>
        </div>
    </div>
@endsection