@if(session()->has('message'))
<div class="alert alert-success">

  <button type="button" class="close" data-dismiss="alert">X</button>

  {{session()->get('message')}}
</div>
@endif
<div class="latest-products">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Mặt hàng</h2>
          <!-- <a href="products.html">view all products <i class="fa fa-angle-right"></i></a> -->
          <form class="form-inline" style="float: right;padding:20px;" action="{{url('search')}}" method="get">
            @csrf
            <input class="form-control" name="search" type="search" placeholder="">
            <input class="btn" style="background-color: green ;color: white;" type="submit" value="Search">
          </form>

        </div>
      </div>

      @foreach($data as $product)

      <div class="col-md-4">
        <div class="product-item">
          <a href="#"><img height="400" width="300" src="/productimage/{{$product->image}}" alt=""></a>
          <div class="down-content">
            <a href="#">
              <h4>{{$product->title}}</h4>
            </a>
            <h6>{{$product->price}}</h6>
            <p>{{$product->description}}</p>
            <form action="{{url('addcart',$product->id)}}" method="post">

              @csrf
              <input type="number" value="1" min='1' class="form-control" name="quantity">
              <input type="submit" class="btn" style="background-color: green;color: white; " value="Thêm vào giỏ hàng">

            </form>
          </div>
        </div>
      </div>

      @endforeach
      @if(method_exists($data,'links'))
      <div class="d-flex justify-content-center">
        {!! $data->links() !!}
      </div>
      @endif


    </div>
  </div>
</div>