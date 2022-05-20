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
          <td style="padding:18px;border-right: 1px solid white;">Tên khách hàng</td>
          <td style="padding:18px;border-right: 1px solid white;">Phone</td>
          <td style="padding:18px;border-right: 1px solid white;">Địa chỉ</td>
          <td style="padding:18px;border-right: 1px solid white;">Tên mặt hàng </td>
          <td style="padding:18px;border-right: 1px solid white;">Giá</td>
          <td style="padding:18px;border-right: 1px solid white;">Số lượng</td>
          <td style="padding:18px;border-right: 1px solid white;">Status</td>
          <td style="padding:18px;">Action</td>
        </tr>

        @foreach ($order as $orders)
        <tr align="center" style="background-color: black; align-items: center;">
          <td style="padding:18px;border-right: 1px solid white;">{{$orders->name}}</td>
          <td style="padding:18px;border-right: 1px solid white;">{{$orders->phone}}</td>
          <td style="padding:18px;border-right: 1px solid white;">{{$orders->address}}</td>
          <td style="padding:18px;border-right: 1px solid white;">{{$orders->product_name}}</td>
          <td style="padding:18px;border-right: 1px solid white;">{{$orders->price}}$</td>
          <td style="padding:18px;border-right: 1px solid white;">{{$orders->quantity}}</td>
          <td style="padding:18px;border-right: 1px solid white;">{{$orders->status}}</td>
          <td><a class="btn btn-success" href="{{url('updatestatus',$orders->id)}}">Xác nhận</a></td>
        </tr>
        @endforeach

      </table>


    </div>
  </div>

  <!-- body -->
  @include('admin.script')
</body>

</html>