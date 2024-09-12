@extends('dinas-2.layout')

@section('content')
<div class="ecommerce-gallery vertical" data-mdb-ecommerce-gallery-init>
  <div class="row">
    <div class="col-lg-10" style="margin-top: 5rem;">
      <h2 class="h2-heading text-left">Detail Album</h2>
      <div class="carousel-container">
        <div id="gallery-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3500">
          <div class="carousel-inner">
            @foreach($gallery as $item)
            <div class="carousel-item{{ $loop->first ? ' active' : '' }}">
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
          <a class="carousel-control-prev" href="#gallery-carousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
          </a>
          <a class="carousel-control-next" href="#gallery-carousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
          </a>
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