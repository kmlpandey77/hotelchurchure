@extends('layouts.app')

@section('content')
    <div class="swiper mainSlide">
        <div class="swiper-wrapper">
            @foreach($slides as $slide)
                <div class="swiper-slide object-cover !h-[220px] md:!h-[550px]" data-caption="{{$slide->title}}">
                    <img data-src="{{$slide->getFirstMediaUrl('slides')}}" class="swiper-lazy w-full"
                         alt="{{$slide->title}}"/>
                    <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-caption" id="swiper_caption">{{optional($slides[0])->title}}</div>
    </div>

    <section class="welcome py-8 md:py-16">
        <div class="max-w-6xl mx-auto">
            <div class="flex justify-center items-center">
                <div class="w-1/2 mr-20 hidden md:block">
                    <img data-src="{{asset('images/hotel1.jpg')}}" alt="Hotel" class="w-full lozad">
                </div>
                <div class="md:w-1/2 text-center">
                    <div class="mb-5">
                        <h1 class="text-3xl md:text-5xl text-primary font-serif">Hotel Simal</h1>
                        <div class="divider bg-red-600"></div>
                    </div>
                    <div class="mx-8 md:mx-0 page">
                        {!! $page->details !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-8 md:py-16 bg-gray-700 text-white">
        <div class="max-w-6xl mx-auto text-center">
            <div class="mb-5">
                <h2 class="text-3xl md:text-5xl font-serif">Our Facilities</h2>
                <div class="divider bg-red-600"></div>
            </div>
            <div class="grid md:grid-cols-3 gap-4 px-5 md:px-5">
                @foreach($facilities as $facility)
                    @include('partials.facility-card', ['dark' => true])
                @endforeach
            </div>
        </div>
    </section>
    <section class="py-8 md:py-16">
        <div class="max-w-6xl mx-auto text-center">
            <div class="mb-5">
                <h2 class="text-3xl md:text-5xl text-primary font-serif">Our Rooms</h2>
                <div class="divider bg-red-600"></div>
            </div>

            @foreach($rooms as $room)
                @include('partials.room-card')
            @endforeach
        </div>
    </section>
    <section class="py-8 md:py-16 py-16 bg-white">
        <div class="max-w-5xl mx-auto text-center">
            <div class="mb-5">
                <h2 class="text-3xl md:text-5xl font-serif">Recommendation</h2>
                <div class="divider bg-red-600"></div>
            </div>
            <div class="flex flex-col justify-center items-center  md:space-y-4  space-y-4 md:flex-row md:space-x-10">
                @foreach($recommendations as $recommendation)
                    <div>
                        <a href="{{$recommendation->link}}" target="_blank">
                            <img src="{{$recommendation->getFirstMediaUrl('recommendation')}}" alt="{{$recommendation->title}}" class="h-10">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection