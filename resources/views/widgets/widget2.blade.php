@if(isset($data))
<style>
    /* Gaya untuk tampilan desktop */
    .weekly-img {
        width: 200px; /* Sesuaikan dengan lebar wrap yang Anda inginkan */
        height: 200px; /* Sesuaikan dengan tinggi wrap yang Anda inginkan */
        overflow: hidden; /* Mengatasi gambar yang melebihi ukuran wrap */
    }

    .weekly-img img {
        width: 100%; /* Gambar akan mengisi lebar wrap */
        height: 100%; /* Gambar akan mengisi tinggi wrap */
        object-fit: cover; /* Mengatasi gambar yang mungkin berbeda aspek rasio dengan wrap */
    }

    /* Gaya untuk tampilan mobile */
    @media (max-width: 768px) {
        .weekly-img {
            width: 100%; /* Gambar mengisi lebar layar penuh */
            height: auto; /* Tinggi gambar disesuaikan dengan aspek rasio */
            overflow: hidden; /* Mengatasi gambar yang melebihi ukuran wrap */
        }

        .weekly-img img {
            width: 100%; /* Gambar mengisi lebar layar penuh */
            height: auto; /* Tinggi gambar disesuaikan dengan aspek rasio */
            object-fit: cover; /* Mengatasi gambar yang mungkin berbeda aspek rasio dengan wrap */
        }
          /* Gaya khusus untuk tampilan mobile */
          .weekly-caption {
            padding: 10px; /* Sesuaikan dengan padding yang Anda inginkan untuk mobile */
            font-size: 14px; /* Sesuaikan dengan ukuran font yang Anda inginkan untuk mobile */
        }
    }
</style>

<div class="weekly-news-area pt-50">
    <div class="container">
        <div class="weekly-wrapper">
            <!-- section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-30">
                        <h3>Montly Top News</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="weekly-news-active dot-style d-flex dot-style">
                        @foreach($data as $items)
                        <a href="{{$items->url}}">

                        <div class="weekly-single">
                            <div class="weekly-img">
                                @if(isset($items->thumbnail))
                                <img src="{{ asset($items->thumbnail) }}" width="150px" height="250px" alt="">
                                @else
                                <img src="{{ asset('path_to_default_image.jpg') }}" width="350px" height="250px" alt="Default Image">
                                @endif
                                <!-- <img src="{{asset('frontendTemplate/aznews-master/assets/img/news/weeklyNews2.jpg')}}" alt=""> -->
                            </div>
                            <div class="weekly-caption">
                                    <span class="color1">{{ Str::limit($items->title, 50) }}</span>
                            </div>
                        </div>
                        </a>

                        @endforeach

                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif