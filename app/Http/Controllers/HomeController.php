<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\User;


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




       public function search(Request $request)

        {

            $search = $request->search;

              if($search == '')
            {
                $data = product::paginate(3);    //product::all()

                return view('user.home',compact('data'));
            }


            $data = Product::where('title','like','%'.$search.'%')->get() ;

            return view('user.home',compact('data'));


        }




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


    public function showcart()
    {
        $user = auth()->user();
        $cart = cart::where('phone',$user->phone)->get();
        $count = cart::where('phone' , $user->phone)->count();

        return view('user.showcart',compact('count','cart'));
    }
}

