<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creator in Romania - Pagina principala</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom CSS -->
    {{--    @vite('resources/css/styles.css')--}}


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
            <script src="/js/langselector.js"></script>
            <script src="/js/dropdown.js"></script>
{{--            @include('search')--}}
            @if (Auth::check())


                <p>Welcome, {{ Auth::user()->name }}</p>
                <div>
                    <a href="/mestesugar"><button class="auth-button">Aplica ca mestesugar! </button></a>

                </div>

            @if(Auth::check() && Auth::user()->tip_user==2)
                <div>
                    <a href="/admin"><button class="auth-button">Admin Page </button></a>

                </div>
            @endif

                <form action="logout" method="post">
                    @csrf
                    <button class="auth-button" value="logout">Logout</button>

                </form>
            @else
                <a href="/register"><button class="auth-button">Register</button></a>
                <a href="/login"><button class="auth-button">Login</button></a>
            @endif
        </div>
        <div class="logo">
            <a href="/"><img src="/pics/logo.png" ></a>
        </div>

        <div class="dropdown">
        <button class="dropbtn"><a href="/">Acasă</a></button>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Visit</button>
            <div class="dropdown-content">
                @foreach($categories as $category)
                    <div class="category">
                        <a href="/category/{{$category->title}}" class="category-title">{{ $category->title }}</a>
                        <div class="posts">
                            @foreach($category->posts as $post)
                                <a href="/city/{{$post->title}}" class="post">{{ $post->title }}</a>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn">Meșteșugari</button>
            <div class="dropdown-content ">
                <a href="/shop2">Mestesuguri</a>
                <a href="/shop">Produse</a>
                <a href="mestesugari">Listă Meșteșugari</a>

            </div>
        </div>
{{--        <div class="dropdown">--}}
{{--            <button class="dropbtn">Ghid Turistic</button>--}}
{{--            <div class="dropdown-content">--}}
{{--                <a href="ghid">Cumpara</a>--}}
{{--                <a href="1">Link 2</a>--}}
{{--                <a href="2">Link 3</a>--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="dropdown">
            @if(Auth::check() && Auth::user()->tip_user==1)
                <a><button class="dropbtn">Adaugă</button></a>
                <div class="dropdown-content">
                    <a href="/adauga-mestesug">Meșteșug</a>
                    <a href="/adauga-produs">Produs</a>
                </div></div>
            @endif
        <div class="dropdown">
                    <a href="/contact"><button class="dropbtn">Contact </button></a>
        </div>




    </div>
    <div class="alert">
        {{ $slot }}
    </div>



    <!--                  FOOTER               -->
    <div class="gaura">
    </div>
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
            <li class="menu__item"><a class="menu__link" href="shop">Produse Mestesugaresti</a></li>
{{--            <li class="menu__item"><a class="menu__link" href="ghid">Ghid</a></li>--}}
{{--            <li class="menu__item"><a class="menu__link" href="#">Team</a></li>--}}
            <li class="menu__item"><a class="menu__link" href="contact">Contact</a></li>

        </ul>
        <p>&copy;2023 Prisecaru Dragos | All Rights Reserved</p>
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>



</div>


</div>
</body>
</html>
