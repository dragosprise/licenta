<x-app-layout>

{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">--}}
{{--            {{ __('Dashboard') }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}

{{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--                <div class="p-6 text-gray-900 dark:text-gray-100">--}}
{{--                    {{ __("You're logged in!") }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}




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



       <p>România este o țară bogată în tradiții și cultură, unde meșteșugurile autentice și produsele artizanale reflectă esența și spiritul națiunii noastre. "Creator în România" este locul unde onorăm și celebrăm moștenirea culturală a României, punând în lumină talentul și măiestria meșteșugarilor noștri.

           În fiecare colț al țării, de la sate pitorești la orașe vibrante, veți găsi artizani dedicați care păstrează vii tehnici vechi de secole, transmițându-le din generație în generație. Fie că este vorba despre țesături tradiționale, ceramică pictată manual, sculpturi în lemn sau bijuterii unice, fiecare creație este o poveste despre tradiție, pasiune și identitate.

           La "Creator în România", ne propunem să promovăm aceste comori culturale, oferindu-vă ocazia de a descoperi și a achiziționa produse autentice, realizate cu dragoste și pricepere de meșteșugari locali. Fiecare produs este un simbol al moștenirii noastre și o invitație de a explora frumusețea și diversitatea tradițiilor românești.

           Vă invităm să pășiți în lumea meșteșugurilor românești, să admirați creativitatea și să susțineți artizanii care dau viață acestor opere de artă. Împreună, putem păstra și valorifica bogăția culturală a României, asigurându-ne că aceste tradiții prețioase vor continua să inspire și să încânte generațiile viitoare.

           Acest text subliniază importanța moștenirii culturale românești și rolul meșteșugarilor în păstrarea și promovarea acesteia, invitând vizitatorii să exploreze și să aprecieze produsele autentice oferite de "Creator în România".</p>
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

{{--                        @foreach($comments as $comment)--}}
{{--                        <x-comment :comment="$comment"></x-comment>--}}
{{--                        @endforeach--}}

{{--        @foreach($comments as $comment)--}}
{{--            <x-comment :comment="$comment"></x-comment>--}}
{{--        @endforeach--}}
{{--        @if (Auth::check())--}}

{{--        @else--}}
{{--            <p>Login to comment</p>--}}
{{--        @endif--}}

        <div class="gaura">
        </div>
    </div>
</x-app-layout>
