<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;

class AdminController extends Controller
{
    public function product()
    {
        return view('admin.product');
    }

    public function uploadproduct(Request $request)
     {
       $data = new Product;   //object
       $image = $request->file;
       $imagename= time().'.'.$image->getClientOriginalExtension();
       $request->file->move('productimage',$imagename);
       $data->image = $imagename;

        $data->title = $request->title; //  PAGE BLADE
        $data->price = $request->price;
        $data->description = $request->des;
        $data->quantity = $request->quantity;

        $data->save();

        return redirect()->back()->with('message','Added successfuly');

     }


     public function showproduct()
     {
         $data = product::all();
       return view('admin.showproduct', compact('data'));

     }


     public function deleteproduct($id)
     {
        $data = product::find($id);
         $data->delete();
         return redirect()->back()->with('message',' Product  Deleted successfuly');
     }

     public function updateview($id)
     {
        $data = product::find($id);
        return view('admin.updateview',compact('data'));
     }



     public function updateproduct(Request $request ,$id)
     {
       $data = product::find($id);
       $image = $request->file;
       if($image)
       {


       $imagename= time().'.'.$image->getClientOriginalExtension();
       $request->file->move('productimage',$imagename);
       $data->image = $imagename;

      }

        $data->title = $request->title; //  PAGE BLADE
        $data->price = $request->price;
        $data->description = $request->des;
        $data->quantity = $request->quantity;

        $data->save();

        return redirect()->back()->with('message','Update successfuly');

     }


      public function showorder()
      {


        $order = Order::all();
        return view('admin.showorder', compact('order'));
      }




       public function updatestatus($id)
{
        $order = Order::find($id);
        $order->status='delivered';
        $order->save();
        return redirect()->back();
}


}

