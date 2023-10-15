<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css');
  <style type="text/css" >

.product_body{
    text-align:center;
}
label{
    display: inline-block;
    width: 200px;
}
input{
    display: inline-block;
}
.text_color{
    color:black;
    padding-bottom: 20px;
}
.font_size{
    font-size:35px;
    padding-bottom:35px;
    text-align: center;
}
.div_design{
     padding-bottom:15px;
}
.img_dev{
    margin-left: 10em;
    margin-bottom: 4em;
}
.btn{
    margin-left:9em;
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


        <div class="main-panel">
            <div class="content-wrapper">
            @if(session()->has('message'))
          <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">×</button>	
        {{ session()->get('message') }}
          </div>
        @endif
                <h1 class="font_size">Add Product</h1>
            <form action="{{url('/add_product')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="product_body">
            <div class="div_design">
                <label >Title</label>
                <input type="text" class="text_color"  name="title" placeholder="Enter Title" required >
            </div>

            <div class="div_design">
                <label >Description</label>
                <input type="text" class="text_color" name="discription" placeholder="Enter Description" >
            </div>

            <div class="div_design">
                <label >Quantity</label>
                <input type="number" class="text_color" name="quantity" min="0" placeholder="Enter Quantity" required >
            </div>

            <div class="div_design">
                <label >Price</label>
                <input type="number" class="text_color"  name="price" placeholder="Enter Price" required>
            </div>

            <div class="div_design">
                <label >Discount Price</label>
                <input type="number" class="text_color" name="discount_price" placeholder="Enter Discount Price" >
            </div>

            <div class="div_design">
                <label >Catagory</label>
                <select class="text_color" name="catagory" id="" >
                    <option value="" selected="">Add a catagory here</option>
                    @foreach($catagory as $catagory)
                    <option value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>
                    @endforeach
                </select>
            </div>

            
            <div class="img_dev">
                <label >Image</label>
                <input type="file" class="text_color" name="image" required>
            </div>
            <div  class="addProductBtn">
        
            <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
            <input type="submit" class="btn btn-primary" value="Add Product">
            </div>
            </form>
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