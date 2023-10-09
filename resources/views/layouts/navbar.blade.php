<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mehrdad Amini">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <!-- Custom fonts for this template-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    {{-- boostrap --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    {{-- owl css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <!-- Custom styles for this Page-->
    @yield('custom_styles')

</head>

<body id="page-top">
    <nav class="navbar navbar-expand-lg bg-light" style="background-color: #ffff !important;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav  ms-auto mb-2 mb-lg-0 me-5">
              @if (Route::has('login'))
                  @auth
                  <li class="nav-item dropdown" style="margin-right: 13vh">
                    <a class="nav-link " href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fas fa-user" style="font-size: 22px"></i></i></a>
                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarScrollingDropdown">
                        @if (auth()->user()->level == "admin")
                            <li>
                                <a class="dropdown-item" href="{{url('/dashboard')}}">Dashboard</a>
                            </li>
                        @endif
                        @if (auth()->user()->level == "user")
                            <li>
                                <a class="dropdown-item" href="{{url('/check-out')}}">Check Out</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{url('/order')}}">Order</a>
                            </li>
                        @endif
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" class="dropdown-item" 
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </li>
                    </ul>   
                </li>
                  @else
                      <a class="nav-link" href="{{ route('login') }}">Log in</a>
                      @if (Route::has('register'))
                          <a class="nav-link" href="{{ route('register') }}">Register</a>
                      @endif
                  @endauth
              </div>
          @endif
            </div>
            </div>
        </div>
    </nav>
    
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- End of Topbar -->
        @yield('content')
    </div>

    {{-- boostrap --}}
   

    {{-- owl carousel --}}


    <!-- Core plugin JavaScript-->

    <!-- Custom scripts for all pages-->

    <!-- Page level custom scripts -->
    @yield('custom_scripts')
    
</body>
</html>
