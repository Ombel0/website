<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


// METHOD INDEX

    public function index()
    {
        if(Auth::id())
        {
            return redirect('redirect');
        }
        else
        {


            $data = product::paginate(3);    //product::all()

            return view('user.home',compact('data'));
        }

    }


// METHOD SEARCH

       public function search(Request $request)

        {

            $search = $request->search;

              if($search == '')
            {
                $data = product::paginate(3);    //product::all()

                return view('user.home',compact('data'));
            }

            $user = auth()->user();
            $count = cart::where('phone' , $user->phone)->count();
            $data = Product::where('title','like','%'.$search.'%')->get() ;

            return view('user.home',compact('data','count'));


        }



// METHOD REDIRECT

    public function redirect()
    {
       $usertype = Auth::user()->usertype;

       if($usertype == '1')
       {
        return view('admin.home');     //page welcome
       }

       else
       {

        $data = product::paginate(3);  //product::all()
        $user = auth()->user();
        $count = cart::where('phone' , $user->phone)->count();
        return view('user.home',compact('data','count'));
       }
    }

// METHOD ADDCART

    public function addcart(Request $request,$id)
    {
          if(Auth::id())
          {
            $user = auth()->user();

            $product = Product::find($id);

            $cart = new Cart ;

            $cart->name = $user->name;  //omar data base
            $cart->phone = $user->phone;
            $cart->address = $user->adress;
            $cart->product_title = $product->title;
            $cart->price = $product->price;
            $cart->quantity = $request->quantity;


            $cart->save();

             return redirect()->back()->with('message',' Add Product  successfuly');
          }

          else

          {
            return redirect('login');
          }
    }

//    METHOD SHOWCART

    public function showcart()
    {
        $user = auth()->user();

        $cart = cart::where('phone',$user->phone)->get();
        $count = cart::where('phone' , $user->phone)->count();

        return view('user.showcart',compact('count','cart'));
    }


//METHOD DELETECART
    public function deletecart($id)
    {
        $data = cart::find($id);

        $data->delete();

        return redirect()->back()->with('message','  Product Revomed successfuly');
    }
//METHOD CONFIRMORDER

public function confirmorder(Request $request)
{
      $user = auth()->user();

      $name = $user->name;
      $phone = $user->phone;
      $address = $user->address;





      foreach($request->productname as   $key=>$productname)

      {
             $order = new Order;  // create object order


             $order->product_name = $request->productname[$key];
             $order->price = $request->price[$key];
             $order->quantity  =  $request->quantity[$key];
             $order->name = $name;
             $order->phone  = $phone;
             $order->address   = $address;
             $order->status   = 'not delivered';
             $order->save();
      }

      DB::table('carts')->where('phone',$phone)->delete();   // when the request is confirmed deleted

      return redirect()->back()->with('message','  Order successfuly');

}

}
