@extends('frontend.layout.main')
@section('title')
About Me
@endsection

@section('content')
<main>


    <!-- About Me Start -->
    <div class="about-me pb-top">
        <div class="container">
            @if(count($about))
            @foreach ($about as $key => $list)


            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="about-me-img mb-30">
                        <img src="assets/img/gallery/aboutme.png" alt="">
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="about-me-caption">
                        <h2>{!! $list->title !!}</h2>
                        <p class="pb-30">
                            Unlimited rewards. enjoy attractive discounts flexible Payme options global usage. Unlimited rewards. enjoy attracti exible ayment options global usage.</p>

                    </div>
                </div>
            </div>

            @endforeach
            @else
            Opps!!, {{$title }} found</td>

            @endif
        </div>
    </div>

</main>
@endsection
