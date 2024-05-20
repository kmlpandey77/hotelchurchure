<li class="relative" x-data="dropdown" @mouseover.away="open = false">
    <x-navbar.link :class="isset($noborder) ? 'md:px-0' : 'md:border-b'" @mouseover="open = true" href="#" :title="$title" />
    <ul x-show="open" x-cloak x-transition
        {{ $attributes->merge(['class' => 'md:absolute md:w-48 bg-white md:rounded md:shadow md:top-[100%] font-normal ml-5 md:ml-0 md:border md:border-b-0 text-base']) }}>
        {{ $slot }}
    </ul>
</li>
