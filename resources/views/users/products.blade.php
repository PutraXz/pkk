@extends('layouts.navbar')
@section('content')

    <div class="container mt-1">
        <img src="{{url('logo2.png')}}" alt="" class="w-25 img-fluid mx-auto d-block">
        <div class="slider mt-3">
            <div id="owl-carousel" class="owl-carousel">
                @foreach ($themes as $theme)
                <div class="slider-card">
                    <div class=" justify-content-center align-items-center mb-4">
                        <img src="{{url('themes/'.$theme->preview)}}" alt="" >
                        <h5 class="mt-3 text-center" style="color:black">{{$theme->name_theme}}</h5>
                        <p class="text-center" style="color:black">{{$theme->price}}</p>
                        <a href="{{route('user.detail',$theme->id)}}" class="btn btn-warning text-center d-block mx-auto mb-3">Detail</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        $(".owl-carousel").owlCarousel({
      loop:true,
        margin:10,
        nav:true,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        center: true,
        navText: [
        "<i class='fa fa-angle-left'></i>",
        "<i class='fa fa-angle-right'></i>"
    ],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:3
        }
    }
  });
    </script>
@endsection
