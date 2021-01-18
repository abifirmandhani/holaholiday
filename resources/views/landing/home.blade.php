@extends('landing_template.master')
@section('content')
<!-- Swiper-->
<section class="section swiper-container swiper-slider swiper-slider-corporate swiper-pagination-style-2" data-loop="true" data-autoplay="5000" data-simulate-touch="true" data-nav="false" data-direction="vertical">
        <div class="swiper-wrapper text-left">
          <div class="swiper-slide context-dark" data-slide-bg="{{asset('landing/images/banner1.jpg')}}">
            <div class="swiper-slide-caption section-md">
              <div class="container">
                <div class="row">
                  <div class="col-md-10">
                    <h6 class="text-uppercase" data-caption-animate="fadeInRight" data-caption-delay="0">Enjoy the Best Destinations with Our Travel Agency</h6>
                    <h2 class="oh font-weight-light" data-caption-animate="slideInUp" data-caption-delay="100"><span>Explore</span><span class="font-weight-bold"> The World</span></h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide context-dark" data-slide-bg="{{asset('landing/images/banner2.jpg')}}">
            <div class="swiper-slide-caption section-md">
              <div class="container">
                <div class="row">
                  <div class="col-md-10">
                    <h6 class="text-uppercase" data-caption-animate="fadeInRight" data-caption-delay="0">A team of professional Travel Experts</h6>
                    <h2 class="oh font-weight-light" data-caption-animate="slideInUp" data-caption-delay="100"><span>Trust</span><span class="font-weight-bold"> Our Experience</span></h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide context-dark" data-slide-bg="{{asset('landing/images/banner3.jpg')}}">
            <div class="swiper-slide-caption section-md">
              <div class="container">
                <div class="row">
                  <div class="col-md-10">
                    <h6 class="text-uppercase" data-caption-animate="fadeInRight" data-caption-delay="0">Build your Next Holiday Trip with Us</h6>
                    <h2 class="oh font-weight-light" data-caption-animate="slideInUp" data-caption-delay="100"><span>Create</span><span class="font-weight-bold"> Your Tour</span></h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Swiper Pagination-->
        <div class="swiper-pagination"></div>
      </section>
      <!-- Section Box Categories-->
      <section class="section section-lg section-top-1 bg-gray-4">
        <div class="container offset-negative-1">
          <div class="box-categories cta-box-wrap">
            <div class="box-categories-content">
              <div class="row justify-content-center">
                @foreach($paket as $data)
                  <div class="col-md-4 wow fadeInDown col-9" data-wow-delay=".2s">
                    <ul class="list-marked-2 box-categories-list">
                      <li><a href="#"><img src="{{$data->foto}}" class="img-cover-default" alt="" width="368" height="420"/></a>
                        <h5 class="box-categories-title">{{$data->nama}}</h5>
                      </li>
                    </ul>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
          @if(Auth::check())
            <a class="link-classic wow fadeInUp" href="{{url('landing/paket')}}">Lihat lebih banyak<span></span></a>
          @else
            <a class="link-classic wow fadeInUp" href="{{url('login')}}">Lihat lebih banyak<span></span></a>
          @endif
          <!-- Owl Carousel-->
        </div>
      </section>
      <!--	Our Services-->
      <section class="section section-sm">
        <div class="container">
          <h3>Our Services</h3>
          <div class="row row-30">
            <div class="col-sm-6 col-lg-4">
              <article class="box-icon-classic">
                <div class="unit box-icon-classic-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">
                  <div class="unit-left">
                    <div class="box-icon-classic-icon fl-bigmug-line-equalization3"></div>
                  </div>
                  <div class="unit-body">
                    <h5 class="box-icon-classic-title"><a href="#">Personalized Matching</a></h5>
                    <p class="box-icon-classic-text">Our unique matching system lets you find just the tour you want for your next holiday.</p>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-sm-6 col-lg-4">
              <article class="box-icon-classic">
                <div class="unit box-icon-classic-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">
                  <div class="unit-left">
                    <div class="box-icon-classic-icon fl-bigmug-line-circular220"></div>
                  </div>
                  <div class="unit-body">
                    <h5 class="box-icon-classic-title"><a href="#">Wide Variety of Tours</a></h5>
                    <p class="box-icon-classic-text">We offer a wide variety of personally picked tours with destinations all over the globe.</p>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-sm-6 col-lg-4">
              <article class="box-icon-classic">
                <div class="unit box-icon-classic-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">
                  <div class="unit-left">
                    <div class="box-icon-classic-icon fl-bigmug-line-favourites5"></div>
                  </div>
                  <div class="unit-body">
                    <h5 class="box-icon-classic-title"><a href="#">Highly Qualified Service</a></h5>
                    <p class="box-icon-classic-text">Our tour managers are qualified, skilled, and friendly to bring you the best service.</p>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-sm-6 col-lg-4">
              <article class="box-icon-classic">
                <div class="unit box-icon-classic-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">
                  <div class="unit-left">
                    <div class="box-icon-classic-icon fl-bigmug-line-headphones32"></div>
                  </div>
                  <div class="unit-body">
                    <h5 class="box-icon-classic-title"><a href="#">24/7 Support</a></h5>
                    <p class="box-icon-classic-text">You can always get professional support from our staff 24/7 and ask any question you have.</p>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-sm-6 col-lg-4">
              <article class="box-icon-classic">
                <div class="unit box-icon-classic-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">
                  <div class="unit-left">
                    <div class="box-icon-classic-icon fl-bigmug-line-hot67"></div>
                  </div>
                  <div class="unit-body">
                    <h5 class="box-icon-classic-title"><a href="#">Handpicked Hotels</a></h5>
                    <p class="box-icon-classic-text">Our team offers only the best selection of affordable and luxury hotels to our clients.</p>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-sm-6 col-lg-4">
              <article class="box-icon-classic">
                <div class="unit box-icon-classic-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">
                  <div class="unit-left">
                    <div class="box-icon-classic-icon fl-bigmug-line-wallet26"></div>
                  </div>
                  <div class="unit-body">
                    <h5 class="box-icon-classic-title"><a href="#">Best Price Guarantee</a></h5>
                    <p class="box-icon-classic-text">If you find tours that are cheaper than ours, we will compensate the difference.</p>
                  </div>
                </div>
              </article>
            </div>
          </div>
        </div>
      </section>
      <!-- Hot tours-->
      <section class="section section-sm bg-default">
        <div class="container">
          <h3 class="oh-desktop"><span class="d-inline-block wow slideInDown">Hot Tours</span></h3>
          <div class="row row-sm row-40 row-md-50">
            @foreach($destinasi as $data)
              <div class="col-sm-6 col-md-12 wow fadeInRight">
                <!-- Product Big-->
                <article class="product-big">
                  <div class="unit flex-column flex-md-row align-items-md-stretch">
                    <div class="unit-left"><a class="product-big-figure" href="#"><img src="{{$data->foto}}" alt="" width="600" height="366"/></a></div>
                    <div class="unit-body">
                      <div class="product-big-body">
                        <h5 class="product-big-title"><a href="#">{{$data->nama}}</a></h5>
                        <div class="group-sm group-middle justify-content-start">
                        </div>
                        <p class="product-big-text">{{$data->deskripsi}}</p>
                        @if(Auth::check())
                          <a class="button button-black-outline button-ujarak" href="{{url('landing/destinasi/').'/'.$data->id}}">Booking </a>
                        @else
                          <a class="button button-black-outline button-ujarak" href="{{url('login')}}">Booking </a>
                        @endif
                        <div class="product-big-price-wrap"><span class="product-big-price">Rp {{$data->harga}}</span></div>
                      </div>
                    </div>
                  </div>
                </article>
              </div>
            @endforeach
          </div>
        </div>
      </section>
@endsection