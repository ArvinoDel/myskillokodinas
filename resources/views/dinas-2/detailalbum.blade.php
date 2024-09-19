@extends('dinas-2.layout')

@section('content')
<br>
<br>
<div class="ecommerce-gallery vertical" data-mdb-ecommerce-gallery-init>
  <div class="row d-flex justify-content-center">
    <div class="col-lg-10" style="margin-top: 3rem; margin-bottom: 3rem;">
      <h2 class="h2-heading text-center">Detail Album</h2>
      <div class="carousel-container">
        <div id="gallery-carousel" class="carousel slide carousel-vertical" data-bs-ride="carousel" data-bs-interval="3500">
          <div class="carousel-inner">
            @foreach($gallery as $item)
            <div class="carousel-item{{ $loop->first ? ' active' : '' }}">
              <div class="d-flex justify-content-center">
                <!-- Card component -->
                <div class="card" style="width: 80%; max-width: 800px;">
                    <div class="row no-gutters">
                      <div class="col-lg-8 col-xl-7">
                        <img class="card-img img-fluid" src="{{ asset('img_gallery/' . $item->gbr_gallery) }}" alt="{{ $item->jdl_gallery }}">
                      </div>
                      <div class="col-lg-6 col-xl-5">
                        <div class="card-body">
                          <h5 class="card-title text-center font-weight-bold">{{ $item->jdl_gallery }}</h5> <!-- Text judul gambar -->
                          <p class="card-text">{{ $item->keterangan }}</p> <!-- Keterangan gambar -->
                        </div>
                      </div>
                    </div>
                    <a href="/albums" class="btn btn-primary">Kembali ke Album</a>
                  </div>                  
              </div>
            </div>
            @endforeach
          </div>
          <a class="carousel-control-prev" href="#gallery-carousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-up" aria-hidden="true"></span>
          </a>
          <a class="carousel-control-next" href="#gallery-carousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-down" aria-hidden="true"></span>
          </a>
        </div>

        <!-- Section for horizontally aligned images in cards -->
        <div class="card-body d-flex flex-row justify-content-center mb-3">
            @foreach($gallery as $item)
            <div class="p-2">
              <div class="card" style="width: 100px;">
                <img
                  src="{{ asset('img_gallery/' . $item->gbr_gallery) }}"
                  alt="{{ $item->jdl_gallery }}"
                  class="card-img-top img-fluid"
                  style="cursor: pointer;"
                  onclick="changeMainImage(this)"
                  data-bs-slide-to="{{ $loop->index }}">
              </div>
            </div>
            @endforeach
        </div>
      </div>   
    </div> 
  </div>
</div>

<script>
  function changeMainImage(element) {
    const index = element.getAttribute('data-bs-slide-to');
    const carousel = document.querySelector('#gallery-carousel');
    const carouselInstance = bootstrap.Carousel.getOrCreateInstance(carousel);
    carouselInstance.to(index);
  }
</script>
@endsection

<style>
  .carousel-vertical {
    height: 500px; /* Adjust as needed */
    position: relative;
  }
  .carousel-inner {
    height: 100%;
  }
  .carousel-item {
    height: 100%;
  }
  .carousel-control-prev, .carousel-control-next {
    width: 100%;
  }

  /* Customizing the color of the icons to black */
  .carousel-control-prev-icon, .carousel-control-next-icon {
    width: 100%;
    height: 50px;
    background-color: black; /* Set icon background to black */
    filter: none; /* Ensure no color filter is applied */
  }
  
  .bi-chevron-up, .bi-chevron-down {
    font-size: 2rem;
    color: black; /* Ensure the icon is black */
  }

  /* Styling for the card container with horizontally aligned images */
  .card-body {
  display: flex;
  flex-direction: column; /* Stack title and text vertically */
  justify-content: center;
  padding: 1rem;
}

.card-title {
  font-weight: bold; /* Bold text for the title */
  margin-bottom: 0.5rem; /* Space between title and description */
}

.card-text {
  text-align: left; /* Align the description text to the left */
}


  /* Adjusting the padding and width of the image cards */
  .card-body .card {
    margin: 0 1rem;
  }

  .card-img-top {
    height: 80px; /* Adjust the height as needed */
    object-fit: cover;
  }

  @media (max-width: 767px) {
  .card-body.d-flex.flex-row {
    overflow-x: auto; /* Enable horizontal scrolling */
    white-space: nowrap; /* Prevent line breaks */
    padding: 0; /* Remove padding if needed */
  }

  .card-body .card {
    display: inline-block; /* Ensure cards are inline for horizontal scrolling */
    width: 100px; /* Adjust width if needed */
  }
}
</style>
