@extends('frontend.layout.main')

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
                      <button class="button" data-filter=".metal">PHP</button>
                      <button class="button" data-filter=".transition">Laravel</button>
                      <button class="button" data-filter=".alkali, .alkaline-earth">React</button>
                      <button class="button" data-filter=":not(.transition)">Javascript</button>

                  </div>


                  <div class="grid">
                      <div class="element-item transition metal">
                          <img src="assets/img/service/services2.png" alt="services2">

                      </div>
                      <div class="element-item metalloid">
                          <img src="assets/img/service/services3.png" alt="services2">

                      </div>
                      <div class="element-item post-transition metal">
                          <img src="assets/img/service/services4.png" alt="services2">

                      </div>
                      <div class="element-item post-transition metal">
                          <img src="assets/img/service/services1.png" alt="services2">

                      </div>
                      <div class="element-item transition metal">
                          <img src="assets/img/service/services3.png" alt="services2">

                      </div>
                      <div class="element-item alkali metal">
                          <img src="assets/img/service/services2.png" alt="services2">

                      </div>



                  </div>
              </div>
          </section>
          <!-- Services Area End -->

      </main>
@endsection
