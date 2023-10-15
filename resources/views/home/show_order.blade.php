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
   </head>
   <body>

   @if(session()->has('message'))
          <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">×</button>	
        {{ session()->get('message') }}
          </div>
        @endif

      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
          

         <div class="container">
            <h1 style="
    font-size: 1.5em;
    text-align: center;
    margin: 35px 0px;
    font-weight: 700;
    color: white;
    background-color: #eb3d3d;">Order List</h1>
         </div>

         <div class="container">
         <table class="table">
  <thead>

    

    <tr>
      <th scope="col">SL</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>

      <th scope="col">Product Title</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Payment Status</th>
      <th scope="col">Delivery Status</th>

      <th scope="col">Image</th>
      <th scope="col">Action</th>


    </tr>
  </thead>
  <tbody>

  @foreach($order as $order)  

    <tr>
      <th scope="row">{{$order->id}}</th>
      <td>{{$order->name}}</td>
      <td>{{$order->email}}</td>
      <td>{{$order->phone}}</td>
      <td>{{$order->product_title}}</td>
      <td>{{$order->quantity}}</td>
      <td>{{$order->price}}</td>
      <td>{{$order->payment_status}}</td>
      <td>{{$order->delivery_status}}</td>

      <td><img src="/product/{{$order->image}}" alt=""></td>

     

      <td>
      @if($order->delivery_status=='processing')
        <a href="{{url('delete_order',$order->id)}}" onclick="return confirm('Are You Sure to Cancel this order?')" class="btn btn-danger">Cancel Order</a>

     @else
     <p style="color:blue;">Order as Test</p>

     @endif
     </td>
   
    </tr>
  
      
    @endforeach

  </tbody>
</table>
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