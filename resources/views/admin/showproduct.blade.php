<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.css')
</head>

<body>
  @include('admin.sidebar')
  <!-- sidebar -->
  @include('admin.navbar')
  <!-- navbar -->

  <div class="container-fluid page-body-wrapper">
    <div class="container" align="center">

      @if(session()->has('message'))
      <div class="alert alert-success">

        <button type="button" class="close" data-dismiss="alert">X</button>

        {{session()->get('message')}}
      </div>
      @endif

      <table>
        <tr style="background-color: darkblue; align-items: center;">
          <td style="padding:18px;border-right: 1px solid white;">Mặt hàng</td>
          <td style="padding:18px;border-right: 1px solid white;">Thông tin</td>
          <td style="padding:18px;border-right: 1px solid white;">Số lượng</td>
          <td style="padding:18px;border-right: 1px solid white;">Giá</td>
          <td style="padding:18px;border-right: 1px solid white;">Image</td>
          <td style="padding:18px;border-right: 1px solid white;">Sửa</td>
          <td style="padding:18px;">Xóa</td>
        </tr>

        @foreach ($data as $product)
        <tr align="center" style="background-color: black; align-items: center;">
          <td style="border-right: 1px solid white;">{{$product->title}}</td>
          <td style="border-right: 1px solid white;">{{$product->description}}</td>
          <td style="border-right: 1px solid white;">{{$product->quantity}}</td>
          <td style="border-right: 1px solid white;">{{$product->price}}$</td>
          <td style="border-right: 1px solid white;"><img height="200" width="300" src="/productimage/{{$product->image}}"></td>

          <td style="border-right: 1px solid white;">
            <a class="btn btn-primary" href="{{url('updateview',$product->id)}}">Sửa</a>
          </td>
          <td>
            <a class="btn btn-danger" href="{{url('deleteproduct', $product->id)}}">Xóa</a>
          </td>
        </tr>

        @endforeach
      </table>

    </div>
  </div>

  <!-- body -->
  @include('admin.script')
</body>

</html>