<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css');

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
                
            <div class="order_text_heading text-center" style="font-size: x-large;font-family: cursive;margin-bottom: 1.3em;color: aqua;">
                <h2>All Order List</h2>
            </div>
              
            <div class="container">

         
            <table class="table">
            <thead style="background-color: cyan;">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
                <th scope="col">Product Title</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Payment Status</th>
                <th scope="col">Delivery Status</th>
                <th scope="col">Image</th>
                <th scope="col">Delivered</th>




                </tr>
            </thead>
            <tbody style="color: whitesmoke;">

            @foreach($order as $order)
                <tr>
                <th scope="row">{{$order->id}}</th>
                <td>{{$order->name}}</td>
                <td>{{$order->email}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->address}}</td>
                <td>{{$order->product_title}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->price}}</td>
                <td>{{$order->payment_status}}</td>
                <td >{{$order->delivery_status}}</td>
               
                <td>
                    <img src="/product/{{$order->image}}" alt="" style="width: 4em;height: 4em;">
                </td>

                <td>

                @if($order->delivery_status == 'processing')
                    <a href="{{url('delivered',$order->id)}}" class="btn btn-success">Delivered</a>
                </td>

                @else 
                <p>Delivered</p>

                @endif


                </tr>

            @endforeach
                
            </tbody>
            </table>
            </div>
            </div>
            </div>
      </div>

     

      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script');

  </body>
</html>