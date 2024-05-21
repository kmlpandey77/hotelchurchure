<nav class="bg-primary px-2 py-2.5 shadow-sm sm:px-4"
     x-data="{ navOpen: false }"
     id="main-nav">
    <div class="container mx-auto flex flex-wrap items-center justify-end relative"
         :class="navOpen ? 'relative' : ''">
        <a href="/"
           class="flex items-center bg-white absolute -top-[87px] left-0 shadow-lg z-10">
            <img src="{{asset('images/logo.png')}}" class="mr-3 h-44" alt="Logo"/>
        </a>
        <button type="button" @click="navOpen = !navOpen"
                class="ml-3 inline-flex items-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 md:hidden"
                aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg x-cloak x-show="!navOpen" class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                      clip-rule="evenodd"></path>
            </svg>
            <svg x-cloak x-show="navOpen" class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                      clip-rule="evenodd"></path>
            </svg>
        </button>
        <div x-cloak class="w-full md:block md:w-auto z-50"
             :class="navOpen ? 'bg-white absolute top-[100%] ' : 'hidden'"
        >
            <x-navbar>
                @foreach($main_menu as $link => $title)
                    <x-navbar.item>
                        <x-navbar.link class="md:px-0 text-white" href="{{ url($link) }}" title="{!! $title !!}"/>
                    </x-navbar.item>
                @endforeach
            </x-navbar>
        </div>
    </div>
</nav>
