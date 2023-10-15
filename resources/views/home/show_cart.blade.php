<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />


      <style type="text/css" >
.img_size{
    width: 82px;
    height: 87px;
}
.data_color{
    color:red;
}
.head_color{
    background-color: skyblue;
}


</style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->

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
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>



    </tr>
  </thead>
  <tbody>

  <?php  $totalPrice = 0; ?>

  @foreach($cart as $cart)
    <tr>
      <td class="data_color">{{$cart->id}}</td>
      <td class="data_color">{{$cart->product_title}}</td>
      <td class="data_color">{{$cart->quantity}}</td>
      <td class="data_color">${{$cart->price}}</td>
      <td class="data_color"><img class="img_size" src="/product/{{$cart->image}}" alt="" ></td>

      <td class="data_color"><a href="{{url('delete_cart',$cart->id)}}" onclick="return confirm('Are You Sure to Delete?')" class="btn btn-danger">Delete</a></td>

    </tr>
      
    <?php $totalPrice = $totalPrice + $cart->price; ?>
        @endforeach

     
  </tbody>
</table>

<span class="total_price_text" style="margin-left: 26em; marfont-family: cursive;font-weight: 900;font-size: large;color: blue;">Total Price: ${{$totalPrice}}</span> 

            </div>
            </div>

            <div class="payment_process" style="width: 95%;text-align: center;padding: 34px;">
              <a href="{{url('cash_order')}}" class="btn btn-info">Cash On Delivery</a>
              <a href="" class="btn btn-success">Online Payment</a>


            </div>
           </div>
            </div>
            

     
      <!-- footer start -->
      @include('home.footer');
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <span style="color: crimson;">ahhsantabid10@gmail.com</span><br>
         
            Distributed By <span style="color: crimson;">AhhsanTabid</span>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>