@extends('layout.frontend')


@section('content')

<!-- ======= About Us Section ======= -->
<section id="about" class="about" style="height: 100vh;">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>{{$data->page}}</h2>
        </div>
        <div class="content">
            {!! $data->content !!}
        </div>



    </div>
</section>

@endsection