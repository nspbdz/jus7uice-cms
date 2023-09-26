@if(isset($data))

<style>
        .weekly2-img {
        width: 200px; /* Sesuaikan dengan lebar wrap yang Anda inginkan */
        height: 200px; /* Sesuaikan dengan tinggi wrap yang Anda inginkan */
        overflow: hidden; /* Mengatasi gambar yang melebihi ukuran wrap */
    }

    .weekly2-img img {
        width: 100%; /* Gambar akan mengisi lebar wrap */
        height: 100%; /* Gambar akan mengisi tinggi wrap */
        object-fit: cover; /* Mengatasi gambar yang mungkin berbeda aspek rasio dengan wrap */
    }

    /* Gaya untuk tampilan mobile */
    @media (max-width: 768px) {
        .weekly2-img {
            width: 100%; /* Gambar mengisi lebar layar penuh */
            height: auto; /* Tinggi gambar disesuaikan dengan aspek rasio */
            overflow: hidden; /* Mengatasi gambar yang melebihi ukuran wrap */
        }

        .weekly2-img img {
            width: 100%; /* Gambar mengisi lebar layar penuh */
            height: auto; /* Tinggi gambar disesuaikan dengan aspek rasio */
            object-fit: cover; /* Mengatasi gambar yang mungkin berbeda aspek rasio dengan wrap */
        }
          /* Gaya khusus untuk tampilan mobile */
          .weekly2-caption {
            padding: 10px; /* Sesuaikan dengan padding yang Anda inginkan untuk mobile */
            font-size: 10px; /* Sesuaikan dengan ukuran font yang Anda inginkan untuk mobile */
        }
          /* Gaya khusus untuk tampilan mobile */
          .weekly2-caption h5 {
            padding: 3px;
             /* Sesuaikan dengan padding yang Anda inginkan untuk mobile */
            font-size: 10px; 
        }
        .weekly2-caption p{
            padding: 3px; /* Sesuaikan dengan padding yang Anda inginkan untuk mobile */
            font-size: 8px; 
        }
        
    }


</style>
<div class="weekly2-news-area  weekly2-pading gray-bg">
       <div class="container">
           <div class="weekly2-wrapper">
               <div class="row">
                   <div class="col-lg-12">
                       <div class="section-tittle mb-30">
                           <h3>Weekly Top News</h3>
                       </div>
                   </div>
               </div>
               <div class="row">
                   <div class="col-12">
                       <div class="weekly2-news-active dot-style d-flex dot-style">

                           @foreach($data as $items)
                           <a href="{{$items->url}}">
                               <div class="weekly2-single">
                                   <div class="weekly2-img">
                                       @if(isset($items->thumbnail))
                                       <img src="{{ asset($items->thumbnail) }}" height="150px" alt="">
                                       @else
                                       <img src="{{ asset('path_to_default_image.jpg') }}" width="350px" height="200px" alt="Default Image">
                                       @endif
                                   </div>
                                   <div class="weekly2-caption">
                                       <span class="color1">{{$items->title}}</span>
                                       <p>{{ $items->created_at->format('d M Y') }}</p>
                                       <h5><a href="#">{{$items->title}}</a></h5>
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

