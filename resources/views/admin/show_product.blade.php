<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css');
<style type="text/css" >
.img_size{
    width: 82px;
    height: 87px;
}
.data_color{
    color:white;
}
.head_color{
    background-color: skyblue;
}
</style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
    @include('admin.sideber');
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navber');
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
            @if(session()->has('message'))
          <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">×</button>	
        {{ session()->get('message') }}
          </div>
        @endif
            <div class="container">
            <table class="table">
  <thead class="head_color">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Discription</th>
      <th scope="col">Price</th>
      <th scope="col">Discount Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Catagory</th>
      <th scope="col">Image</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>



    </tr>
  </thead>
  <tbody>

  @foreach($product as $product)
    <tr>
      <td class="data_color">{{$product->id}}</td>
      <td class="data_color">{{$product->title}}</td>
      <td class="data_color">{{$product->discription}}</td>
      <td class="data_color">{{$product->quantity}}</td>
      <td class="data_color">{{$product->price}}</td>
      <td class="data_color">{{$product->discount_price}}</td>
      <td class="data_color">{{$product->catagory}}</td>
      <td class="data_color"><img class="img_size" src="/product/{{$product->image}}" alt="" ></td>

      <td class="data_color"><a href="{{url('edit_product',$product->id)}}" class="btn btn-info">Edit</a></td>
      <td class="data_color"><a href="{{url('delete_product',$product->id)}}" onclick="return confirm('Are You Sure to Delete?')" class="btn btn-danger">Delete</a></td>

    </tr>
    
        @endforeach
     
  </tbody>
</table>
            </div>
            </div>
            </div>

        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script');

  </body>
</html>