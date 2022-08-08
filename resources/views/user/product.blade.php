
<!--------featured categories----->
<div class="categories">
    <div class="small-container">
      <div class="row">
       <div class="col-3">
           <img src="img/category-1.jpg">
       </div>
       <div class="col-3">
          <img src="img/category-2.jpg">
       </div>
       <div class="col-3">
         <img src="img/category-3.jpg">
       </div>
    </div>

    </div>
</div>



<!--featured products-->

 <div class="small-container">
      <h2 class="title">Featured Products</h2>
       <div class="row">

        @foreach ($data as $product)

         <div class="col-4">
            <img src="/productimage/{{$product->image}}">
             <h4>{{$product->title}}</h4>
             <p>{{ $product->description }}</p>
             <a class="btn btn-primary" href="">Add Cart</a>
             <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
             </div>
              <p>{{ $product->price }} dh</p>
           </div>

        @endforeach

       </div>

<!--------latest Products----->

<!--search product -->
<form  action="{{ url('search') }}" method="get" class="from-inline" style="float: right; padding:10px;" >
@csrf
    <input type="search" name="search" placeholder="search">

       <input type="submit" value="Search" class="btn btn-success">

  </form>


<h2 class="title">latest Products</h2>
<div class="row">

@foreach ($data as $product)

 <div class="col-4">
   <img src="/productimage/{{$product->image}}">
     <h4>{{ $product->title }}</h4>
     <p>{{ $product->description}}</p>
     <a class="btn btn-primary" href="">Add Cart</a>
     <div class="rating">
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star-o"></i>
     </div>
      <p>{{ $product->price }}dh</p>
   </div>
   @endforeach



   @if (method_exists($data,'links'))
   <div class="d-flex justify-content-center">        <!-- search product and link -->
    {!! $data->links() !!}
   </div>
   @endif




   </div>
</div>
