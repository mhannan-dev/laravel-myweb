@extends('frontend.layout.main')
@section('title')
    Contact
@endsection
@section('content')
  <main>


          <!-- ================ contact section start ================= -->
          <section class="contact-section">
              <div class="container">

                  <div class="row">
                      <div class="col-12">
                          <h2 class="contact-title">Get in Touch</h2>
                      </div>
                      <div class="col-lg-8">
                          <form class="form-contact contact_form" action="{{ route('frontend.contact_mail') }}" method="post">
                              @csrf
                              <div class="row">
                                  <div class="col-12">
                                      <div class="form-group">
                                          <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder=" Enter Message" required></textarea>
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <input class="form-control valid" name="fullname" id="fullname" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your fullname'" placeholder="Enter your name" required>
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email" required>
                                      </div>
                                  </div>
                                  <div class="col-12">
                                      <div class="form-group">
                                          <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder="Enter Subject" required>
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group mt-3">
                                  <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                              </div>
                          </form>
                      </div>
                      <div class="col-lg-3 offset-lg-1">
                          <div class="media contact-info">
                              <span class="contact-info__icon"><i class="ti-home"></i></span>
                              <div class="media-body">
                                  <h3>Dhaka, Bangladesh</h3>

                              </div>
                          </div>
                          <div class="media contact-info">
                              <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                              <div class="media-body">
                                  <h3>01744 894452</h3>
                                  <p>9am to 11pm</p>
                              </div>
                          </div>
                          <div class="media contact-info">
                              <span class="contact-info__icon"><i class="ti-email"></i></span>
                              <div class="media-body">
                                  <h3>mdhannan.info@gmail.com</h3>
                                  <p>Send us your query anytime!</p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
          <!-- ================ contact section end ================= -->

      </main>
@endsection
