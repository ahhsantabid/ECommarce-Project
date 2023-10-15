<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css');

  <style type="text/css" >
    .div_center{
        text-align:center;
        padding-top: 40px;
    }
    .font_style{
      font-size:40px;
      padding-bottom: 40px;
    }
    .input_color{
      color:black;
    }

    .table{
      margin:auto;
      width:60%;
      text-align:center;
      margin-top: 2rem;
      /* border:2px solid green; */
    }

    td{
      color: white;
    }
  
  </style>
  
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
    @include('admin.sideber');
      <!-- partial -->
     
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

          <div class="div_center">
            <h2 class="font_style" >Add Catagory</h2>

            <form action="{{url('/add_catagory')}}" method="POST">
              @csrf
              <input type="text" class="input_color" name="catagory_name" placeholder="Enter Catagory name">
              <input type="submit" class="btn btn-primary" name="submit" value="Add Catagory">
            </form>
          </div>

          <!-- <table>
            <tr>
              <td>Catagory Name</td>
              <td>Action</td>
            </tr>
          </table> -->

          <div class="table-responsive">
  <table class="table  table-hover table-condensed ">
    <thead>
      <tr>
   
        <th><strong style="color:white">Catagory Name</strong></th>
        <th><strong style="color:white">Action</strong></th>
      </tr>
    </thead>
    <tbody>

    @foreach($data as $data)
      <tr>
      <td>{{$data->catagory_name}}</td>
      <td><a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{url('delete_catagory',$data->id)}}">Remove</a></td>
      </tr>
      @endforeach

    </tbody>
  </table>
</div>

            </div>
             </div>

        <!-- partial -->
        <!-- @include('admin.partial'); -->
        <!-- main-panel ends -->
     
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script');

  </body>
</html>