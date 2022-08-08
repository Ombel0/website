<?php

namespace App\Http\Controllers;

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
        return view('user.home',compact('data'));
       }
    }
}
