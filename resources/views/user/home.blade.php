<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;1,400;1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>BELSTORE /Ecommerce</title>
    </head>
<body>
    <div class="header">
 <div class="container">
        <div class="navbar">
          <div class="logo">
             <div class="bel"><h1>BELSHOOOP</h1></div>
          </div>
      <nav>
        <ul>
          <li><a href="">Home</a></li>
          <li><a href="">Products</a></li>
          <li><a href="">About</a></li>
          <li><a href="">Contact</a></li>
          <li><a href="">Account</a></li>

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
    <!-------- links Showcart  ----->
     <a class="nav-link" href="{{ url('showcart') }} "> <img  src="img/cart.png"  width="30px" height="30px">[{{ $count }}]</a> <!--------   VARIABLE BLADE COUNT  ----->
   </div>
   <div class="row">
    <div class="col-2">
        <h1>New Style<br>BELSHOOOP</h1>
        <p>Success isn't always what it seems.<br>Greatness you are welcome.</p><a href="" class="btn">Explore Now &#8594</a>
    </div>
    <div class="col-2">
      <img src="img/image11.png">
    </div>

   </div>
 </div>
</div>

<!--------featured categories----->


<!--------featured categories----->

<!--------latest Products----->


@include('user.product')

<!--------latest Products----->


 <!--------offers----->


 <div class="offer">
     <div class="small-container">
        <div class="row">
          <div class="col-2">
              <img src="img/III.png"class="offer-img">
          </div>
              <div class="col-2">
               <p>Exclusively Available on Belshooop</p>
                <h1>Smart Bnad 2021</h1>
               <small>The mi smart bad E18 features a 30.9% larger</small>
               <a href=""class="btn">Buy Now &#8594;</a>
              </div>
       </div>
     </div>
   </div>
   <!--------TEST IMONIAL----->
   <div class="testimonial">
     <div class="small-container">
         <div class="row">
             <div class="col-3">
                 <i class="fa fa-quote-left"></i>
                 <p>lorem ipsum is simply dummy test of the printing and typesetting</p>
               <div class="rating">
                 <i class="fa fa-star"></i>
                 <i class="fa fa-star"></i>
                 <i class="fa fa-star"></i>
                 <i class="fa fa-star"></i>
                 <i class="fa fa-star-o"></i>
               </div>
               <img src="img/user-1.png">
               <h3>Angel hellena</h3>
             </div>
              <div class="col-3">
                 <i class="fa fa-quote-left"></i>
                 <p>lorem ipsum is simply dummy test of the printing and typesetting</p>
               <div class="rating">
                 <i class="fa fa-star"></i>
                 <i class="fa fa-star"></i>
                 <i class="fa fa-star"></i>
                 <i class="fa fa-star"></i>
                 <i class="fa fa-star-o"></i>
               </div>
               <img src="img/user-2.png">
               <h3>Alex</h3>
             </div>
              <div class="col-3">
                 <i class="fa fa-quote-left"></i>
                 <p>lorem ipsum is simply dummy test of the printing and typesetting</p>
               <div class="rating">
                 <i class="fa fa-star"></i>
                 <i class="fa fa-star"></i>
                 <i class="fa fa-star"></i>
                 <i class="fa fa-star"></i>
                 <i class="fa fa-star-o"></i>
               </div>
               <img src="img/user-3.png">
               <h3>Sandra</h3>
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
         <hr>
       <p class="copyright">&copy2021; OMAR BELGHALI . wwww.omarbelghali.com</p>

     </div>
</body>
</html>
