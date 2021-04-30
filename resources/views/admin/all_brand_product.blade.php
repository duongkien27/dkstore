@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê thương hiệu sản phẩm
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
                <form action="{{URL::to('/')}}" method="POST">
          {{csrf_field()}}
          <div class="search_box pull-right">
            <input type="text" name="keywords_submit" placeholder="Tìm kiếm sản phẩm"/>
            <input type="submit" style="margin-top:0;color:#666" name="search_items" class="btn btn-primary btn-sm" value="Lọc">
            </div>
        </form>                   
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Lọc</button>
          </span>
        </div>
      </div>
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
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên thương hiệu</th>
            <th>Mô tả</th>
            <th>Trạng thái</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_brand_product as $key => $brand_pro)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $brand_pro->brand_name }}</td>
            <td>{{ $brand_pro->brand_desc }}</td>
            <td><span class="text-ellipsis">
              <?php
               if($brand_pro->brand_status==1){
                ?>
                <a href="{{URL::to('/unactive-brand-product/'.$brand_pro->brand_id)}}"><i class="fa fa-check-circle"style="font-size: 30px; color: green" ></i></a>
                <?php
                 }else{
                ?>  
                 <a href="{{URL::to('/active-brand-product/'.$brand_pro->brand_id)}}"><i class="fa fa-times-circle" style="font-size: 30px; color: red"></i></a>
                <?php
               }
              ?>
            </span></td>
           
            <td>
              <a href="{{URL::to('/edit-brand-product/'.$brand_pro->brand_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này ko?')" href="{{URL::to('/delete-brand-product/'.$brand_pro->brand_id)}}" class="active styling-edit" ui-toggle-class="">
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
        <span>{!!$all_brand_product->render()!!}</span>
      </div>
    </footer>
  </div>
</div>
@endsection