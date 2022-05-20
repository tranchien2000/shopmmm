<!DOCTYPE html>
<html lang="en">

<head>

  <base href="/public">
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
      <h1 class="title">Sửa thông tin mặt hàng</h1>

      @if(session()->has('message'))
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">X</button>
        {{session()->get('message')}}
      </div>
      @endif

      <form action="{{url('updateproduct',$data->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div style="padding: 15px;">
          <label>Mặt hàng</label>
          <input style="color:black;" type="text" name="title" required="" value="{{$data->title}}">
        </div>

        <div style="padding: 15px;">
          <label>Giá </label>
          <input style="color:black;" type="number" name="price" required="" value="{{$data->price}}">
        </div>

        <div style="padding: 15px;">
          <label>Thông tin</label>
          <input style="color:black;" type="text" name="des" required="" value="{{$data->description}}">
        </div>

        <div style="padding: 15px;">
          <label>Số lượng</label>
          <input style="color:black;" type="number" name="quantity" required="" value="{{$data->quantity}}">
        </div>

        <div style="padding: 15px;">
          <label>Image</label>
          <img height="200" width="300" src="/productimage/{{$data->image}}" alt="">
        </div>

        <div style="padding: 15px;">
          <label>Sửa Image</label>
          <input type="file" name="file">
        </div>

        <div style="padding: 15px;">
          <input class="btn btn-success" type="submit" value="Xác nhận">
        </div>
      </form>
    </div>
  </div>

  <!-- body -->
  @include('admin.script')
</body>

</html>