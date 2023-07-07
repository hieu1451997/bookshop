@extends('admin.layouts.master')

@section('title')
	Chi tiết đơn hàng
@endsection

@section('content')
	
	<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Thông tin khách hàng đăng nhập
      </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th>Tên đăng nhập</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <td>{{ $customer->customer_name }}</td>
                <td>{{ $customer->customer_email }}</td>
              </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div><br><br>
  <div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Thông tin vận chuyển hàng
      </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th>Tên người nhận</th>
              <th>Số điện thoại</th>
              <th>Địa chỉ nhận hàng</th>
              <th>Hình thức thanh toán</th>
            </tr>
          </thead>
          <tbody>
              <tr>                
                <td>{{ $shipping->shipping_name }}</td>
                <td>{{ $shipping->shipping_phone }}</td>
                <td>{{ $shipping->shipping_address }}</td>
                <td>
                  @if($shipping->shipping_method==1)
                    Thanh toán khi nhận hàng
                  @endif
                </td>
              </tr>
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
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th>STT</th>
              <th>Tên sản phẩm</th>
              <th>Số lượng kho</th> 
              <th>Số lượng mua</th>             
              <th>Giá</th>
              <th>Tổng tiền</th>
            </tr>
          </thead>
          <tbody>
            <?php  
              $i=1;
              $total_price=0;
            ?>
            @foreach($or_de as $key =>$val_or_de)
            <?php  
              $subtotal=$val_or_de->product_price*$val_or_de->product_quantity;
              $total_price=$total_price+$subtotal;
            ?>
              <tr>
                <td>{{$i++}}</td>
                <td>{{ $val_or_de->product_name }}</td>  
                <td>{{ $val_or_de->product->product_quantity }}</td>             
                <td>
                    <input type="hidden" name="order_product_id" class="order_product_id" value="{{$val_or_de->product_id}}">
                    <input type="hidden" name="product_sales_quantity" value="{{ $val_or_de->product_quantity }}">{{ $val_or_de->product_quantity }}
                </td>
                <td>{{ $val_or_de->product_price }}</td>
                <td>{{ number_format($val_or_de->product_quantity*$val_or_de->product_price) }} VNĐ</td>
              </tr>
            @endforeach
          </tbody>
          <tr>
              <td colspan="6" style="font-size: 20px;">Tổng tiền thanh toán: {{number_format($total_price).' VNĐ'}}</td>
          </tr>
          <tr>
            <td colspan="6">
              @foreach($order as $key => $or)
                @if($or->order_status==1)
                  <form>
                    @csrf
                    <select class="form-control order_details">
                      <option value="0">---Chọn cách thức---</option>
                      <option selected id="{{$or->order_id}}" value="1">Chưa xử lý</option>
                      <option id="{{$or->order_id}}" value="2">Đã xử lý</option>
                      <option id="{{$or->order_id}}" value="3">Hủy đơn hàng</option>
                    </select>
                  </form>
                  @elseif($or->order_status==2)
                    <form>
                      @csrf
                      <select class="form-control order_details">
                        <option value="0">---Chọn cách thức---</option>
                        <option  id="{{$or->order_id}}" value="1">Chưa xử lý</option>
                        <option selected id="{{$or->order_id}}" value="2">Đã xử lý</option>
                        <option id="{{$or->order_id}}" value="3">Hủy đơn hàng</option>
                      </select>
                    </form>
                  @else
                     <form>
                      @csrf
                      <select class="form-control order_details">
                        <option value="0">---Chọn cách thức---</option>
                        <option  id="{{$or->order_id}}" value="1">Chưa xử lý</option>
                        <option  id="{{$or->order_id}}" value="2">Đã xử lý</option>
                        <option selected id="{{$or->order_id}}" value="3">Hủy đơn hàng</option>
                      </select>
                    </form>
                  @endif
                @endforeach
            </td>
          </tr>
        </table>      
        <div class="hd" style="text-align: center; width: 30%;background-color: chartreuse;font-size: 20px;height: 50px; padding-top: 10px;">
          <ul>
            <li><a style="width: 100%;" target="_blank" href="{{URL::to('/print-pdf/'.$val_or_de->order_code)}}">In hóa đơn</a></li>
          </ul>
          
        </div> 
      </div>
    </div>
  </div>
	   
@endsection