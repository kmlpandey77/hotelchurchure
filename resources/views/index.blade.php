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
                    <img data-src="{{asset('images/hotel.jpg')}}" alt="Hotel" class="w-full lozad">
                </div>
                <div class="md:w-1/2 text-center">
                    <div class="mb-5">
                        <h1 class="text-3xl md:text-5xl text-primary font-serif">Hotel Alina Churchure</h1>
                        <div class="divider bg-secondary"></div>
                    </div>
                    <div class="mx-8 md:mx-0 page">
                        {!! $page->details !!}
                    </div>
                </div>
            </div>

            <div class="bg-white shadow rounded-lg mt-8">
                <div class="flex">
                    @foreach($facilities as $facility)
                        <div class="flex items-center space-x-4 w-1/3 p-8">
                            <div class="text-primary h-10 w-10">
                                {!! $facility->icon !!}
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold">{{ $facility->title }}</h3>
                                <p class="text-gray-500 m-0">{{ \Illuminate\Support\Str::limit(strip_tags($facility->details), 50) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

    </section>
    {{--    <section class="py-8 md:py-16 bg-gray-700 text-white">--}}
    {{--        <div class="max-w-6xl mx-auto text-center">--}}
    {{--            <div class="mb-5">--}}
    {{--                <h2 class="text-3xl md:text-5xl font-serif">Our Facilities</h2>--}}
    {{--                <div class="divider bg-red-600"></div>--}}
    {{--            </div>--}}
    {{--            <div class="grid md:grid-cols-3 gap-4 px-5 md:px-5">--}}
    {{--                @foreach($facilities as $facility)--}}
    {{--                    @include('partials.facility-card', ['dark' => true])--}}
    {{--                @endforeach--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    <section class="py-8 md:py-16">
        <div class="max-w-6xl mx-auto text-center">
            <div class="mb-5">
                <h2 class="text-3xl md:text-5xl text-primary font-serif">Our Rooms</h2>
                <div class="divider bg-secondary"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <!-- Room 1 -->
                @foreach($rooms as $room)
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        @if($image = $room->getFirstMediaUrl('rooms'))
                            <img class="w-full h-72 object-cover" src="{{ $image }}"
                                 alt="Room Image">
                        @else
                            <img class="w-full h-72 object-cover" src="https://via.placeholder.com/400x300"
                                 alt="Room Image">
                        @endif
                        <div class="p-4">
                            <h3 class="text-lg font-semibold">{{ $room->title }}</h3>
                            <p class="text-gray-500">{!! str(strip_tags($room->details))->limit() !!}</p>
                            <div class="mt-4">
                                <p class="text-gray-700">
                                    From
                                    <b class="text-2xl text-secondary">Rs. {{$room->price}}</b>
                                    per night
                                </p>
                            </div>
                        </div>
                        <div class="flex mt-5">
                            <div class="w-1/2">
                                <x-navbar.link
                                    class="bg-secondary text-white px-8 py-2 uppercase hover:!text-white text-center"
                                    href="{{route('reservation', ['room' => $room->title])}}"
                                    title="Book now"
                                />
                            </div>
                            <div class="w-1/2">
                                <x-navbar.link
                                    class="bg-gray-200 text-gray-600 px-8 py-2 uppercase hover:!text-gray-800 text-center"
                                    href="{{route('reservation', ['room' => $room->title])}}"
                                    title="View Details"
                                />
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

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
                            <img src="{{$recommendation->getFirstMediaUrl('recommendation')}}"
                                 alt="{{$recommendation->title}}" class="h-10">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
