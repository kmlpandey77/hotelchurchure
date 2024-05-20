<div class="relative" x-data="dropdown" @mouseover.away="open = false">
    <a href=" #" @mouseover="open = true" class="block py-2 px-3 border-b md:hover:text-primary">
        {{ $title }}
    </a>
    <ul x-show="open" x-transition
        {{ $attributes->merge(['class' => 'md:absolute md:w-48 bg-white md:rounded md:shadow md:top-[100%] font-normal ml-5 md:ml-0']) }}>
        {{ $slot }}
    </ul>
</div>
