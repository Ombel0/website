<!DOCTYPE html>
<html lang="en">
       <!--------head----->

  @include('user.head');
<body>
    <div class="header">
 <div class="container">
        <div class="navbar">
          <div class="logo">
             <div class="bel"><h1>BELSHOOOP</h1></div>
          </div>
      <nav>
        <ul>
          <li><a href="{{ url('redirect') }}">Home</a></li>
          <li><a href="">Products</a></li>


          @guest
          @if (Route::has('login'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
          @endif

          @if (Route::has('register'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
          @endif
      @else
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }}
              </a>

              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div>
          </li>
      @endguest



        </ul>
    </nav>
     <a class="nav-link" href="{{ url('showcart') }} "> <img  src="img/cart.png"  width="30px" height="30px">[{{ $count }}]</a>
   </div>
   <div class="row">
    <div class="col-2">
        <h1>New Style<br>BELSHOOOP</h1>
        <p>Success isn't always what it seems.<br>Greatness you are welcome.</p><a href="" class="btn">Explore Now &#8594</a>
    </div>
    <div class="col-2">
      <img src="img/image11.png">
    </div>


    @if(session()->has('message'))
    <div class="alert alert-success">
       <button type="button" class="close" data-dismiss="alert"> X</button>   <!--message sussessfuly-->

         {{ session()->get('message')  }}

         @endif


<div style="padding: 100px;" align="center">


<!--table for showcart -->


<!--fORM AND CONFIRME ORDER -->

<form action=" {{ url('order') }}" method="POST">
@csrf
<table>


<tr style="background-color:gray;">
    <td style="padding: 30px; font-size :40 px; color:white;">Product Name</td>
    <td style="padding: 30px; font-size :40 px; color:white;" >Quantity</td>
    <td style="padding: 30px; font-size :40 px; color:white;">Price</td>
    <td style="padding: 30px; font-size :40 px; color:white;">Action</td>

</tr>

@foreach ($cart as $carts )


<tr style="background-color: black;">
<td style="padding:30px; color:white;"> {{ $carts->product_title }}  <input type="text" name="productname[]" value="{{ $carts->product_title }}" hidden="" >  </td>
<td style="padding:30px; color:white;"> {{ $carts->quantity}} <input type="text" name="quantity[]" value="{{ $carts->quantity }}"  hidden="">  </td>
<td style="padding:30px; color:white;"> {{ $carts->price }} <input type="text" name="price[]" value="{{ $carts->price}}"  hidden="">  </td>
<td style="padding:30px; color:white;">  <a class="btn btn-danger" href="{{ url('delete', $carts->id) }}">Delete</a>  </td>      <!--boutton deleted -->

</tr>

@endforeach

</table>
<button class="btn btn-success"> Confirme Order </button>
</form>
</div>






   </div>
 </div>
</div>

     <!--------brands----->
     <div class="brands">
     <div class="small-container">
        <div class="row">
        <div class="col-5">
            <img src="img/logo-godrej.png">
        </div>
        <div class="col-5">
            <img src="img/logo-coca-cola.png">
        </div>
        <div class="col-5">
            <img src="img/logo-oppo.png">
        </div>
        <div class="col-5">
            <img src="img/logo-paypal.png">
        </div>
        <div class="col-5">
            <img src="img/logo-philips.png">
        </div>
        </div>
     </div>
     </div>
     <!--------footer----->
     <div class="footer">
         <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Download Our App</h3>
                    <p>Download Our App</p>
                    <div class="app-logo">
                       <img src="img/play-store.png">
                       <img src="img/app-store.png">
                    </div>
                </div>
                <div class="footer-col-2">
               <!----<img src="img/logo6.jpg">--->
               <div class="bel"><h1>BELSHOOOP</h1></div>
                    <p>Download Our App</p>
                </div>
                <div class="footer-col-3">
                 <h3>Download Our App</h3>
                    <ul>
                        <li>Coupons</li>
                        <li>Blog Post</li>
                        <li>Return Policy</li>
                        <li>Join Affiliat</li>
                    </ul>
                </div>
                <div class="footer-col-4">
                 <h3>Follow us</h3>
                    <ul>
                        <li>Facebook</li>
                        <li>Twitter</li>
                        <li>Instagram</li>
                        <li>Youtube</li>
                    </ul>
                </div>
            </div>
         </div>

       <p class="copyright">&copy2021; OMAR BELGHALI . wwww.omarbelghali.com</p>

     </div>
</body>
</html>
