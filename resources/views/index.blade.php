<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creator in Romania - Pagina principala</title>
    <link rel="stylesheet" href="./css/app.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    @vite('resources/css/styles.css')


</head>
<body>


    <div class="main">
          <div class="header">
<div class="btnlgn" id="lang">
  <select id="langSelector" onchange="changeLanguage()">
    <option value="en">English</option>
    <option value="ro">Română</option>
    <option value="fr">Français</option>
  </select>
  <script src="./js/langselector.js"></script>

            {{-- <form action="{{ route('language.change', ['locale' => '']) }}" method="GET">
              @csrf
              <select name="language" onchange="this.form.submit()">
                  <option value="ro" {{ App::getLocale() === 'ro' ? 'selected' : '' }}>Romana</option>
                  <option value="en" {{ App::getLocale() === 'en' ? 'selected' : '' }}>English</option>
                  <option value="fr" {{ App::getLocale() === 'fr' ? 'selected' : '' }}>French</option>
              </select>
          </form> --}}

          {{-- <form action="{{ route('language.change') }}" method="POST">
            @csrf
            <select name="locale" onchange="this.form.submit()">
                <option value="en" {{ App::getLocale() === 'en' ? 'selected' : '' }}>English</option>
                <option value="ro" {{ App::getLocale() === 'ro' ? 'selected' : '' }}>Română</option>
                <option value="fr" {{ App::getLocale() === 'fr' ? 'selected' : '' }}>Français</option>
            </select>
        </form>
         --}}



            @if (Auth::check())
            <form action="logout" method="post">
             @csrf
             {{-- <p>Welcome, {{ Auth::user()->name }}</p> --}}
             <button class="auth-button" value="logout">Logout</button>

         </form>
            @else
                <a href="register"><button class="auth-button">Register</button></a>
            <a href="login"><button class="auth-button">Login</button></a>
            @endif
        </div>
             <div class="logo">
          <a href="/"><img src="./pics/logo.png" ></a>
             </div>



              <div class="dropdown">
                     <button class="dropbtn">Visit</button>
                        <div class="dropdown-content">
                             <a href="zona1">Dobrogea</a>
                             <a href="zona2">Transilvania</a>
                             <a href="zona3">Muntenia</a>
                        </div>
              </div>

              <div class="dropdown">
                     <button class="dropbtn">Exploreaza</button>
                        <div class="dropdown-content ">
                             <a href="/">Ferme</a>
                             <a href="1">Vin</a>
                             <a href="2">Nu stiu</a>
                        </div>
                </div>
                        <div class="dropdown">
                     <button class="dropbtn">Ghid Turistic</button>
                        <div class="dropdown-content">
                             <a href="ghid">Cumpara</a>
                             <a href="1">Link 2</a>
                             <a href="2">Link 3</a>
                        </div>
                     </div>
              <div class="dropdown">
                     <a href="shop"><button class="dropbtn">Targ </button></a>
              </div>
              <div class="dropdown">

                  <button class="dropbtn">Exploreaza</button>
{{--                  <div class="dropdown-content ">--}}
{{--                      @foreach($categories as $categorie)--}}
{{--                          <a class="dropdown-item" href="#">{{ $categorie->name }}</a>--}}
{{--                      @endforeach--}}
{{--                  </div>--}}

              </div>





                                    {{-- <h1>List of Cities</h1>


                                    @foreach ($cities as $city)
    <form action="{{ route('city.page') }}" method="POST">
        @csrf
        <input type="hidden" name="city" value="{{ $city->name }}">
        <button type="submit" class="city-button">{{ $city->name }}</button>
    </form>
@endforeach --}}








           </div>
<!--                       MIJLOC                  -->
            <div class="middle">


            <div class="slideshow-container">


<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="./pics/rez4.jpg" >
  <div class="text">Caption Text</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="./pics/rez1.jpg" >
  <div class="text">Caption Two</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="./pics/rez2.jpg" >
  <div class="text">Caption Three</div>
</div>


<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>


