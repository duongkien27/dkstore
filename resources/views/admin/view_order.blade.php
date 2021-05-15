@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  
  <div class="panel panel-default">
    <div class="panel-heading">
     Thông tin khách hàng
    </div>
    
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
           
            <th>Tên khách hàng</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$order_by_id->customer_name}}</td>
            <td>{{$order_by_id->customer_phone}}</td>
            <td>{{$order_by_id->customer_email}}</td>
          </tr>
     
        </tbody>
      </table>

    </div>
   
  </div>
</div>
<br>
<div class="table-agile-info">
  
  <div class="panel panel-default">
    <div class="panel-heading">
     Thông tin giao nhận
    </div>
    
    
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
           
            <th>Tên người nhận</th>
            <th>Địa chỉ Email</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ Faceook</th>
            <th>Hình thức thanh toán</th>
            <th>Trạng thái thanh toán</th>
            <th>Ghi chú</th>
          
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        
          <tr>
           
            <td>{{$order_by_id->shipping_name}}</td>
            <td>{{$order_by_id->shipping_email}}</td>
             <td>{{$order_by_id->shipping_phone}}</td>
             <td>{{$order_by_id->shipping_fb}}</td>
             <td>{{$order_by_id->payment_method}}</td>
             <td>{{$order_by_id->payment_status}}</td>
             <td>{{$order_by_id->shipping_notes}}</td>
            
          
          </tr>
     
        </tbody>
      </table>

    </div>
   
  </div>
</div>
<br>
<div class="table-agile-info">
  
  <div class="panel panel-default">
    <div class="panel-heading">
     Chi tiết đơn hàng
    </div>
    
    
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
           
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
          
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($product_order_by_id as $key => $details)
          <tr>
           
            <td>{{$details->product_name}}</td>
            <td>{{$details->product_sales_quantity}}</td>
            <td>{{$details->product_price}}</td>
          </tr>
          @endforeach
            <th>Tổng:</th>
            <th></th>
            <th>{{$order_by_id->order_total}}</th>
        </tbody>
      </table>

    </div>
   <a target="_blank" href="{{URL::to('/print-order/'.$order_by_id->order_details_id)}}">In hóa đơn</a>
  </div>
</div>
@endsection