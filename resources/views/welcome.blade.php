 @extends('layouts.navbar')
      @section('content')
        <section class="preview">
          <div class="container me-0 pe-0  pt-5">
              <div class="row pt-5 mx-0">
                <div class="col-sm-12 col-md-6 col-lg-6 ">
                    <h2 class="pt-5 fs-1">Website Undangan Pernikahan</h2>
                    <p class="pt-2 fs-4 mb-0">Masa aktif selamanya dan edit tanpa batas!</p>
                    <p class="fw-bolder fs-3">Fitur paling lengkap banyak preset siap pakai</p>
                    <button class="btn btn-danger btn-lg">Coba Sekarang</button>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 pe-0" >
                    <img src="{{url('products/banner.png')}}" alt="" class="w-100 d-inline-block" style="margin-top: -4.55rem !important;">
                </div>
              </div>
          </div>
        </section>
        <section class="theme ">
          <div class="container">
            <h2 class="pt-5 text-center">Theme On Website</h2>
            <div class="row pb-5">
              <div class="col-md-4 col-12 pt-4">
                <div class="card">
                  <img src="{{url('products/card.jpg')}}" alt="">
                  <div class="card-body">
                      <h4>Blue Floower</h4>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-12 pt-4">
                <div class="card">
                  <img src="{{url('products/card.jpg')}}" alt="">
                  <div class="card-body">
                      <h4>Blue Floower</h4>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-12 pt-4">
                <div class="card">
                  <img src="{{url('products/card.jpg')}}" alt="">
                  <div class="card-body">
                      <h4>Blue Floower</h4>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-12 pt-4">
                <div class="card">
                  <img src="{{url('products/card.jpg')}}" alt="">
                  <div class="card-body">
                      <h4>Blue Floower</h4>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-12 pt-4">
                <div class="card">
                  <img src="{{url('products/card.jpg')}}" alt="">
                  <div class="card-body">
                      <h4>Blue Floower</h4>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-12 pt-4">
                <div class="card">
                  <img src="{{url('products/card.jpg')}}" alt="">
                  <div class="card-body">
                      <h4>Blue Floower</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="why">
          <div class="container pb-5">
            <h4 class=" pt-5 text-center">Mengapa Undangan Digital?</h4>
            <p class="text-center">Manfaat yang anda dapatkan menggunakan undangan digital :</p>
            <div class="row py-5">
              <div class="col-12 col-md-3 p-0">
                  <div class="card border-0" style="background-color: #e6e7e8;">
                      <img src="{{url('products/invita_homepage_iconsavetime.svg')}}" alt="" class="w-75 mx-auto d-block pt-5">
                  </div>
              </div>
              <div class="col-12 col-md-3 p-0">
                <div class="card border-0" style="background-color: #f1f1f1;">
                  <img src="{{url('products/invita_homepage_iconsavetime.svg')}}" alt="" class="w-75 mx-auto d-block pt-5">
                </div>
              </div>
              <div class="col-12 col-md-3 p-0">
                <div class="card border-0" style="background-color: #e6e7e8;">
                  <img src="{{url('products/invita_homepage_iconsavetime.svg')}}" class="w-75 mx-auto d-block pt-5">
                </div>
            </div>
            <div class="col-12 col-md-3 p-0">
              <div class="card border-0" style="background-color: #f1f1f1;">
                <img src="{{url('products/invita_homepage_iconsavetime.svg')}}" class="w-75 mx-auto d-block pt-5">
              </div>
            </div>
            </div>
          </div>
        </section>
        <section class="sayThey">
          <div class="container pt-5">
            <h4 class="text-center pt-5">Apa Kata Mereka?</h4>
            <p class="text-center">Cari Tahu Apa Kata Mereka Yang Telah Mmebuat Undangan Digital</p>
            <div class="row py-5 ">
              <div class="col-12 col-md-6">
                  <<img src="{{url('products/invita_homepage_iconsavetime.svg')}}" alt="" class="mx-auto d-block">
                  <h5 class="text-center">Fredi Wong</h5>
                  <p class="text-center">Thanks Invita.id for the great support in making us easier to share our digital invitation to our lovely guest. We can share any of our wedding vibe just put everything inside the invitation. It can be theme-customized with all data for couples such as; our love story, our prewed photography, our guest list reservations, wishes and still so many thigs to add. Thanks for made it happened!</p>
              </div>
              <div class="col-12 col-md-6">
                <img src="{{url('products/test.png')}}" alt="" class="w-75 mx-auto d-block">
              </div>
            </div>
          </div>
        </section>
    @endsection
