@extends('layout')
@section('content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/trang-chu')}}">Home</a></li>
				  <li class="active">Thông tin thanh toán</li>
				</ol>
			</div>

			<div class="register-req">
				<p>Vui lòng điền đầy đủ thông tin</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-md-3">
						<div class="shopper-info">
							<p>Thông tin khách hàng</p>
							<div>
								<?php
                                   $customer_email = Session::get('customer_email');
                                   $customer_name = Session::get('customer_name');
                                   $customer_phone = Session::get('customer_phone');
                					echo $customer_name."<br>";
                					echo 'Email: '.$customer_email."<br>";
                					echo 'Số điện thoại: '.$customer_phone;
                                 ?>
							</div>
						</div>
					</div>
					
					<div class="col-md-9 clearfix">
						<div class="bill-to">
							<p>Thông tin giao nhận</p>
							<div class="form-one">
								<form action="{{URL::to('save-checkout-customer')}}" method="POST">
									@csrf
									<input type="text" name="shipping_name" class="shipping_name" placeholder="Họ và tên người nhận">
									<input type="text" name="shipping_email" class="shipping_email" placeholder="Địa chỉ email">
									<input type="text" name="shipping_fb" class="shipping_fb" placeholder="Địa chỉ Facebook">
									<input type="text" name="shipping_phone" class="shipping_phone" placeholder="Số điện thoại">
									<textarea name="shipping_notes" class="shipping_notes" placeholder="Ghi chú" rows="5"></textarea>
									<input type="submit" value="Hoàn thành thanh toán" name="send_order" class="btn btn-primary btn-sm">
								</form>

							</div>
							
						</div>
					</div>
					
									
				</div>
			</div>
			<div class="review-payment">
				<h2>Xem lại giỏ hàng</h2>
			</div>
			<div class="table-responsive cart_info">
				<?php
				$content = Cart::content();
				
				?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Tên sp</td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Tổng</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($content as $v_content)
						<tr>
							<td class="cart_product">
								<a href=""><img height="50" width="50" src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" alt="" /></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$v_content->name}}</a></h4>
							</td>
							<td class="cart_price">
								<p>{{number_format($v_content->price).'đ'}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{URL::to('/update-cart-quantity')}}" method="POST">
									{{ csrf_field() }}
									<input class="cart_quantity_input" type="text" name="cart_quantity" size="3" value="{{$v_content->qty}}"  >
									<input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
									<input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">
									
									<?php
									$subtotal = $v_content->price * $v_content->qty;
									echo number_format($subtotal).'đ';
									?>
								</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

	</section> <!--/#cart_items-->

@endsection