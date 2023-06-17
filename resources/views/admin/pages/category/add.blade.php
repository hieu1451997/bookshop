@extends('admin.layouts.master')

@section('title')
	Thêm mới danh mục
@endsection

@section('content')
	
	<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
	        <header class="panel-heading">
	            Thêm danh mục sản phẩm
	            
	        </header>

	        <div class="panel-body">
	        	<?php  
					$message = Session::get('message');
					if ($message) {
						echo '<div class="form-group><span class="text-alert">'.$message.'</span></div>';
						Session::put('message',null);
					}
				?>
	            <div class=" form">
	                <form class="cmxform form-horizontal " id="commentForm" method="post" action="{{ URL::to('/save-category-product') }}" novalidate="novalidate">
	                	{{csrf_field()}}
	                    <div class="form-group ">
	                        <label for="cname" class="control-label col-lg-3">Tên danh mục</label>
	                        <div class="col-lg-6">
	                            <input class=" form-control" id="cname" name="category_product_name" minlength="2" type="text" required="">
	                        </div>
	                    </div>
	                    <div class="form-group ">
                            <label for="ccomment" class="control-label col-lg-3">Mô tả</label>
                            <div class="col-lg-6">
                                <textarea class="form-control " style="resize: none;" rows="5" id="ccomment" name="category_product_desc" required=""></textarea>
                            </div>
                        </div>
                        <div class="form-group ">
                        	<label for="cname" class="control-label col-lg-3">Hiện/Ẩn</label>
                        	<div class="col-lg-6">
		                        <select class="form-control m-bot15" name="category_product_status">
	                                <option value="0">Hiện</option>
	                                <option value="1">Ẩn</option>
	                                
	                            </select>
                        	</div>
                        </div>
	                    <div class="form-group">
	                        <div class="col-lg-offset-3 col-lg-6">
	                            <button class="btn btn-primary" type="submit" naem="add_category_product">Thêm danh muc</button>
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