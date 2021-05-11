<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>In.com</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    
    <!-- Bootstrap related header -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title></title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('frontend/css/styles.css')}}" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" style="color:sandybrown;" href="{{URL('/')}}">Home</a>
                <!-- <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button> -->
                
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" style="color:sandybrown;" href="#services"><b>Services</b></a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" style="color:sandybrown;" href="#about"><b>About</b></a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" style="color:sandybrown;" href="#team"><b>Team</b></a></li>
                       
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}" style="color:sandybrown;" ><b>{{ __('Login') }}</b></a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}" style="color:sandybrown;"><b>{{ __('Register') }}</b></a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color:sandybrown;" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <b>{{ Auth::user()->name }}</b>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" style="color:sandybrown;"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <b>{{ __('Logout') }}</b>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                    <div class="masthead-subheading" >What is sold in KUET, Bought in KUET</div>
                    <div class="masthead-heading text-uppercase">Insider Commerce</div>
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Explore</a>
            </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Services</h2>
                    <h3 class="section-subheading text-muted">A multi-vendor e-commerce website only for the KUETIANS!</h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3"><a href="{{ route('products.buy') }}" class="button button1">Buy Products</a></h4>
                        <p class="text-muted">Buy what you need and explore which products are on sale by your fellow Kuetians!</p>
                    </div>
                    @auth
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3"><a href="{{route('about')}}" class="button button1">My Profile</a></h4>
                        <p class="text-muted">Change Password, Delete Account</p>
                    </div>
                    @endauth
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3"><a href="{{ route('products.sell') }}" class="button button1">Post an Ad</a></h4>
                        <p class="text-muted">Don't throw away what you don't need.Post an ad here.You could earn some money,help others.</p>
                    </div>
    
                    
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3"><a href="{{route('products.myfavorites')}}" class="button button1">My favorites</a></h4>
                        <p class="text-muted">Put ads you like the most in this favorite section. So that you can directly find them when you wish.</p>
                    </div>
                    <div class="col-md-4">
                        <br>
                        <span class="">
                            <i class=""></i>
                            <i class=""></i>
                        </span>
                        <h4 class="my-3"><a href="{{ route('products.buy') }}" class=""></a></h4>
                        <p class="text-muted"></p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3"><a href="{{route('products.myadds')}}" class="button button1">My Ads</a></h4>
                        <p class="text-muted">Manage,Update,Delete your Ads.</p>
                    </div>
                   
                </div>
            </div>
        </section>
        
        <!-- About-->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">About</h2>
                    <h3 class="section-subheading text-muted">What is the main purpose of our website?</h3>
                </div>
                <ul class="timeline">
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="img/in.com.png" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Message from us:</h4>
                                <h4 class="subheading">Don't let others take advantage of KUETIANS</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Don't sell your unnecessary things at a random shop at Fulbari Gate or Khulna Town. Some other fellow Kuetians will again buy them from them. Why other people do business with our necessities when we can solve our own problem?</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="frontend/assets/img/about/3.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Buy</h4>
                                <h4 class="subheading">Your necessary stuff from other Kuetians.</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">How many times a week you need to go to Daulatpur or Shibbari to buy different products? While maybe somewhere else in the campus,some other KUETIANS are thinking of throwing away the same products.Sit in front of your computer and have a look at what others are trying to sell.</p></div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="frontend/assets/img/about/1.png" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Sell</h4>
                                <h4 class="subheading">What you don't need.</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Just think how many valuable things we throw away everyday just because they have no purpose in our life anymore. Don't do that. Snap a picture of your unnecessary products and post an Ad here. Someone else might buy them from you.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="frontend/assets/img/about/wise.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Isn't it logical?</h4>
                                <h4 class="subheading">Your own multi-vendor E-commerce website.</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">People outside of Kuet won't be able to access the website. Only Kuetians can trade here. So,secure your trading by communicating with each-other and get the benefit.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>
                                Embrace
                                <br />
                                Your own
                                <br />
                                Website
                            </h4>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!-- Team-->
        <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
                    <h3 class="section-subheading text-muted">This website was devoped by ....</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="img/Faias.jpg" alt="..." />
                            <h4>Faias Satter</h4>
                            <p class="text-muted">Roll - 1707116</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <!-- <img class="mx-auto rounded-circle" src="assets/img/team/2.jpg" alt="..." />
                            <h4>Larry Parker</h4>
                            <p class="text-muted">Lead Marketer</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a> -->
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="img/rakib.jpg" alt="..." />
                            <h4>Rakib Ul Hasan</h4>
                            <p class="text-muted">Roll - 1707095</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">This website was done on the purpose of CSE-3200 project. Maybe this is the start of something new.</p></div>
                </div>
            </div>
        </section>
        
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-left">
                        Copyright &copy; Insider Commerce
                        <!-- This script automatically adds the current year to your website footer-->
                        <!-- (credit: https://updateyourfooter.com/)-->
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                    </div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-right">
                        <a class="mr-3" href="#!">Privacy Policy</a>
                        <a href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
        
      
<main class="py-4">
            @yield('content')
        </main>
    
 @stack('script')

</body>
</html>
