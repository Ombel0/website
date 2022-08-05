<?php

namespace App\Http\Controllers;
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
        return view('user.home');
    }


    public function redirect()
    {
       $usertype = Auth::user()->usertype;

       if($usertype == '1')
       {
        return view('admin.home');
       }
       else
       {
        return view('user.home');
       }
    }
}
