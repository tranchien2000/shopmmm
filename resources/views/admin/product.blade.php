<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.css')
  <style type="text/css">
    .title {
      color: white;
      padding-top: 25px;
      font-size: 25px;
    }

    label {
      display: inline-block;
      width: 200px;
    }
  </style>
</head>

<body>
  @include('admin.sidebar')
  <!-- sidebar -->
  @include('admin.navbar')
  <!-- navbar -->
  <div class="container-fluid page-body-wrapper">
    <div class="container" align="center">
      <h1 class="title">Thêm mặt hàng</h1>

      @if(session()->has('message'))
      <div class="alert alert-success">

        <button type="button" class="close" data-dismiss="alert">X</button>

        {{session()->get('message')}}
      </div>
      @endif
      
      <form action="{{url('uploadproduct')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div style="padding: 15px;">
          <label>Mặt hàng</label>
          <input style="color:black;" type="text" name="title" placeholder="Nhập sản phẩm" required="">
        </div>

        <div style="padding: 15px;">
          <label>Giá </label>
          <input style="color:black;" type="number" name="price" placeholder="Nhập giá tiền" required="">
        </div>

        <div style="padding: 15px;">
          <label>Thông tin</label>
          <input style="color:black;" type="text" name="des" placeholder="Nhập Mô tả" required="">
        </div>

        <div style="padding: 15px;">
          <label>Số lượng</label>
          <input style="color:black;" type="number" name="quantity" placeholder="Nhập số lượng" required="">
        </div>

        <div style="padding: 15px;">
          <input type="file" name="file">
        </div>

        <div>
          <input class="btn btn-success" type="submit" value="Thêm">
        </div>
      </form>
    </div>

  </div>
  <!-- body -->
  @include('admin.script')
</body>

</html>