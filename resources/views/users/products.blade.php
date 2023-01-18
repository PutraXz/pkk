@extends('layouts.navbar')
@section('content')

    <div class="container mt-5">
        <div class="slider">
            <div id="owl-carousel" class="owl-carousel">
                @foreach ($products as $product)
                <div class="slider-card">
                    <div class="d-block justify-content-center align-items-center mb-4">
                        <img src="{{url('products/'.$product->file)}}" alt="" >
                        <h5 class="mt-3 text-center" style="color:black">{{$product->title}}</h5>
                        <p class="text-center" style="color:black">{{$product->description}}</p>
                        <a href="{{route('user.detail',$product->id)}}">Detail</a>
                        <button class="btn btn-warning d-block mx-auto" onlick="{{route('user.detail',$product->id)}}" type="button">Order Now</button>
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
