@extends('admin.layouts.master')

@section('title')
	Danh sách sản phẩm 
@endsection

@section('content')
	
	<div class="table-agile-info">
      <div class="panel panel-default">
        <div class="panel-heading">
          Danh sách sản phẩm
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
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Thể loại</th>
                <th>NXB</th>
                <th>Mô tả</th>
                <th>Tóm tắt</th>
                <th>Giá</th>
                <th>SL</th>
                <th>Hiện/Ẩn</th>
                <th style="width:30px;">Edit</th>
              </tr>
            </thead>
            <tbody>
              @if (Session::has('message')) 
                <div class="alert alert-success">
                  {{Session::get('message')}}
                  {{Session::put('message',null)}}
                </div>
              
              @endif
              @foreach($all_product as $key =>$pro)
                <tr>
                  <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                  <td>{{ $pro->product_name }}</td>
                  <td><img src="uploads/product/{{ $pro->product_image }}" height="100" width="100"></td>
                  <td>{{ $pro->category_product_name }}</td>
                  <td>{{ $pro->publisher_name }}</td>
                  <td>{{ $pro->product_desc }}</td>
                  <td>{{ $pro->product_content }}</td>
                  <td>{{ $pro->product_price }}</td>
                  <td>{{ $pro->product_quantity }}</td>
                  <td>
                    <span class="text-ellipsis">
                        @if ($pro->product_status==0) {{"Hiển thị"}}                    
                        @else {{"An"}}  
                        @endif
                        
                    </span>
                  </td>
                  <td>
                    <a href="{{ URL::to('/edit-product/'.$pro->product_id) }}" class="active" ui-toggle-class="">
                      <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                    <a href="{{ URL::to('/delete-product/'.$pro->product_id) }}" class="active" ui-toggle-class="">
                      <i class="fa fa-times text-danger text"></i>
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
            <form action="{{url('/import-product')}}" method="POST" enctype="multipart/form-data">
                @csrf
              <input type="file" name="file" accept=".xlsx"><br>
             <input type="submit" value="Nhập excel" name="import_csv" class="btn btn-warning">
              </form>
             <form action="{{url('/export-product')}}" method="POST">
                @csrf
             <input type="submit" value="Xuất excel" name="export_csv" class="btn btn-success">
            </form>

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