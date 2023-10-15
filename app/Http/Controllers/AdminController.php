<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Product;
use App\Models\Order;



class AdminController extends Controller
{
    public function view_catagory()
    {
        $data = catagory::all()->sortByDesc('id');
        return view('admin.catagory',compact('data'));

    }

    public function  add_catagory(Request $req)
    {
        $data = new catagory();

       $data->catagory_name = $req->catagory_name;
       $data->save();

       return redirect()->back()->with('message','Catagory Added Successfully!');
    }

    public function delete_catagory($id)
    {

        $data = catagory::find($id);

        $data->delete();

        return redirect()->back()->with('message','Catagory Removed Successfully!');

        
    }

    public function view_product(){
           
        $catagory = catagory::all();
        return view('admin.product',compact('catagory'));
    }

    public function add_product(Request $req){

        $product = new product;

        $product->title = $req->title;
        $product->discription = $req->discription;
        $product->quantity = $req->quantity;
        $product->price = $req->price;
        $product->discount_price = $req->discount_price;
        $product->catagory = $req->catagory;

        $image = $req->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $req->image->move('product',$imagename);

        $product->image = $imagename;

        $product->save();

        return redirect()->back()->with('message','Product Added SUccessfully!');

    }

    public function show_product(){
        $product = product::all();
        return view('admin.show_product',compact('product'));
    }

    public function delete_product($id){

        $product = product::find($id);
        $product->delete();

        return redirect()->back()->with('message','Product Deleted SUccessfully!');
    }

    public function edit_product($id){

        $product = product::find($id);
        $catagory = catagory::all();

        return view('admin.edit_product',compact('product','catagory'));
    }
    
    public function edit_confirm_product(Request $req,$id){

        $product = product::find($id); 

        $product->title = $req->title;
        $product->discription = $req->discription;
        $product->quantity = $req->quantity;
        $product->price = $req->price;
        $product->discount_price = $req->discount_price;
        $product->catagory = $req->catagory;
        $image = $req->image;
        if($image)

        { 
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $req->image->move('product',$imagename);
        $product->image = $imagename;
        }
      

        $product->save();

        return redirect()->back()->with('message','Product Updated Successfully!');

    }

    public function order(){

        $order = Order::all();
        // dd($order);

        return view('admin.order',compact('order'));


    }

    public function delivered($id){

        $order = order::find($id);

        $order->delivery_status="delivered";

        
        $order->save();

        return redirect()->back();
    }

   
}
