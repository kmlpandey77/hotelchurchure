@extends('layouts.app')

@section('content')
    <section class="min-h-screen py-16">
        <div class="max-w-6xl mx-auto text-center">
            <div class="mb-5">
                <h1 class="text-3xl md:text-5xl text-primary font-serif">{{ $page->title }}</h1>
                <div class="divider bg-orange-600"></div>
            </div>
            <div class="mx-8 md:mx-0">
                @if ($page->rooms)
                    @foreach ($page->rooms as $room)
                        @include('partials.room-card')
                    @endforeach
                @elseif($page->facilities)
                    <div class="grid md:grid-cols-3 gap-4 px-5 md:px-5">
                        @foreach ($page->facilities as $facility)
                            @include('partials.facility-card')
                        @endforeach
                    </div>
                @elseif($page->blogs)
                    <div class="grid md:grid-cols-3 gap-4 px-5 md:px-5">
                        @foreach ($page->blogs as $blog)
                            @include('partials.blog-card')
                        @endforeach
                    </div>
                @else
                    <div class="page max-w-3xl mx-auto">
                        {!! $page->details !!}
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
