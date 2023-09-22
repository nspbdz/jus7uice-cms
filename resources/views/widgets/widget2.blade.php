@if(isset($data))
<div class="weekly-news-area pt-50">
    <div class="container">
        <div class="weekly-wrapper">
            <!-- section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-30">
                        <h3>Weekly Top News</h3>
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

                        <!-- <div class="weekly-single active">
                            <div class="weekly-img">
                                <img src="{{asset('frontendTemplate/aznews-master/assets/img/news/weeklyNews1.jpg')}}" alt="">
                            </div>
                            <div class="weekly-caption">
                                <span class="color1">Strike</span>
                                <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                            </div>
                        </div>
                        <div class="weekly-single">
                            <div class="weekly-img">
                                <img src="{{asset('frontendTemplate/aznews-master/assets/img/news/weeklyNews3.jpg')}}" alt="">
                            </div>
                            <div class="weekly-caption">
                                <span class="color1">Strike</span>
                                <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                            </div>
                        </div>
                        <div class="weekly-single">
                            <div class="weekly-img">
                                <img src="{{asset('frontendTemplate/aznews-master/assets/img/news/weeklyNews1.jpg')}}" alt="">
                            </div>
                            <div class="weekly-caption">
                                <span class="color1">Strike</span>
                                <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif