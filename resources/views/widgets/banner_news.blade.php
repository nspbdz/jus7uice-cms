@if(isset($data))

<style>
    .wrap {
        width: 300px;
        /* Sesuaikan dengan lebar wrap yang Anda inginkan */
        height: 500px;
        /* Sesuaikan dengan tinggi wrap yang Anda inginkan */
        overflow: hidden;
        /* Mengatasi gambar yang melebihi ukuran wrap */
    }

    .wrap img {
        width: 100%;
        /* Gambar akan mengisi lebar wrap */
        height: 100%;
        /* Gambar akan mengisi tinggi wrap */
        object-fit: cover;
        /* Mengatasi gambar yang mungkin berbeda aspek rasio dengan wrap */
    }
</style>
<div class="col-lg-4">
    <!-- Section Tittle -->
    <div class="section-tittle mb-40">
        <h3>Follow Us</h3>
    </div>
    <!-- Flow Socail -->


    <!-- New Poster -->
    <!-- <div class="news-poster d-none d-lg-block">
        <img src="assets/img/news/news_card.jpg" height="500px" width="250px" alt="">
    </div> -->

    <a href="{{$data->url}}">
</div>
@if(isset($data->thumbnail))
<div class="wrap">
    <img src="{{ asset($data->thumbnail) }}" alt="Gambar Anda">
</div>
<!-- <img src="{{ asset($data->thumbnail) }}" id="img-banner"  height="500px" width="250px" alt=""> -->
@endif

</div>
</a>

</div>
@endif