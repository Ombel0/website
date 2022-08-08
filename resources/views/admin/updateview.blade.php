<!DOCTYPE html>
<html lang="en">
  <head>

    <base href="/public">   <!--css-->

   @include('admin.css')



   <style type="text/css">
    .title
    {
       color:blanchedalmond;
        padding-top:25px;
        font-size:25px;
    }


    label
    {
        display: inline-block;
        width: 200px;
    }

    </style>

  </head>



  <body>



    @include('admin.sidebar')

      <!-- partial -->
      @include('admin.navbar')


        <!-- partial -->

        <div class="container-fluid page-body-wrapper">

            <div class="container" align ="center">

                   <h1 class="title"> Updateview Products </h1>

                   @if(session()->has('message'))
                    <div class="alert alert-success">
                       <button type="button" class="close" data-dismiss="alert"> X</button>

                         {{ session()->get('message')  }}

                    </div>

                   @endif

               <form action="{{ url('updateproduct', $data->id ) }}" method="post" enctype="multipart/form-data">
                   @csrf

                  <div style="padding:15px;">
                 <label>Product title </label>
                 <input style="color:black;" type="text" name="title" placeholder="{{ $data->title }} "required=""> <!-- blade-->
                  </div>

                  <div style="padding:15px;">
                   <label>Price </label>
                   <input style="color:black;" type="number" name="price" placeholder="{{ $data->price}}"required="">
                    </div>


                    <div style="padding:15px;">
                       <label>Description</label>
                       <input style="color:black;"  type="text" name="des" placeholder="{{ $data->description }}"required="">
                        </div>


                        <div style="padding:15px;">
                           <label>Quantity </label>
                           <input  style="color:black;" type="text" name="quantity" placeholder="{{ $data->quantity }}"required="">
                            </div>



                            <div style="padding:15px;">
                                <label>Old image </label>
                                   <img height="100px" width="100px" src="/productimage/{{ $data->image }}">
                                 </div>





                               <div style="padding:15px;">
                                 <input style="color:black;"  type="file" name ="file">
                               </div>

                                <div style="padding:15px;">
                                  <input  class="btn btn-success"  type="submit" name="">
                               </div>
                </form>

           </div>

       </div>

          <!-- partial -->

       @include('admin.script')



  </body>
</html>
