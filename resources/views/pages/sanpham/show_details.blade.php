@extends('layout')
@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Danh mục sản phẩm</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                      @foreach($category as $key => $cate)
                       
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></h4>
                            </div>
                        </div>
                    @endforeach
                    </div><!--/category-products-->
                
                    <div class="brands_products"><!--brands_products-->
                        <h2>Thương hiệu sản phẩm</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                @foreach($brand as $key => $brand)
                                <li><a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_id)}}"> <span class="pull-right"></span>{{$brand->brand_name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div><!--/brands_products-->
                    
                 
                
                </div>
            </div>
            
            <div class="col-sm-9 padding-right">
				@foreach($product_details as $key => $value)
				<div class="product-details"><!--product-details-->
										<div class="col-sm-5">
											<div class="view-product">
												<img style="height: 350px;width: 350px" src="{{URL::to('/public/uploads/product/'.$value->product_image)}}" alt="" />
											</div>
				
										</div>
										<div class="col-sm-7">
											<div class="product-information"><!--/product-information-->
												<img src="images/product-details/new.jpg" class="newarrival" alt="" />
												<h2>{{$value->product_name}}</h2>
												<p>Mã ID: {{$value->product_id}}</p>
												<img src="images/product-details/rating.png" alt="" />
												
												<form action="{{URL::to('/save-cart')}}" method="POST">
													{{ csrf_field() }}
												<span>
													<span>{{number_format($value->product_price).'đ'}}</span>
												
													<label>Số lượng:</label>
													<input name="qty" type="number" min="1"  value="1" />
													<input name="productid_hidden" type="hidden"  value="{{$value->product_id}}" />
													<button type="submit" class="btn btn-fefault cart">
														<i class="fa fa-shopping-cart"></i>
														Thêm giỏ hàng
													</button>
											
												</span>
												</form>
				
												<p><b>Tình trạng:</b> Còn hàng</p>
												<p><b>Điều kiện:</b> Mơi 100%</p>
												<p><b>Thương hiệu:</b> {{$value->brand_name}}</p>
												<p><b>Danh mục:</b> {{$value->category_name}}</p>
												<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
											</div><!--/product-information-->
										</div>
				</div><!--/product-details-->
				
									<div class="category-tab shop-details-tab"><!--category-tab-->
										<div class="col-sm-12">
											<ul class="nav nav-tabs">
												<li class="active"><a href="#details" data-toggle="tab">Mô tả</a></li>
												<li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>
											
												<li ><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
											</ul>
										</div>
										<div class="tab-content">
											<div class="tab-pane fade active in" id="details" >
												<p>{!!$value->product_desc!!}</p>
												
											</div>
											
											<div class="tab-pane fade" id="companyprofile" >
												<p>{!!$value->product_content!!}</p>
												
										
											</div>
											
											<div class="tab-pane fade" id="reviews" >
												<div class="col-sm-12">
													<p><b>Ghi lại phản hồi của bạn</b></p>
													
													<form action="#">
														<span>
															<input type="text" placeholder="Tên của bạn"/>
															<input type="email" placeholder="Địa chỉ Email"/>
														</span>
														<textarea name="" ></textarea>
														<b>Đánh giá: </b> <img src="images/product-details/rating.png" alt="" />
														<button type="button" class="btn btn-default pull-right">
															Gửi
														</button>
													</form>
												</div>
											</div>
											
										</div>
									</div><!--/category-tab-->
					@endforeach
									<div class="recommended_items"><!--recommended_items-->
										<h2 class="title text-center">Sản phẩm liên quan</h2>
										
										<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
											<div class="carousel-inner">
												<div class="item active">
											@foreach($relate as $key => $lienquan)
													<div class="col-sm-4">
														<div class="product-image-wrapper">
															 <div class="single-products">
																<div class="productinfo text-center">
																	<form action="{{URL::to('/save-cart')}}" method="POST">
                                        								@csrf
                                        								<input type="hidden" name="qty" value="1"/>
                                    									<input type="hidden" name="productid_hidden" value="{{$lienquan->product_id}}">
																	<a href="{{URL::to('/chi-tiet-san-pham/'.$lienquan->product_id)}}">
																	<img src="{{URL::to('public/uploads/product/'.$lienquan->product_image)}}" alt="" />
																	<h2>{{number_format($lienquan->product_price).'đ'}}</h2>
																	<p>{{$lienquan->product_name}}</p>
																	</a>
																	<button type="submit" class="btn btn-fefault cart" id="btn" name="add-to-cart">Thêm giỏ hàng</button>
																	</form>
																</div>
															  
															</div>
														</div>
													</div>

											@endforeach
								<?php
                                   $cate_id = Session::get('cate_more'); 
                                 ?>	
				<p style="text-align: center"><a href="{{URL::to('/danh-muc-san-pham/'.$cate_id)}}">Xem thêm</a></p>
												
												</div>	
											</div>	
										</div>
									</div><!--/recommended_items-->
                
            </div>
        </div>
    </div>
</section>


        <!--/recommended_items-->
@endsection
