@extends('layouts.app')

@section('title', 'Home page')

 
@section('content')
{{-- <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
   
    <div class="carousel-inner">
       
        @foreach ($sliders as $key => $sliderItem)
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
          @if ($sliderItem->image)
          <img src="{{asset("$sliderItem->image")}}" class="d-block w-100" alt="Slider Image">
          @endif
          <div class="carousel-caption d-none d-md-block">
          <div class="custom-carousel-content">
              <h1>
                  {!! $sliderItem->title !!}
              </h1>
              <p>
                {!! $sliderItem->description !!}
              </p>
              <div>
                  <a href="#" class="btn btn-slider">
                      Get Now
                  </a>
              </div>
          </div>
      </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  
</div>  --}}


 <section id="hero">
  <div class="hero-container">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

      

      <div class="carousel-inner" role="listbox"> 

        <!-- Slide 1 -->
        @if($sliders)
        @foreach ($sliders as $key => $sliderItem)
          <div class="carousel-item @if($loop->first) active @endif" style="background-image: url('{{asset("$sliderItem->image")}}');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animate__animated animate__fadeInDown">{!! $sliderItem->title !!}</h2>
                <p class="animate__animated animate__fadeInUp"> {!! $sliderItem->description !!} </p>
                <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Get Started</a>
              </div>
            </div>
          </div>  
       @endforeach
       @endif
      </div>
      
      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>
      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>
     

    </div>
    
  </div>
</section>
<!-- End Hero --> 




@endsection

