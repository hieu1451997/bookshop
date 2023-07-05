@extends('admin.layouts.master')

@section('title')
	Thêm mới NXB
@endsection

@section('content')
	
	<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
	        <header class="panel-heading">
	            Thêm danh nhà xuất bản
	            
	        </header>

	        <div class="panel-body"> 
					
				@if (Session::has('message')) 
					<div class="alert alert-success">
						{{Session::get('message')}}
						{{Session::put('message',null)}}
					</div>
				
				@endif
				
	            <div class=" form">
	                <form class="cmxform form-horizontal " id="commentForm" method="post" action="{{ URL::to('/save-publisher') }}" novalidate="novalidate">
	                	{{csrf_field()}}
	                    <div class="form-group ">
	                        <label for="cname" class="control-label col-lg-3">Tên NXB</label>
	                        <div class="col-lg-6">
	                            <input class=" form-control" id="cname" name="publisher_name" minlength="2" type="text" required="">
	                        </div>
	                    </div>
	                    <div class="form-group ">
                            <label for="ccomment" class="control-label col-lg-3">Mô tả</label>
                            <div class="col-lg-6">
                                <textarea class="form-control " style="resize: none;" rows="5" id="ccomment" name="publisher_desc" required=""></textarea>
                            </div>
                        </div>
                        <div class="form-group ">
                        	<label for="cname" class="control-label col-lg-3">Hiện/Ẩn</label>
                        	<div class="col-lg-6">
		                        <select class="form-control m-bot15" name="publisher_status">
	                                <option value="0">Hiện</option>
	                                <option value="1">Ẩn</option>
	                                
	                            </select>
                        	</div>
                        </div>
	                    <div class="form-group">
	                        <div class="col-lg-offset-3 col-lg-6">
	                            <button class="btn btn-primary" type="submit" name="add_publisher">Thêm NXB</button>
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