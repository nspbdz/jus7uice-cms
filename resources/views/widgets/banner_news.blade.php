@if(isset($data))

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
<img src="{{ asset($data->thumbnail) }}" height="500px" width="250px" alt="">
@endif

</div>
</a>

</div>
@endif
