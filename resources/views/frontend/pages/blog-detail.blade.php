@extends('frontend.layout.main')
@section('Blog','active')
@section('title')
    Blog Details
@endsection
@section('page-name')
    Blog Details Page
@endsection
@section('content')
    <main>
        <!--================Blog Area =================-->
        <section class="blog_area section-padding">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class=" col-lg-8 mb-5 mb-lg-0">
                        <div class="blog_left_sidebar">

                                <article class="blog_item">
                                    <div class="blog_item_img">
                                        <img class="card-img rounded-0" src="{{ asset('storage/upload/'.$detail_post->image) }}" alt="{{ $detail_post->title }}">
                                        <a href="#" class="blog_item_date">
                                            <p>{{ \Carbon\Carbon::parse($detail_post->updated_at)->diffForHumans() }}</p>
                                        </a>
                                    </div>
                                    <div class="blog_details">
                                        <a class="d-inline-block" href="{{route('frontend.blog.details',$detail_post->slug)}}">
                                            <h2>{{ $detail_post->title }}</h2>

                                        </a>
                                        <p>{!! $detail_post->body !!}</p>
                                        <ul class="blog-info-link">
                                            <li><a href="#"><i class="fa fa-user"></i> {{ $detail_post->categories->name }} </a></li>
                                            <li><a href="#"><i class="fa fa-book"></i> {{ $detail_post->tags->name }}</a></li>
                                        </ul>
                                    </div>

                                </article>

                        </div>
                        <div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://httpsmhannanxyz000webhostappcom.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                                  

                    </div>

                </div>
            </div>
        </section>
        <!--================Blog Area =================-->

    </main>
@endsection
