@extends('admin.layouts.master')

@section('title')
	Danh sách danh mục sản phẩm 
@endsection

@section('content')
	
	<div class="table-agile-info">
      <div class="panel panel-default">
        <div class="panel-heading">
          Danh sách danh mục sản phẩm
        </div>
        <div class="row w3-res-tb">
          <div class="col-sm-5 m-b-xs">
            <select class="input-sm form-control w-sm inline v-middle">
              <option value="0">Bulk action</option>
              <option value="1">Delete selected</option>
              <option value="2">Bulk edit</option>
              <option value="3">Export</option>
            </select>
            <button class="btn btn-sm btn-default">Apply</button>                
          </div>
          <div class="col-sm-4">
          </div>
          <div class="col-sm-3">
            <div class="input-group">
              <input type="text" class="input-sm form-control" placeholder="Search">
              <span class="input-group-btn">
                <button class="btn btn-sm btn-default" type="button">Tìm kiếm</button>
              </span>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-striped b-t b-light">
            <thead>
              <tr>
                <th style="width:20px;">
                  <label class="i-checks m-b-none">
                    <input type="checkbox"><i></i>
                  </label>
                </th>
                <th>Tên danh mục</th>
                <th>Mo ta</th>
                <th>Hiện/Ẩn</th>
                <th>Ngày thêm</th>
                <th style="width:30px;"></th>
              </tr>
            </thead>
            <tbody>
              @if (Session::has('message')) 
                <div class="alert alert-success">
                  {{Session::get('message')}}
                  {{Session::put('message',null)}}
                </div>
              
              @endif
              @foreach($all_category_product as $key =>$cate_pro)
                <tr>
                  <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                  <td>{{ $cate_pro->category_product_name }}</td>
                  <td>{{ $cate_pro->category_product_desc }}</td>
                  <td>
                    <span class="text-ellipsis">
                        @if ($cate_pro->category_product_status==0) {{"Hiển thị"}}                    
                        @else {{"An"}}  
                        @endif
                        
                    </span>
                  </td>
                  <td><span class="text-ellipsis">{{ $cate_pro->created_at }}</span></td>
                  <td>
                    <a href="{{ URL::to('/edit-category-product/'.$cate_pro->category_product_id) }}" class="active" ui-toggle-class="">
                      <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                    <a href="{{ URL::to('/delete-category-product/'.$cate_pro->category_product_id) }}" class="active" ui-toggle-class="">
                      <i class="fa fa-times text-danger text"></i>
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <footer class="panel-footer">
          <div class="row">
            
            <div class="col-sm-5 text-center">
            </div>
            <div class="col-sm-7 text-right text-center-xs">                
              <ul class="pagination pagination-sm m-t-none m-b-none">
                <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                <li><a href="">1</a></li>
                <li><a href="">2</a></li>
                <li><a href="">3</a></li>
                <li><a href="">4</a></li>
                <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
              </ul>
            </div>
          </div>
        </footer>
      </div>
    </div>
	
@endsection