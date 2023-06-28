@extends('admin.layouts.master')

@section('title')
	Chi tiết đơn hàng
@endsection

@section('content')
	
	<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Thông tin khách hàng
      </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th>Tên khách hàng</th>
              <th>Số điện thoại</th>
            </tr>
          </thead>
          <tbody>
            @foreach($order_by_id as $val_order)
              <tr>
                <td>{{ $val_order->customer_name }}</td>
                <td>{{ $val_order->customer_phone }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div><br><br>
  <div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Thông tin vận chuyển
      </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th>Tên người nhận</th>
               <th>Số điện thoại</th>
               <th>Địa chỉ nhận hàng</th>
            </tr>
          </thead>
          <tbody>
            @foreach($order_by_id as $key =>$val)
              <tr>
                
                <td>{{ $val->shipping_name }}</td>
                <td>{{ $val->shipping_phone }}</td>
                <td>{{ $val->shipping_address }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div><br><br>
  <div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Chi tiết đơn hàng
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
              <th>Số lượng</th>
              <th>Giá</th>
              <th>Tổng tiền</th>
              <th style="width:30px;">Sửa/xóa</th>
            </tr>
          </thead>
          <tbody>
            @foreach($order_details as $key =>$val_or_de)
              <tr>
                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                <td>{{ $val_or_de->product_name }}</td>
                <td>{{ $val_or_de->product_quantity }}</td>
                <td>{{ $val_or_de->product_price }}</td>
                <td>{{ number_format($val_or_de->product_quantity*$val_or_de->product_price) }} VNĐ</td>
                <td>
                  <a style="font-size: 20px;margin-right: 20px;" href="{{ URL::to('/view-order/'.$val->order_id) }}" class="active" ui-toggle-class="">
                    <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                  <a style="font-size: 20px;margin-right: 20px;" href="{{ URL::to('/delete-order/'.$val->order_id) }}" class="active" ui-toggle-class="">
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