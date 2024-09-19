@extends('dinas-3.layout')

@section('content')
<br>
<br>
<br>
<div class="container mt-5 mb-5">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <h2 class="h2-heading text-center mb-1">Detail Album</h2>
      <div class="carousel-container">
        <div id="gallery-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3500">
          <div class="carousel-inner">
            @foreach($gallery as $item)
            <div class="carousel-item{{ $loop->first ? ' active' : '' }}">
              <div class="d-flex justify-content-center">
                <div class="card" style="width: 80%; max-width: 800px;">
                  <div class="row no-gutters">
                    <div class="col-lg-8 col-xl-7">
                      <img class="card-img img-fluid" src="{{ asset('img_gallery/' . $item->gbr_gallery) }}" alt="{{ $item->jdl_gallery }}">
                    </div>
                    <div class="col-lg-4 col-xl-5">
                      <div class="card-body">
                        <h5 class="card-title text-center font-weight-bold">{{ $item->jdl_gallery }}</h5>
                        <p class="card-text">{{ $item->keterangan }}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          
          <div class="mt-3">
            <div class="d-flex justify-content-center">
              <div class="carousel-thumbnails" style="max-width: 800px; overflow-x: auto;">
                @foreach($gallery as $item)
                <div class="thumbnail-item" style="display: inline-block; margin: 0 5px;">
                  <img
                    src="{{ asset('img_gallery/' . $item->gbr_gallery) }}"
                    alt="{{ $item->jdl_gallery }}"
                    class="img-fluid"
                    style="width: 80px; height: 60px; object-fit: cover; cursor: pointer;"
                    onclick="changeMainImage(this)"
                    data-bs-target="#gallery-carousel"
                    data-bs-slide-to="{{ $loop->index }}">
                </div>
                @endforeach
              </div>
            </div>
          </div>
          
          <button class="carousel-control-prev" type="button" data-bs-target="#gallery-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#gallery-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        
        <div class="text-center mt-4">
          <a href="/albums" class="btn btn-primary">Kembali ke Album</a>
        </div>
      </div>
    </div> 
  </div>
</div>

@extends('dinas-3.layout')

@section('content')
<!-- Bagian HTML tetap sama seperti sebelumnya -->

<style>
  .carousel-container {
    max-width: 800px;
    margin: 0 auto;
  }
  .carousel-inner .card {
    border: none;
  }
  .carousel-thumbnails {
    display: flex;
    justify-content: center;
    flex-wrap: nowrap;
    overflow-x: auto;
  }
  .thumbnail-item {
    flex: 0 0 auto;
  }
  .carousel-control-prev,
  .carousel-control-next {
    width: 5%;
  }
  .carousel-control-prev-icon,
  .carousel-control-next-icon {
    background-image: none; /* Menghapus ikon default */
    background-color: rgba(0, 0, 0, 0.5);
    border-radius: 50%;
    padding: 10px;
    position: relative;
  }
  .carousel-control-prev-icon::before,
  .carousel-control-next-icon::before {
    content: "";
    display: block;
    width: 20px;
    height: 20px;
    border-top: 3px solid black;
    border-left: 3px solid black;
    position: absolute;
    top: 50%;
    left: 50%;
  }
  .carousel-control-prev-icon::before {
    transform: translate(-25%, -50%) rotate(-45deg);
  }
  .carousel-control-next-icon::before {
    transform: translate(-75%, -50%) rotate(135deg);
  }
  .carousel-control-prev,
  .carousel-control-next {
    opacity: 1;
  }
  .carousel-control-prev:hover,
  .carousel-control-next:hover {
    opacity: 0.8;
  }
  .visually-hidden {
    color: black; /* Mengubah warna teks "Previous" dan "Next" menjadi hitam */
  }
</style>

<script>
  function changeMainImage(element) {
    const index = element.getAttribute('data-bs-slide-to');
    const carousel = document.querySelector('#gallery-carousel');
    const carouselInstance = bootstrap.Carousel.getOrCreateInstance(carousel);
    carouselInstance.to(index);
  }
</script>
@endsection