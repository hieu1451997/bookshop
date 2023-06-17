@extends('admin.layouts.master')

@section('title')
	Cập nhật danh mục
@endsection

@section('content')
	
	<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
	        <header class="panel-heading">
	            Cập nhật danh mục sản phẩm
	            
	        </header>

	        <div class="panel-body">
	        	<?php  
					$message = Session::get('message');
					if ($message) {
						echo '<div class="form-group><span class="text-alert">'.$message.'</span></div>';
						Session::put('message',null);
					}
				?>
				@foreach ($edit_category_product as $key => $edit_value)
	            <div class=" form">
	            	
	                <form class="cmxform form-horizontal " id="commentForm" method="post" action="{{ URL::to('/update-category-product/'.$edit_value->category_product_id) }}" novalidate="novalidate">
	                	{{csrf_field()}}
	                    <div class="form-group ">
	                        <label for="cname" class="control-label col-lg-3">Tên danh mục</label>
	                        <div class="col-lg-6">
	                            <input class=" form-control" id="cname" name="category_product_name" minlength="2" type="text" required="" value="{{$edit_value->category_product_name}}">
	                        </div>
	                    </div>
	                    <div class="form-group ">
                            <label for="ccomment" class="control-label col-lg-3">Mô tả</label>
                            <div class="col-lg-6">
                                <textarea class="form-control " style="resize: none;" rows="5" id="ccomment" name="category_product_desc" required="" >{{$edit_value->category_product_desc}}</textarea>
                            </div>
                        </div>
                        <div class="form-group ">
                        	<label for="cname" class="control-label col-lg-3">Hiện/Ẩn</label>
                        	<div class="col-lg-6">
		                        <select class="form-control m-bot15" name="category_product_status">
		                        	@if($edit_value->category_product_status==0){
		                        		<option value="0">Hiện</option>
	                                	<option value="1">Ẩn</option>
		                        	}@else{
		                        		<option value="1">Ẩn</option>
		                        		<option value="0">Hiện</option>
	                                	
		                        	}@endif
	                                                                
	                            </select>
                        	</div>
                        </div>
	                    <div class="form-group">
	                        <div class="col-lg-offset-3 col-lg-6">
	                            <button class="btn btn-primary" type="submit" name="update_category_product">Cập nhật danh mục</button>
	                            <button class="btn btn-default" type="button">Hủy</button>
	                        </div>
	                    </div>
	                </form>
	               
	            </div>
	            @endforeach
	        </div>
	    </section>
	</div>
</div>
	
@endsection