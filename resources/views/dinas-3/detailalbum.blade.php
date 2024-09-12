@extends('dinas-3.layout')

@section('content')
<div class="ecommerce-gallery vertical" data-mdb-ecommerce-gallery-init>
  <div class="row">
    <div class="col-lg-12" style="margin-top: 5rem;">
      <h2 class="h2-heading text-left">Detail Album</h2>
      <div class="slider-container">
        <div class="swiper-container text-slider">
          <div class="swiper-wrapper">
            @foreach($gallery as $item)
            <div class="swiper-slide">
              <div class="row">
                <div class="col-lg-8 col-xl-7">
                  <div class="image-container">
                    <img class="img-fluid" src="{{ asset('img_gallery/' . $item->gbr_gallery) }}" alt="{{ $item->jdl_gallery }}">
                  </div>
                </div>
                <div class="col-lg-6 col-xl-5">
                  <div class="text-container">
                    <h1 class="h1-large">{{ $item->jdl_gallery }}</h1>
                    <p class="p-large">{{ $item->keterangan }}</p>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-12 d-flex justify-content-center">
      <div class="lightbox" data-mdb-lightbox-init>
        @foreach($gallery as $item)
        <div class="p-2">
          <img
            src="{{ asset('img_gallery/' . $item->gbr_gallery) }}"
            alt="{{ $item->jdl_gallery }}"
            class="ecommerce-gallery-main-img active w-10 d-flex" style="width: 100px; height: auto;" />
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection