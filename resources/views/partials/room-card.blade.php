
<div class="flex md:flex-row flex-col items-stretch items-center bg-white border mx-5 mb-5 md:m-0 {{ !$loop->last ? 'md:border-b-0':'' }}">
    <div class="md:w-1/2 {{$loop->odd ? 'md:order-1' : '' }}">
         <div class="swiper roomSlider h-full">
             <div class="swiper-wrapper h-full">
                 @foreach($room->getMedia('rooms') as $media)
                     <div class="swiper-slide !h-[220px] md:!h-full">
                         <img data-src="{{$media->getFullUrl()}}" class="swiper-lazy object-cover h-full w-full" alt="{{$room->title}}"/>
                         <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                     </div>
                 @endforeach
             </div>
             <div class="swiper-pagination"></div>
         </div>
    </div>
    <div class="text-left py-4 px-8 md:px-16 md:py-8 md:w-1/2 {{$loop->odd ? '' : 'md:order-1' }}">
        <h5 class="mb-2 text-2xl font-serif">{{$room->title}}</h5>
        <div class="mb-3 text-gray-700">
            {!! $room->details !!}
        </div>
        <ul class="ml-10 list-disc text-gray-700 mb-3">
            @foreach($room->facilities as $facility)
                <li>{{$facility['facility']}}</li>
            @endforeach
        </ul>
        <p class="text-gray-700">
            From
            <b class="text-2xl text-primary">{{$room->price}}</b>
            per night
        </p>
        <div class="w-40 mt-5">
            <x-navbar.link
                    class="bg-red-600 text-white px-8 py-2 rounded uppercase hover:!text-white text-center"
                    href="{{route('reservation', ['room' => $room->title])}}"
                    title="Book now"
            />
        </div>
    </div>
</div>
