@if(isset($data))


<section class="whats-news-area pt-50 pb-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row d-flex justify-content-between">
                    <div class="col-lg-3 col-md-3">
                        <div class="section-tittle mb-30">
                            <h3>Whats New</h3>
                        </div>
                    </div>
                    <br>
                    <div class="col-lg-9 col-md-9" style="margin-top: 10px; margin-bottom: 100px;">
                        <div class="properties__button">

                            <!--Nav Button  -->
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <!-- tambahkan category nya disini dari table category di WidgetNews -->
                                    @foreach($categories as $row)
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">{{$row->name}}</a>
                                    @endforeach

                                </div>
                            </nav>
                            <!--End Nav Button  -->
                        </div>
                    </div>
                    <br> </br>
                    <br> </br>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- Nav Card -->
                        <div class="tab-content" id="nav-tabContent">
                            <!-- card one -->
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="whats-news-caption">
                                    <div class="row">
                                        @foreach($data as $items)

                                        <div class="col-lg-6 col-md-6">
                                            <a href="{{$items->url}}">
                                                <div class="single-what-news mb-100">
                                                    <div class="what-img">
                                                        <img src="{{ asset($items->thumbnail) }}" alt="">
                                                    </div>
                                                    <div class="what-cap">
                                                        <span class="color1">{{$items->title}}</span>
                                                        <!-- <h4 id="content"><a href="#"> {!! $items->content !!}
                                                            </a></h4> -->
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        @endforeach

                                        <div class="col-lg-6 col-md-6">
                                            <div class="single-what-news mb-100">
                                                <div class="what-img">
                                                    <img id="img-data" src="" alt="">
                                                </div>
                                                <div class="what-cap">
                                                    <span id="title-data" class="color1"> </span>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <a href="{{$items->url}}">
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
                                       <h4><a href="#">{{$items->title}}</a></h4>
                                   </div>
                               </div>
                           </a> -->

                                        <!-- <div class="col-lg-6 col-md-6">
                                            <div class="single-what-news mb-100">
                                                <div class="what-img">
                                                    <img src="assets/img/news/whatNews2.jpg" alt="">
                                                </div>
                                                <div class="what-cap">
                                                    <span class="color1">Night party</span>
                                                    <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="single-what-news mb-100">
                                                <div class="what-img">
                                                    <img src="assets/img/news/whatNews3.jpg" alt="">
                                                </div>
                                                <div class="what-cap">
                                                    <span class="color1">Night party</span>
                                                    <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="single-what-news mb-100">
                                                <div class="what-img">
                                                    <img src="assets/img/news/whatNews4.jpg" alt="">
                                                </div>
                                                <div class="what-cap">
                                                    <span class="color1">Night party</span>
                                                    <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- End Nav Card -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Mengakses data dari controller dan menampilkannya
    var dataFromController = @json($data);
    console.log(dataFromController.length, 'adataFromController.length')

    // Sekarang, Anda dapat menggunakan data tersebut dalam JavaScript
    console.log(dataFromController, 'ini data');

    // Misalnya, jika Anda ingin menampilkan data dalam elemen HTML:
    // var someElement = document.getElementById('title-data');
    // someElement.innerHTML = dataFromController.title; // Gantilah 'someValue' dengan nama properti yang sesuai dalam data Anda.
    // Mendapatkan elemen container
    var imgElement = document.getElementById('img-data');
    var titleElement = document.getElementById('title-data');

    // Loop melalui dataFromController dan memasukkan data ke dalam elemen-elemen HTML
    for (var i = 0; i < dataFromController.length; i++) {
        // console.log(dataFromController[i], 'dataFromController[i].thumbnail')
        imgElement.src = dataFromController[i].thumbnail;
        titleElement.innerHTML = dataFromController[i].title;
    }

    // str limit
    $(document).ready(function() {
        var contentElement = $('#content');
        console.log(contentElement, 'contentElement')
        var content = contentElement.html();
        var words = content.split(' ');

        if (words.length > 80) {
            var limitedContent = words.slice(0, 80).join(' ');
            contentElement.html(limitedContent + '...'); // Menambahkan elipsis jika terpotong
        }
    });
</script>

<!-- Whats New End -->

@endif