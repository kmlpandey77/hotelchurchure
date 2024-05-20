@php
if(isset($dark) && $dark){
    $card_class = 'bg-black/20 border-primary hover:border-black/40';
    $text_class = 'text-gray-400';
}else{
    $card_class = 'bg-white border-slate-400 hover:border-primary';
    $text_class = 'text-gray-600';
}
@endphp
<div class="text-left p-8 border rounded {{$card_class}}">
    <div class="w-8 h-8 mb-5 {{$text_class}}">
        {!! $facility->icon !!}
    </div>
    <h3 class="text-2xl mb-5 font-serif">{{ $facility->title }}</h3>
    <p class="{{$text_class}}">
        {{ $facility->details }}
    </p>
</div>