@extends('layouts.app')

@section('content')
    <section class="min-h-screen py-16">
        <div class="max-w-6xl mx-auto text-center">
            <div class="mb-5">
                <h1 class="text-3xl md:text-5xl text-primary font-serif">{{$page->title}}</h1>
                <div class="divider bg-orange-600"></div>
            </div>
            <div id="ightgallery" class="grid grid-cols-4 gap-8">
                @foreach($galleries as $gallery)
                <div class="item" data-src="{{$gallery->getFirstMedia('gallery')->getFullUrl()}}">
                    <img class="object-cover h-full w-full" src="{{$gallery->getFirstMedia('gallery')->getUrl('thumb')}}" alt="{{$gallery->caption}}">
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection