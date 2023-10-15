<!DOCTYPE html>
<html>
   <head>
    <base href="/public">
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
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header');
         <!-- end header section -->

         <div class="col-sm-6 col-md-4 col-lg-4" style="margin:auto; width:70%; padding:30px;">
                  <div class="box">

                      <!-- <div class="heading">
                      <h1>Product Discription</h1> 
                      </div> -->
                      
                      <div class="img-box">
                        <img src="product/{{$product->image}}" alt="">
                     </div>
                     <div class="detail-box">
                       

                        <h5>
                          {{$product->discription}}
                        </h5>

                        @if($product->discount_price!=null)

                        
                        <h6 style=" color:red">Discount Price: 
                           {{$product->discount_price}}
                        </h6>
                      
                        <h6 style="text-decoration: line-through; color:blue">Price: 
                           {{$product->price}}
                        </h6>


                        @else
                     
                        <h6 style="color:blue">Price: 
                           {{$product->price}}
                        </h6>

                        @endif
                     </div>
                     <h5>Discription: {{$product->discription}}</h5>
                        <h5>Catagory: {{$product->catagory}}</h5>
                        <h5>Available Quantity: {{$product->quantity}}</h5>
                        <form action="{{url('add_cart',$product->id)}}" method="post">

                        @csrf

                        <div class="row" style="width=50%;">
                           <div class="col-md-4" style="width=50%;">
                              <input type="number" name="qty" value="1" min="1" style="width=100px">
                           </div>
                           <div class="col-md-4" style="width=50%;">
                              <input type="submit" value="Add to Cart">
                           </div>
                        </div>


                        </form>

                        
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