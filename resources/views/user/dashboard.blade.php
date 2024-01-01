@extends('theme.theme')
@section('title','Booking Online Badminton')
@section('content')
{{-- Slider --}}
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('images/banner/banner-1.jpg') }}" class="d-block h-50 w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('images/banner/banner-2.jpg') }}" class="d-block h-50 w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
{{-- End of Slider --}}
<h1 class="text-md text-dark font-semibold border-b-2 pb-3">Booking Now!</h1>
<div class="d-flex flex-wrap">
@foreach ($badminton_fields as $field)
<div class="p-2"><x-product-card :field="$field" /></div>
    @endforeach
</div>
@endsection
@section('css')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
@endsection
@section('js')
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    const swiper = new Swiper('.swiper-container', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,
        autoplay: true,
        delay : 2000,
        });
</script>
@endsection