<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Product;
use App\Models\cart;
use App\Models\Order;




class HomeController extends Controller
{
      public function index(){
          $product = Product::paginate(10);
        return view('home.userpage',compact('product'));
      }



    public function redirect(){

        $usertype = Auth::user()->usertype;

        if($usertype == '1'){

            $total_product = Product::all()->count();
            $total_order = order::all()->count();
            $total_user = user::all()->count();
            $order = order::all();

            $total_revenue = 0;

            foreach($order as $order){

                $total_revenue = $total_revenue + $order->price;
            }

            $order_processing =  order::where('delivery_status','=','processing')->get()->count();
            $order_delivered =  order::where('delivery_status','=','delivered')->get()->count();


            
            
            
            return view ('admin.home',compact('total_product','total_order','total_user','total_revenue','order_processing','order_delivered'));
        }
        else{
            $product = Product::paginate(10);
        return view('home.userpage',compact('product'));
        }
    }

    public function productDetails($id){
        $product = product::find($id);

        return view('home.productDetails',compact('product'));

    }


    public function add_cart(Request $req,$id){

        if(Auth::id()){
           $user = Auth::user();

           $product = product::find($id);

           $cart = new cart;
           
           $cart->name = $user->name;
           $cart->email = $user->email;
           $cart->phone = $user->phone;
           $cart->user_id = $user->id;
        //    $cart->user_id = $user->id;
           $cart->product_title = $product->title;

           if($product->discount_price!=null){
            $cart->price = $product->discount_price*$req->qty;
           }
           else{
            $cart->price = $product->price*$req->qty;
           }
          
           $cart->image = $product->image;
           $cart->product_id = $product->id;
           $cart->quantity = $req->qty;

           $cart->save();

           return redirect()->back();



        }
        else{
            return redirect('login');
        }

    }

    public function show_cart(){


         $id = Auth::user()->id;

         $cart = cart::where('user_id','=',$id)->get();

         return view('home.show_cart',compact('cart'));

        
    }

    public function delete_cart($id){
        $cart = cart::find($id);
            $cart->delete();

            return redirect()->back()->with('message', 'Product delete from Cart successfully! ');        
    }

    public function cash_order(){

        $id = Auth::user()->id;
        //dd($id);

        $cart = cart::where('user_id','=',$id)->get();

        foreach($cart as $cart) 
        { 

        $order = new Order;

         $order->name = $cart->name;
         $order->email = $cart->email;
         $order->phone = $cart->phone;
         $order->address = $cart->address;
         $order->product_title = $cart->product_title;
         $order->quantity = $cart->quantity;
         $order->price = $cart->price;
         $order->image = $cart->image;
         $order->product_id = $cart->product_id;
         $order->product_id = $cart->product_id;

         $order->payment_status = "cash on delivery";
         $order->delivery_status = "processing";

         $order->save();

         $cart_id = $cart->id;

         $cart = cart::find($cart_id);
          
         $cart->delete();
       
        }

        return redirect()->back()->with('message', 'Your Order is received! We will contact with you soon...');



        
    }

    public function show_order(){

        if(Auth::id()){
           
            $order = order::all();

        return view('home.show_order',compact('order'));
        }

        else{
            return redirect('login');
        }
    }

    public function delete_order($id){
        
        $order = order::find($id);

        $order->delivery_status = 'You Cancelled the Order';
            $order->Save();

            return redirect()->back();  
        
    }
}
