<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home | Bookshop Responsive Bootstrap4 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('frontend/images/icon.png') }}">

    <!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet"> 

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">

    <!-- Cusom css -->
   <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">

    <!-- Modernizer js -->
    <script src="{{ asset('frontend/js/vendor/modernizr-3.5.0.min.js') }}"></script>
</head>
<body>
    <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

    <!-- Main wrapper -->
    <div class="wrapper" id="wrapper">
        <!-- Header -->
        @include('client.layouts.header')
        <!-- //Header -->
        
        <!-- Start Slider area -->
        @yield('slideshow')
        <!-- End Slider area -->
        @yield('content')
        @include('client.layouts.footer')
        <!-- //Footer Area -->
        <!-- QUICKVIEW PRODUCT -->
        <div id="quickview-wrapper">
            <!-- Modal -->
            <div class="modal fade" id="productmodal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal__container" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal__header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-product">
                                <!-- Start product images -->
                                <div class="product-images">
                                    <div class="main-image images product_image_quickview">
                                        
                                    </div>
                                </div>
                                <!-- end product images -->
                                <div class="product-info">
                                    <h1 class="product_name_quickview"></h1>
                                    <div class="price-box-3">
                                        <div class="s-price-box">
                                            <span class="new-price product_price_quickview" ></span>
                                        </div>
                                    </div>
                                    <div class="quick-desc product_content_quickview">
                                        
                                    </div>
                                    <div class="select__color">
                                        <h2>Thể loại: </h2>
                                        <ul class="color__list">
                                            <li class="red"><a title="Red" href="#">Red</a></li>
                                        </ul>
                                    </div>
                                    <div class="select__size">
                                        <h2>NXB:</h2>
                                        <ul class="color__list">
                                            <li class="l__size"><a title="L" href="#">L</a></li>
                                        </ul>
                                    </div>
                                    <div class="social-sharing">
                                        <div class="widget widget_socialsharing_widget">
                                            <h3 class="widget-title-modal">Chia sẻ: </h3>
                                            <ul class="social__net social__net--2 d-flex justify-content-start">
                                                <li class="tumblr"><a href="#" class="tumblr social-icon"><i style="font-size: 30px;" class="bi bi-facebook"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="addtocart-btn addtocart_quickview">
                                         {{-- <a href="javascript:;" onclick="AddCart()">Add to cart</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END QUICKVIEW PRODUCT -->
    </div>
    <!-- //Main wrapper -->

    <!-- JS Files -->
    <script src="{{ asset('frontend/js/vendor/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins.js') }}"></script>
    <script src="{{ asset('frontend/js/active.js') }}"></script>
    <script>
        function AddCart(product_id){
            //console.log(product_id);
            $.ajax({
                // url:'http://localhost/bookshop/public/add-cart/'+product_id,
                url:'{{url('/add-cart')}}/'+product_id,
                type:'GET',
            }).done(function(response){
                console.log(response);
                RenderCart(response);
                alertify.success('Đã thêm vào giỏ hàng');
            });
        }
        $("#change-item-cart").on("click",".cart-delete i",function(){
            $.ajax({
                //url:'http://localhost/bookshop/public/delete-item-cart/'+$(this).data("id"),
                url:'{{url('/delete-item-cart')}}/'+$(this).data("id"),
                type:'GET',
            }).done(function(response){
                console.log(response);
                RenderCart(response);
                alertify.success('Đã xóa sản phẩm');
            });
            
        });
        function DeleteItemListCart(id){
            $.ajax({
                //url:'http://localhost/bookshop/public/delete-item-list-cart/'+id,
                url:'{{url('/delete-item-list-cart')}}/'+id,
                type:'GET',
            }).done(function(response){
                console.log(response);
                $("#list-item-cart").empty();
                $("#list-item-cart").html(response);
                
                if($("#total-quanty-cart-2").val() != null){
                    $("#quanty-product").text($("#total-quanty-cart-2").val()); 
                 } else{
                    $("#quanty-product").text(0);
                 }
                 
                alertify.success('Đã xóa sản phẩm');
            });
        }
        function RenderCart(response){
            $("#change-item-cart").empty();
            $("#change-item-cart").html(response);           
            
             if($("#total-quanty-cart").val() != null){
                $("#quanty-product").text($("#total-quanty-cart").val()); 
             } else{
                $("#quanty-product").text(0);
             }        
        }
        function SaveItemListCart(id){
            $.ajax({
                //url:'http://localhost/bookshop/public/save-item-list-cart/'+id+'/'+$("#quanty-item-"+id).val(),
                url:'{{url('/save-item-list-cart')}}/'+id+'/'+$("#quanty-item-"+id).val(),
                type:'GET',
            }).done(function(response){
                console.log(response);
                $("#list-item-cart").empty();
                $("#list-item-cart").html(response);
                //RenderCart(response);
                alertify.success('Đã cập nhật sản phẩm');
                if($("#total-quanty-cart-2").val() != null){
                    $("#quanty-product").text($("#total-quanty-cart-2").val()); 
                 } else{
                    $("#quanty-product").text(0);
                 }
                 //AddCart(id);
            });
        }

    </script>
    <script type="text/javascript">
        $('.quickview').click(function(){
            var product_id = $(this).data('id_product');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{url('/quickview-product')}}",
                method:"POST",
                dataType:"JSON",
                data:{product_id:product_id,_token:_token},
                success:function(data){
                    $('.product_name_quickview').html(data.product_name);
                    $('.product_price_quickview').html(data.product_price);
                    $('.product_content_quickview').html(data.product_content);
                    $('.product_image_quickview').html(data.product_image);
                    $('.addtocart_quickview').html(data.add_cart_quickview);
                }
            })
        })
    </script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
</body>
</html>