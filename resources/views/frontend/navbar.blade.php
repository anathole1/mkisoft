
<!-- </header> -->
<nav class=" top-0 left-0 bg-blue-500 w-full shadow">
        <div class="container m-auto flex justify-between items-center text-white">
        <Link class="flex title-font font-medium items-center mb-4 md:mb-0 pl-3" href="/">
            <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-green-500 rounded-full" viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </svg> -->
            <img src="./img/ingenzi.png" alt="" class="w-6 h-6 md:w-12 md:h-12 bg-white">
             <h1 class="pl-8 py-4 text-xl font-bold">CBO INGENZI</h1>
     </Link>
            <ul class="hidden md:flex items-center pr-10 text-base font-semibold cursor-pointer">
                <li class="hover:bg-blue-300 py-4 px-6">
                <x-nav-link :href="route('about')" :active="request()->routeIs('about')" class="text-white hover:text-white">
                            {{ __('Home') }}
                        </x-nav-link>
                </li>
                <li class="hover:bg-blue-300 py-4 px-6">
                <x-nav-link :href="route('program.review')" :active="request()->routeIs('program')" class="text-white hover:text-white">
                            {{ __('Programs') }}
                        </x-nav-link>
                </li>
                <li class="hover:bg-blue-300 py-4 px-6">
                    <!-- <a href="staff">Team</a> -->
                <x-nav-link :href="route('staff.index')" :active="request()->routeIs('staff')" class="text-white hover:text-white">
                            {{ __('Team') }}
                        </x-nav-link>
            </li>
                <li class="hover:bg-blue-300 py-4 px-6">
                <x-nav-link :href="route('contact.create')" :active="request()->routeIs('contact-us')" class="text-white hover:text-white">
                            {{ __('Contact Us') }}
                        </x-nav-link>
                </li>

            </ul>
            <button class="block md:hidden py-3 px-4 mx-2 rounded focus:outline-none hover:bg-gray-200 group">
                <div class="w-5 h-1 bg-white mb-1"></div>
                <div class="w-5 h-1 bg-white mb-1"></div>
                <div class="w-5 h-1 bg-white "></div>
                <div class="absolute top-0 -right-full h-screen w-8/12 bg-blue-700 border opacity-0 group-focus:right-0 group-focus:opacity-100 transition-all duration-300">
                    <ul class="flex flex-col items-center w-full text-base cursor-pointer pt-10">
                    <li class="hover:bg-blue-300 py-4 px-6">
                <x-nav-link :href="route('about')" :active="request()->routeIs('about')" class="text-white hover:text-white">
                            {{ __('Home') }}
                        </x-nav-link>
                </li>
                <li class="hover:bg-blue-300 py-4 px-6">
                <x-nav-link :href="route('program.review')" :active="request()->routeIs('program')" class="text-white hover:text-white">
                            {{ __('Programs') }}
                        </x-nav-link>
                </li>
                <li class="hover:bg-blue-300 py-4 px-6">
                    <!-- <a href="staff">Team</a> -->
                <x-nav-link :href="route('staff.index')" :active="request()->routeIs('staff')" class="text-white hover:text-white">
                            {{ __('Team') }}
                        </x-nav-link>
            </li>
                <li class="hover:bg-blue-300 py-4 px-6">
                <x-nav-link :href="route('contact.create')" :active="request()->routeIs('contact-us')" class="text-white hover:text-white">
                            {{ __('Contact Us') }}
                        </x-nav-link>
                </li>
                    </ul>
                </div>
            </button>
        </div>
    </nav>
