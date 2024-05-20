<nav class="border-gray-200 bg-white px-5 py-2.5 shadow sm:px-4">
    <div class="container mx-auto flex flex-wrap items-center justify-between">
        <a href="/"
           class="flex items-center">
            <img src="{{asset('images/logo.png')}}" class="mr-3 h-20" alt="Logo"/>
            <div class="text-primary text-xl">Hotel Simal Pvt. Ltd.</div>
        </a>
        <button data-collapse-toggle="mobile-menu" type="button"
                class="ml-3 inline-flex items-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 md:hidden"
                aria-controls="mobile-menu" aria-expanded="false"><span class="sr-only">Open main menu</span>
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                      clip-rule="evenodd"></path>
            </svg>
            <svg class="hidden h-6 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                      clip-rule="evenodd"></path>
            </svg>
        </button>
        <div id="mobile-menu" class="hidden w-full md:block md:w-auto">
            <ul class="mt-4 flex flex-col md:mt-0 md:flex-row md:space-x-10">
                @foreach($main_menu as $link => $title)
                    <li>
                        <a href="{{ url($link) }}" class="font-medium text-gray-900 hover:text-primary">{{ $title }}</a>
                    </li>
                @endforeach

                <li><a href="#" class="font-medium bg-orange-600 text-white px-5 py-2 rounded">Reservation</a></li>
            </ul>
        </div>
    </div>
</nav>