<div style="text-align:center">
<span class="dot" onclick="currentSlide(1)"></span>
<span class="dot" onclick="currentSlide(2)"></span>
<span class="dot" onclick="currentSlide(3)"></span>
</div>
<script src="./js/slideshow.js"></script>
            <div class="firstbox">
              <div id="textbox">
{{--                <a href="ghid"><p>Buna ziua</p></a>--}}
              </div>
        </div>
   <h1>Welcome to Creator in Romania !</h1>
      <p> Authentic, Natural and Cultural
      are the words that best capture the essence of Romania,
      a dynamic country rich in history, arts and scenic beauty.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas a tempus lorem. Vivamus ac ante id orci posuere semper. Morbi venenatis lectus sed nisi ultrices sollicitudin. Ut porttitor vestibulum dui. Praesent tempus ut sem tincidunt ornare. Quisque semper porttitor tortor ac placerat. Maecenas eget vulputate eros. Vestibulum sit amet arcu id nibh pretium gravida sit amet in justo. Integer vitae sem faucibus, imperdiet neque et, interdum ipsum. Proin sem nibh, ullamcorper ut placerat quis, laoreet sit amet enim. Cras nec ipsum aliquet, convallis augue eu, facilisis mauris. Ut neque sem, feugiat nec ipsum sed, rhoncus sodales lacus. Mauris et augue quis massa pretium tincidunt. Aenean scelerisque tempus purus, eget convallis enim ultrices semper. Praesent porttitor sapien rutrum nunc condimentum semper.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas a tempus lorem. Vivamus ac ante id orci posuere semper. Morbi venenatis lectus sed nisi ultrices sollicitudin. Ut porttitor vestibulum dui. Praesent tempus ut sem tincidunt ornare. Quisque semper porttitor tortor ac placerat. Maecenas eget vulputate eros. Vestibulum sit amet arcu id nibh pretium gravida sit amet in justo. Integer vitae sem faucibus, imperdiet neque et, interdum ipsum. Proin sem nibh, ullamcorper ut placerat quis, laoreet sit amet enim. Cras nec ipsum aliquet, convallis augue eu, facilisis mauris. Ut neque sem, feugiat nec ipsum sed, rhoncus sodales lacus. Mauris et augue quis massa pretium tincidunt. Aenean scelerisque tempus purus, eget convallis enim ultrices semper. Praesent porttitor sapien rutrum nunc condimentum semper.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas a tempus lorem. Vivamus ac ante id orci posuere semper. Morbi venenatis lectus sed nisi ultrices sollicitudin. Ut porttitor vestibulum dui. Praesent tempus ut sem tincidunt ornare. Quisque semper porttitor tortor ac placerat. Maecenas eget vulputate eros. Vestibulum sit amet arcu id nibh pretium gravida sit amet in justo. Integer vitae sem faucibus, imperdiet neque et, interdum ipsum. Proin sem nibh, ullamcorper ut placerat quis, laoreet sit amet enim. Cras nec ipsum aliquet, convallis augue eu, facilisis mauris. Ut neque sem, feugiat nec ipsum sed, rhoncus sodales lacus. Mauris et augue quis massa pretium tincidunt. Aenean scelerisque tempus purus, eget convallis enim ultrices semper. Praesent porttitor sapien rutrum nunc condimentum semper.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas a tempus lorem. Vivamus ac ante id orci posuere semper. Morbi venenatis lectus sed nisi ultrices sollicitudin. Ut porttitor vestibulum dui. Praesent tempus ut sem tincidunt ornare. Quisque semper porttitor tortor ac placerat. Maecenas eget vulputate eros. Vestibulum sit amet arcu id nibh pretium gravida sit amet in justo. Integer vitae sem faucibus, imperdiet neque et, interdum ipsum. Proin sem nibh, ullamcorper ut placerat quis, laoreet sit amet enim. Cras nec ipsum aliquet, convallis augue eu, facilisis mauris. Ut neque sem, feugiat nec ipsum sed, rhoncus sodales lacus. Mauris et augue quis massa pretium tincidunt. Aenean scelerisque tempus purus, eget convallis enim ultrices semper. Praesent porttitor sapien rutrum nunc condimentum semper.</p>

{{--    <section class="col-span-8 col-start-5 mt-10">--}}
{{--      <article class="flex bg-gray-100 p-6">--}}
{{--        <div>--}}
{{--            <img src="https://i.pravatar.cc/100">--}}
{{--        </div>--}}

{{--        <div>--}}
{{--          <header>--}}
{{--              <h3 class="font-bold">John Doe</h3>--}}
{{--           <p class="text-xs"><time> Posted 8 months ago</time></p>--}}
{{--          </header>--}}
{{--          <p>--}}
{{--            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget laoreet sapien, non suscipit mauris. Cras tincidunt risus sed accumsan consequat. Aenean sit amet accumsan justo. Vivamus sed urna ultricies, imperdiet magna ac, ultrices mauris. Nam lobortis consectetur justo in porttitor. Pellentesque dignissim ante vitae diam luctus feugiat. Aliquam sit amet velit quis nisi euismod rutrum at quis quam. Ut ornare nisi a maximus pellentesque.</p>--}}
{{--        </div>--}}
{{--      </article>--}}
{{--    </section>--}}

                @foreach($comments as $comment)
                <x-comment :comment="$comment"></x-comment>
                @endforeach


    @if (Auth::check())

    @else
<p>Login to comment</p>
@endif

      <div class="gaura">
      </div>
</div>

<!--                  FOOTER               -->

             <footer class="footer">

    <div class="waves">
      <div class="wave" id="wave1"></div>
      <div class="wave" id="wave2"></div>
      <div class="wave" id="wave3"></div>
      <div class="wave" id="wave4"></div>
    </div>
    <ul class="social-icon">
      <li class="social-icon__item"><a class="social-icon__link" href="https://www.facebook.com/">
          <ion-icon name="logo-facebook"></ion-icon>
        </a></li>
      <li class="social-icon__item"><a class="social-icon__link" href="https://twitter.com/">
          <ion-icon name="logo-twitter"></ion-icon>
        </a></li>

      <li class="social-icon__item"><a class="social-icon__link" href="https://www.instagram.com">
          <ion-icon name="logo-instagram"></ion-icon>
        </a></li>
    </ul>
    <ul class="menu">
      <li class="menu__item"><a class="menu__link" href="/">Home</a></li>
      <li class="menu__item"><a class="menu__link" href="shop">Shop</a></li>
      <li class="menu__item"><a class="menu__link" href="ghid">Ghid</a></li>
      <li class="menu__item"><a class="menu__link" href="#">Team</a></li>
      <li class="menu__item"><a class="menu__link" href="contact">Contact</a></li>

    </ul>
    <p>&copy;2023 Prisecaru Dragos | All Rights Reserved</p>
  </footer>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


    </div>


    </div>
</body>
</html>
