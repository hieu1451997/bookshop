 @extends('client.layouts.master')

 @section('title')
    Home
 @endsection
 
 @section('slideshow')
    @include('client.layouts.slideshow')
 @endsection

 @section('content')
    <!-- Start BEst Seller Area -->
    <section class="wn__product__area brown--color pt--80  pb--30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section__title text-center">
                        <h2 class="title__be--2">Sản phẩm  <span class="color--theme">mới</span></h2>
                        <p>Nếu bạn chỉ đọc những cuốn sách mà tất cả mọi người đều đọc, bạn chỉ có thể nghĩ tới điều tất cả mọi người đều nghĩ tới.</p>
                    </div>
                </div>
            </div>
            <!-- Start Single Tab Content -->
           
                <!-- Start Single Product -->
                <div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--50">
                    <!-- Start Single Product -->
                    @foreach($all_product as $key => $pro)
                    <div class="product product__style--3">
                        <form>
                            @csrf
                            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                <div class="product__thumb">
                                    <a class="first__img" href="{{URL::to('/chi-tiet-san-pham/'.$pro->product_id)}}"><img  src="{{URL::to('uploads/product/'.$pro->product_image)}}" alt="product image"></a>
                                    <div class="hot__box">
                                        <span class="hot-label">NEW</span>
                                    </div>
                                </div>
                                <div class="product__content content--center">
                                    <h4><a href="{{URL::to('/chi-tiet-san-pham/'.$pro->product_id)}}">{{$pro->product_name}}</a></h4>
                                    <ul class="prize d-flex">
                                        <li>{{number_format($pro->product_price)}} VNĐ</li>
                                        {{-- <li class="old_prize">{{$pro->product_price}} VNĐ</li> --}}
                                    </ul>
                                    <div class="action">
                                        <div class="actions_inner">
                                            <ul class="add_to_links">
                                                <li><a class="cart" onclick="AddCart({{$pro->product_id}})"><i class="bi bi-shopping-cart-full"></i></a></li>
                                                <li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal" data-id_product="{{$pro->product_id}}"><i class="bi bi-search"></i></a></li>
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
                        </form>
                    </div>
                    @endforeach
                    <!-- Start Single Product -->
                    <!-- Start Single Product -->
                    
                </div>
                <!-- Start Single Product -->
               
            
            <!-- End Single Tab Content -->
        
    </section>
    <!-- Start BEst Seller Area -->
    <!-- Best Sale Area Area -->
    <!-- Footer Area -->
@endsection