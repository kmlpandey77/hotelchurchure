@extends('layouts.app')

@section('content')
    <section class="min-h-screen py-16">
        <div class="max-w-6xl mx-auto text-center">
            <div class="mb-5">
                <h1 class="text-3xl md:text-5xl text-primary font-serif">{{ $blog->title }}</h1>
                <div class="divider bg-orange-600"></div>
            </div>
            <div class="mx-8 md:mx-0">

                <div class="page max-w-3xl mx-auto">
                    <div class="flex max-h-72 justify-center mb-5">
                        <img src="{{$blog->getFirstMedia('blogs')->getUrl()}}" alt="">
                    </div>
                    {!! $blog->details !!}
                </div>
            </div>
        </div>
    </section>
@endsection
