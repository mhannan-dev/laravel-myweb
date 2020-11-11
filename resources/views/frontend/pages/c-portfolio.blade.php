@extends('frontend.layout.main')
@section('javascript')
Link
@stop
@section('css')
    Link
@stop
@section('title')
    Portfolio
@endsection
@section('content')
  <main>

          <!-- Services Area Start -->
          <section class="services-area  services-padding ">
              <div class="container">

                  <div id="filters" class="button-group">
                      <button class="button is-checked" data-filter="*">All</button>
                      @foreach($categories as $portfolio_row)
                          <button class="button" data-filter=".{{$portfolio_row->slug}}">{{ $portfolio_row->name }}</button>
                      @endforeach

                  </div>


                  <div class="grid">
                      <div class="element-item transition metal" data-category="transition">
                          <img src="assets/img/service/services2.png" alt="services2">

                      </div>
                      <div class="element-item metalloid" data-category="metalloid">
                          <img src="assets/img/service/services3.png" alt="services3">

                      </div>
                      <div class="element-item post-transition metal" data-category="post-transition">
                          <img src="assets/img/service/services4.png" alt="services4">

                      </div>
                      <div class="element-item post-transition metal" data-category="post-transition">
                          <img src="assets/img/service/services1.png" alt="">

                      </div>
                      <div class="element-item transition metal" data-category="transition">
                          <img src="assets/img/service/services3.png" alt="">

                      </div>
                      <div class="element-item alkali metal " data-category="alkali">
                          <img src="assets/img/service/services2.png" alt="services2">

                      </div>



                  </div>
              </div>
          </section>
          <!-- Services Area End -->

      </main>
@endsection
