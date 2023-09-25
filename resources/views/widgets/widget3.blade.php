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
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true" onclick="showCategory('all', 'all')">All</a>

                                    <!-- tambahkan category nya disini dari table category di WidgetNews -->
                                    @foreach($categories as $row)
                                    <a class="nav-item nav-link" id="category-{{ $row->id }}" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true" onclick="showCategory({{ $row->id }}, this)">{{$row->name}}</a>
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
                                    <div id="result" class="row">
                                        @php
                                        $specialDataCount = count($specialData);
                                        @endphp
                                        @foreach($specialData as $index => $items)
                                        @if($index < 4) <div class="col-lg-6 col-md-6">
                                            <a href="{{$items->url}}">
                                                <div class="single-what-news mb-100">
                                                    <div class="what-img">
                                                        <img src="{{ asset($items->thumbnail) }}" alt="">
                                                    </div>
                                                    <div class="what-cap">
                                                        <span class="color1">{{$items->title}}</span>
                                                    </div>
                                                </div>
                                            </a>
                                    </div>
                                    @endif
                                    @endforeach
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
    function showCategory(categoryId, clickedElement) {
        console.log(categoryId, 'categoryId');
        // Remove the 'active' class from all category links
        $(".nav-item.nav-link").removeClass("active");

        // Add the 'active' class to the clicked category link
        $(clickedElement).addClass("active");

        $("#result").empty();
        var dataFromController = @json($specialData);
        if (dataFromController.length > 4) {
            dataFromController = dataFromController.slice(0, 4);
        }
        // Fungsi untuk menyaring artikel berdasarkan category_id
        function filterArticlesByCategory(categoryId) {
            if (categoryId === "all") {
                return dataFromController;
            } else {
                return dataFromController.filter(article => article.category_id === categoryId);
            }
        }


        // Contoh penggunaan: Menyaring artikel dengan category_id 1
        const filteredArticles = filterArticlesByCategory(categoryId);

        // Hasil akan berisi artikel-artikel dengan category_id 1
        console.log(filteredArticles);



        console.log('Kategori yang dipilih:', categoryId);
        // Loop melalui data dan membuat elemen HTML untuk setiap item
        $.each(filteredArticles, function(index, item) {
            // console.log(item.category_id);

            var imageUrl = "{{ env('APP_URL') }}" + item.thumbnail;

            var html = '<div class="col-lg-6 col-md-6">' +
                '<div class="single-what-news mb-100">' +
                '<div class="what-img">' +
                '<img src="' + imageUrl + '" alt="">' +
                '</div>' +
                '<div class="what-cap">' +
                '<span class="color1">' + item.title + '</span>' +
                '</div>' +
                '</div>' +
                '</div>';

            // Tambahkan elemen HTML yang baru dibuat ke dalam elemen dengan ID "result"
            $("#result").append(html);

        });
    }
</script>

<script>
    // Mengakses data dari controller dan menampilkannya
    var dataFromController = @json($data);
    if (dataFromController.length > 4) {
        dataFromController = dataFromController.slice(0, 4);
    }
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