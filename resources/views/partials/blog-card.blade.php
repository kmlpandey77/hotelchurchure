<div class="bg-white shadow-md border border-gray-200 rounded-lg max-w-sm mb-5 text-left">
    <a href="{{$blog->url}}">
        <img class="rounded-t-lg" src="{{$blog->getFirstMedia('blogs')->getUrl()}}" alt="">
    </a>
    <div class="p-5">
        <a href="{{$blog->url}}">
            <h5 class="text-gray-900 font-bold text-2xl tracking-tight mb-2">
                {{$blog->title}}
            </h5>
        </a>
        <p class="font-normal text-gray-700 mb-3">
            {{ Str::limit(strip_tags($blog->details), 250)}}
        </p>
        <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center"
           href="{{$blog->url}}">
            Read more
        </a>
    </div>
</div>
