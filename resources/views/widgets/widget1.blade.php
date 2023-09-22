@if(isset($data))
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
                                       <h4><a href="#">{{$items->title}}</a></h4>
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

