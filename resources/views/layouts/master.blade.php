<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title','Inbag Shop')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/flav.ico') }}" /> <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles2.css') }}" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="{{ route('home.index', app()->getLocale()) }}">
                <img class="my-logo mt-0 mb-0" src="{{ asset('img/blanco.png') }}" alt="" />
            </a>

            <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse " id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    @guest
                    <li class="nav-item mx-5 mx-lg-4">
                        <a class="nav-link py-3 px-0 px-lg-1 rounded js-scroll-trigger" href="{{ route('product.userList', app()->getLocale()) }}"> {{ __('master.user.Products') }} </a></li>
                        
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-1 rounded js-scroll-trigger" href="{{ route('login', app()->getLocale()) }}">{{ __('auth.login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-1 rounded js-scroll-trigger" href="{{ route('register', app()->getLocale()) }}">{{ __('auth.register.register') }}</a>
                    </li>
                    @endif
                        <li class="nav-item mt-2 ml-5"><a href="{{ route(Route::currentRouteName(), 'en') }}" class="nav-link">EN </a> </li>
                        <li class="nav-item mt-2"><a href="{{ route(Route::currentRouteName(), 'es') }}" class="nav-link">ES </a> </li>
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout', app()->getLocale()) }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <a class="dropdown-item"  href="{{ route('auth.register', app()->getLocale()) }}">
                                {{ __('Edit profile') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout', app()->getLocale()) }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest

                    @if(!Auth::guest())
                    @if(Auth::user()->getRole()=="client")
                    <li class="nav-item mx-5 mx-lg-4"><a class="nav-link py-3 px-0 px-lg-1 rounded js-scroll-trigger" href="{{ route('product.userList', app()->getLocale()) }}"> {{ __('master.user.Products') }} </a></li>
                    <li class="nav-item mx-5 mx-lg-4"><a class="nav-link py-3 px-0 px-lg-1 rounded js-scroll-trigger" href="{{ route('donation.userOptions', app()->getLocale()) }}"> {{ __('master.user.Donations') }} </a></li>
                    <li class="nav-item mx-5 mx-lg-4"><a class="nav-link py-3 px-0 px-lg-2 rounded js-scroll-trigger" href="{{ route('product.userWishListShowAll', app()->getLocale()) }}"><i class="far fa-heart"></i></a></li>
                    <li class="nav-item mx-5 mx-lg-4"><a class="nav-link py-3 px-0 px-lg-2 rounded js-scroll-trigger" href="{{ route('product.cart', app()->getLocale()) }}"><i class="fas fa-shopping-bag"></i></a></li>
                    <li class="nav-item mt-2 "><a href="{{ route(Route::currentRouteName(), 'en') }}" class="nav-link">EN </a> </li>
                    <li class="nav-item mt-2 "><a href="{{ route(Route::currentRouteName(), 'es') }}" class="nav-link">ES </a> </li>

                    @endif
                    @if(Auth::user()->getRole()=="admin")
                    <li class="nav-item mx-5 mx-lg-4"><a class="nav-link py-3 px-0 px-lg-1 rounded js-scroll-trigger" href="{{ route('admin.donation.adminList', app()->getLocale()) }}"> {{ __('master.admin.Donations') }} </a></li>
                    <li class="nav-item mx-5 mx-lg-4"><a class="nav-link py-3 px-0 px-lg-1 rounded js-scroll-trigger" href="{{ route('admin.product.adminOptions', app()->getLocale()) }}"> {{ __('master.admin.Products') }} </a></li>
                    <li class="nav-item mt-2 "><a href="{{ route(Route::currentRouteName(), 'en') }}" class="nav-link">EN </a> </li>
                    <li class="nav-item mt-2 "><a href="{{ route(Route::currentRouteName(), 'es') }}" class="nav-link">ES </a> </li>
                    
                    @endif
                    @endif
                </ul>
            </div>
        </div>
    </nav>


    @yield('content')

    <!-- Footer-->
    <footer class="footer text-center">
        <div class="container">

            <div class="row">
                <!-- Footer Location-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">{{ __('master.user.Location') }}</h4>
                    <p class="lead mb-0">

                        {{ __('master.user.infoLoc') }}
                        <br />

                        {{ __('master.user.infoLoc2') }}
                    </p>
                </div>
                <!-- Footer Social Icons-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">{{ __('master.user.Web') }}</h4>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-dribbble"></i></a>
                </div>
                <!-- Footer About Text-->
                <div class="col-lg-4">
                    <h4 class="text-uppercase mb-4">{{ __('master.user.about') }}</h4>
                    <p class="lead mb-0">
                    {{ __('master.user.cont') }}
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Copyright Section-->
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>{{ __('master.user.copy') }}</small></div>
    </div>
    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
    <div class="scroll-to-top d-lg-none position-fixed">
        <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>