@extends('frontend.layout.main')

@section('title')
Services
@endsection

@section('content')
<main>
    <!-- Categories Area Start -->
    <section class="categories-area categories-area2  section-padding30">
        <div class="container">
            <div class="row">

                @if(count($services))
                @foreach ($services as $key => $list)


                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-cat text-center mb-50">
                        <div class="cat-icon">

                            {!! $list->icon !!}
                        </div>
                        <div class="cat-cap">
                            <h5><a href="#">{!! $list->title !!}</a></h5>
                            <p>{!! $list->description !!}</p>
                        </div>
                    </div>
                </div>

                @endforeach
                @else
                Opps!!, {{$title }} found</td>

                @endif



            </div>
        </div>
    </section>
    <!-- Categories Area End -->
    <!-- Want To Work Start -->



</main>
@endsection
