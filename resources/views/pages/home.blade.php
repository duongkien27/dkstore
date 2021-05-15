@extends('layout')
@section('content')

<section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>
                        
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-6">
                                    <h1><span>DK</span>-Store</h1>
                                    <h2>Cung cấp tài khoản Premium</h2>
                                    <p>Giá cả phải chăng - Uy tín là vàng</p>
                                    <button type="button" class="btn btn-default get">Xem chi tiết</button>
                                </div>
                                <div class="col-sm-6">
                                    <img style="height: 300px; width: 300px" src="{{('public/frontend/images/netflix42.jpg')}}" class="girl img-responsive" alt="" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>DK</span>-Store</h1>
                                    <h2>Cung cấp tài khoản Premium</h2>
                                    <p>Giá cả phải chăng - Uy tín là vàng</p>
                                    <button type="button" class="btn btn-default get">Xem chi tiết</button>
                                </div>
                                <div class="col-sm-6">
                                    <img style="height: 300px; width: 300px" src="{{('public/frontend/images/spotify15.jpg')}}" class="girl img-responsive" alt="" />
                                </div>
                            </div>
                            
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>DK</span>-Store</h1>
                                    <h2>Cung cấp tài khoản Premium</h2>
                                    <p>Giá cả phải chăng - Uy tín là vàng</p>
                                    <button type="button" class="btn btn-default get">Xem chi tiết</button>
                                </div>
                                <div class="col-sm-6">
                                    <img style="height: 300px; width: 300px" src="{{('public/frontend/images/elsa25.jpg')}}" class="girl img-responsive" alt="" />
                                </div>
                            </div>
                            
                        </div>
                        
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section><!--/slider-->
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
                                <li><a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_id)}}"> <span class="pull-right">(50)</span>{{$brand->brand_name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div><!--/brands_products-->
                    
                 
                
                </div>
            </div>
            
            <div class="col-sm-9 padding-right">
               <div class="features_items"><!--features_items-->
                <h2 class="title text-center">Sản phẩm mới nhất</h2>
                @foreach($all_product as $key => $product)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                   
                        <div class="single-products">
                                <div class="productinfo text-center">
                                    <form action="{{URL::to('/save-cart')}}" method="POST">
                                        @csrf
                                    <input type="hidden" name="qty" value="1"/>
                                    <input type="hidden" name="productid_hidden" value="{{$product->product_id}}">
                                    <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
                                        <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" />
                                        <h2>{{number_format($product->product_price).'đ'}}</h2>
                                        <p>{{$product->product_name}}</p>
                                     </a>
                                        <button type="submit" class="btn btn-fefault cart" id="btn" name="add-to-cart">Thêm giỏ hàng</button>
                                    </form>

                                </div>
                              
                        </div>
                   
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                                <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach

            </div><!--features_items-->
            <span style="text-align: center;">{!!$all_product->render()!!}</span>
                
            </div>
        </div>
    </div>
</section>


        <!--/recommended_items-->
@endsection