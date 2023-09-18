@extends('layout.frontend')

@section('content')

<!-- About US Start -->
<div class="about-area" style="margin-top:100px">
    <div class="container">
        <!-- Hot Animated News Tittle-->
       
        <div class="row">
            <div class="col-lg-12">
                <!-- Trending Tittle -->
                <div class="about-right mb-90">
                    <div class="about-img">
                        @if(isset($data->thumbnail))
                        <img src="{{ asset($data->thumbnail) }}" alt="" class="img-fluid news-image">
                        @else
                            <img src="{{ asset('placeholder-image.jpg') }}" alt="" class="img-fluid news-image">
                        @endif
                    </div>
                    <div class="section-tittle mb-30 pt-30">
                        @if(isset($data->title))
                        <h3>{{$data->title}}</h3>
                        @endif
                    </div>
                    <div class="about-prea">
                        <p class="about-pera1 mb-25">
                            @if(isset($data->content))
                            {{$data->content}}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About US End -->

@endsection
