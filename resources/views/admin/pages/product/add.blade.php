@extends('admin.layouts.master')

@section('title')
	Thêm mới sản phẩm
@endsection

@section('content')
	
	<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
	        <header class="panel-heading">
	            Thêm mới sản phẩm
	            
	        </header>

	        <div class="panel-body">
	        	@if (Session::has('message')) 
					<div class="alert alert-success">
						{{Session::get('message')}}
						{{Session::put('message',null)}}
					</div>
				
				@endif
	            <div class=" form">
	                <form class="cmxform form-horizontal " id="commentForm" method="post" action="{{ URL::to('/save-product') }}" novalidate="novalidate" enctype="multipart/form-data">
	                	{{csrf_field()}}
	                    <div class="form-group ">
	                        <label for="cname" class="control-label col-lg-3">Tên sản phẩm</label>
	                        <div class="col-lg-6">
	                            <input class=" form-control" id="cname" name="product_name" minlength="2" type="text" required="">
	                        </div>
	                    </div>
	                    <div class="form-group ">
                        	<label for="cname" class="control-label col-lg-3">Danh mục sản phẩm</label>
                        	<div class="col-lg-6">
		                        <select class="form-control m-bot15" name="category_product_name">
		                        	@foreach($category_product as $key => $cate_pro)
		                                <option value="{{$cate_pro->category_product_id}}">{{$cate_pro->category_product_name}}</option>
	                                @endforeach                               
	                            </select>
                        	</div>
                        </div>
                        <div class="form-group ">
                        	<label for="cname" class="control-label col-lg-3">Nhà xuất bản</label>
                        	<div class="col-lg-6">
		                        <select class="form-control m-bot15" name="publisher_name">
	                                @foreach($publisher as $key => $val)
		                                <option value="{{$val->publisher_id}}">{{$val->publisher_name}}</option>
	                                @endforeach
	                                
	                            </select>
                        	</div>
                        </div>
	                    <div class="form-group ">
                            <label for="ccomment" class="control-label col-lg-3">Mô tả sản phẩm</label>
                            <div class="col-lg-6">
                                <textarea class="form-control " style="resize: none;" rows="5" id="ccomment" name="product_desc" required=""></textarea>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="ccomment" class="control-label col-lg-3">Tóm tắt sản phẩm</label>
                            <div class="col-lg-6">
                                <textarea class="form-control " style="resize: none;" rows="5" id="ccomment" name="product_content" required=""></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group ">
	                        <label for="cname" class="control-label col-lg-3">Giá sản phẩm</label>
	                        <div class="col-lg-6">
	                            <input class=" form-control" id="cname" name="product_price" minlength="2" type="text" required="">
	                        </div>
	                    </div>
	                    <div class="form-group">
                            <label for="cname" class="control-label col-lg-3">Ảnh sản phẩm</label>
	                        <div class="col-lg-6">
	                            <input class=" form-control" id="cname" name="product_image" minlength="2" type="file" required="">
	                        </div>
                        </div>
	                    <div class="form-group ">
                        	<label for="cname" class="control-label col-lg-3">Hiện/Ẩn</label>
                        	<div class="col-lg-6">
		                        <select class="form-control m-bot15" name="product_status">
	                                <option value="0">Hiện</option>
	                                <option value="1">Ẩn</option>
	                                
	                            </select>
                        	</div>
                        </div>
	                    <div class="form-group">
	                        <div class="col-lg-offset-3 col-lg-6">
	                            <button class="btn btn-primary" type="submit" naem="add_category_product">Thêm sản phẩm</button>
	                            <button class="btn btn-default" type="button">Hủy</button>
	                        </div>
	                    </div>
	                </form>
	            </div>

	        </div>
	    </section>
	</div>
</div>
	
@endsection