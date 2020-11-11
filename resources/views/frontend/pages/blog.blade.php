@extends('frontend.layout.main')
@section('title')
    Blog
@endsection
@section('content')
  <main>
        <!--================Blog Area =================-->
        <section class="blog_area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <div class="blog_left_sidebar">
                            @foreach ($list as $post)
                              <article class="blog_item">
                                  <div class="blog_item_img">
                                      <img class="card-img rounded-0" src="{{ asset('storage/upload/'.$post->image) }}" alt="{{ $post->title }}">
                                      <a href="#" class="blog_item_date">
                                          <p>{{ \Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}</p>
                                      </a>
                                  </div>
                                  <div class="blog_details">
                                      <a class="d-inline-block" href="{{route('frontend.blog.details',$post->slug)}}">
                                          <h2>{{ $post->title }}</h2>

                                      </a>
                                      <p>{!! $post->body !!}</p>
                                      <ul class="blog-info-link">
                                          <li><a href="#"><i class="fa fa-user"></i> {{ $post->categories->name }} </a></li>
                                          <li><a href="#"><i class="fa fa-book"></i> {{ $post->tags->name }}</a></li>
                                      </ul>
                                  </div>

                              </article>

                            @endforeach

                            <nav class="blog-pagination justify-content-center d-flex">
                            {{ $list->links() }}
                            </nav>
                        </div>

                        <h4>Post Comment</h4>
                        <form class="form-contact contact_form" action="" method="post" id="commentForm" novalidate="novalidate">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter comment'" placeholder=" Enter comment"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                </div>
                            </div>

                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="button button-contactForm boxed-btn">Submit</button>
                        </div>
                    </form>

                    </div>

                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <aside class="single_sidebar_widget search_widget">
                                <form action="#">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder='Search Keyword'
                                                   onfocus="this.placeholder = ''"
                                                   onblur="this.placeholder = 'Search Keyword'">
                                            <div class="input-group-append">
                                                <button class="btns" type="button"><i class="ti-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                            type="submit">Search</button>
                                </form>
                            </aside>

                            <aside class="single_sidebar_widget post_category_widget">
                                <h4 class="widget_title">Category</h4>
                                <ul class="list cat-list">

                                    @foreach($categories as $category)
                                        <li>
                                            <a href="{{route('category_wise.post',$category->id)}}" class="d-flex">
                                                <p>{{ $category->name }}</p>
                                                <p>&nbsp;({{ $category->blog_posts->count()  }}) </p>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </aside>

                            <aside class="single_sidebar_widget popular_post_widget">
                                <h3 class="widget_title">Recent Post</h3>

                                @foreach( $random_posts as $random_post)
                                    <div class="media post_item">
                                        <img src="assets/img/post/post_1.png" alt="post">
                                        <div class="media-body">
                                            <a href="{{route('frontend.blog.details',$post->slug)}}">
                                                <h3>{{$random_post->title}}</h3>
                                            </a>
                                            <p>{{ \Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                @endforeach

                            </aside>
                            <aside class="single_sidebar_widget tag_cloud_widget">
                                <h4 class="widget_title">Tag Clouds</h4>
                                <ul class="list">
                                    <li>
                                        <a href="#">project</a>
                                    </li>
                                    <li>
                                        <a href="#">love</a>
                                    </li>
                                    <li>
                                        <a href="#">technology</a>
                                    </li>
                                    <li>
                                        <a href="#">travel</a>
                                    </li>
                                    <li>
                                        <a href="#">restaurant</a>
                                    </li>
                                    <li>
                                        <a href="#">life style</a>
                                    </li>
                                    <li>
                                        <a href="#">design</a>
                                    </li>
                                    <li>
                                        <a href="#">illustration</a>
                                    </li>
                                </ul>
                            </aside>


                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!--================Blog Area =================-->

    </main>
@endsection
