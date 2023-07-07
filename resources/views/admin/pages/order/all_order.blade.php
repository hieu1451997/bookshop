@extends('admin.layouts.master')

@section('title')
	Danh sách đơn hàng
@endsection

@section('content')
	
	<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Danh sách đơn hàng
      </div>
      <div class="row w3-res-tb">
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
              <th>STT</th>
              <th>Mã đơn hàng</th>
              <th>Ngày đặt hàng</th>
              <th>Tình trạng</th>
              <th>Chi tiết/Xóa</th>
            </tr>
          </thead>
          <tbody>
            <?php  
              $i=1;
            ?>
            @foreach($all_order as $key =>$val)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$val->order_code}}</td>
                <td>{{$val->created_at}}</td>
                <td class="order_status">
                  @if($val->order_status==1)
                    Đơn hàng mới
                  @elseif($val->order_status==2)
                    Đã xử lý
                  @else
                    Hủy đơn hàng
                  @endif
                </td>
                <td>
                  <a style="font-size: 20px;margin-right: 20px;" href="{{ URL::to('/view-order/'.$val->order_code) }}" class="active" ui-toggle-class="">
                    <i class="fa fa-eye text-success text-active"></i></a>
                  <a style="font-size: 20px;margin-right: 20px;" href="{{ URL::to('/delete-order/'.$val->order_code) }}" class="active" ui-toggle-class="">
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