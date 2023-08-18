@extends('layouts.guest')

@section('content')
    <div class="relative flex items-top justify-center min-h-screen bg-light-primary dark:bg-dark-primary sm:items-center sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="/threads" class="text-sm text-gray-700 underline">{{Auth::user()->name}}</a>
                    {{-- <v-dropdown :width="'w-56'" :position="'right-0'">
                      <template #button>
                        <div class="bg-gray-700 hover:text-gray-200 text-white text-center flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white cursor-pointer" id="user-menu" aria-haspopup="true">
                            <img class="m-1 rounded-full w-9 h-9" width="64px" height="64px" src="https://gravatar.com/avatar/{{md5(auth_user()->email)}}?s=128" alt="{{auth_user()->name}}'s avatar">
                            <span class="text-sm font-medium pr-3">
                                {{Auth::user()->name}}
                            </span>
                        </div>
                      </template>
                      <template #menu>
                        <div class="p-1 max-h-80 overflow-y-auto">
                            <a href="/profiles/{{Auth::user()->name}}" class="dropdown-link">Your Profile</a>
                            <a href="/threads?by={{Auth::user()->name}}" class="dropdown-link">Your Threads</a>
                            <a href="#" class="dropdown-link">Setting</a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit" class="dropdown-link text-left">
                                    {{ __('Logout') }}
                                </button>
                            </form>
                        </div>
                      </template>
                    </v-dropdown> --}}
                @else
                    <a href="{{ route('login') }}" class="text-sm text-black dark:text-white underline">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-black dark:text-white underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center justify-center pt-8 sm:justify-start sm:pt-0">
            <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M352 256c0 22.2-1.2 43.6-3.3 64H163.3c-2.2-20.4-3.3-41.8-3.3-64s1.2-43.6 3.3-64H348.7c2.2 20.4 3.3 41.8 3.3 64zm28.8-64H503.9c5.3 20.5 8.1 41.9 8.1 64s-2.8 43.5-8.1 64H380.8c2.1-20.6 3.2-42 3.2-64s-1.1-43.4-3.2-64zm112.6-32H376.7c-10-63.9-29.8-117.4-55.3-151.6c78.3 20.7 142 77.5 171.9 151.6zm-149.1 0H167.7c6.1-36.4 15.5-68.6 27-94.7c10.5-23.6 22.2-40.7 33.5-51.5C239.4 3.2 248.7 0 256 0s16.6 3.2 27.8 13.8c11.3 10.8 23 27.9 33.5 51.5c11.6 26 20.9 58.2 27 94.7zm-209 0H18.6C48.6 85.9 112.2 29.1 190.6 8.4C165.1 42.6 145.3 96.1 135.3 160zM8.1 192H131.2c-2.1 20.6-3.2 42-3.2 64s1.1 43.4 3.2 64H8.1C2.8 299.5 0 278.1 0 256s2.8-43.5 8.1-64zM194.7 446.6c-11.6-26-20.9-58.2-27-94.6H344.3c-6.1 36.4-15.5 68.6-27 94.6c-10.5 23.6-22.2 40.7-33.5 51.5C272.6 508.8 263.3 512 256 512s-16.6-3.2-27.8-13.8c-11.3-10.8-23-27.9-33.5-51.5zM135.3 352c10 63.9 29.8 117.4 55.3 151.6C112.2 482.9 48.6 426.1 18.6 352H135.3zm358.1 0c-30 74.1-93.6 130.9-171.9 151.6c25.5-34.2 45.2-87.7 55.3-151.6H493.4z"/></svg>                <span class="text-3xl ml-3 tracking-widest text-black dark:text-white">
                    QuerySphere
                </span>
            </div>

            <div class="mt-8 card overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            <div class="ml-4 text-lg leading-7 font-semibold">
                                <a href="/threads" class="underline text-black dark:text-white">Discussion Forum</a>
                            </div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-black text-opacitydark:-60 dark:text-white dark:text-opacity-50 text-sm">
                                Laravel Forum built with laravel, tailwind, vue js.
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t light:border-gray-200 border-gray-700 md:border-t-0 md:border-l">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laracasts.com" class="underline text-black dark:text-white">Laracasts</a></div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-black text-opacity-60 dark:text-white dark:text-opacity-50 text-sm">
                                Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out, see for yourself, and massively level up your development skills in the process.
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t light:border-gray-200 border-gray-700">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                            <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel-news.com/" class="underline text-black dark:text-white">Laravel News</a></div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-black text-opacity-60 dark:text-white dark:text-opacity-50 text-sm">
                                Laravel News is a community driven portal and newsletter aggregating all of the latest and most important news in the Laravel ecosystem, including new package releases and tutorials.
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t white:border-gray-200 border-gray-700 md:border-l">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <div class="ml-4 text-lg leading-7 font-semibold text-black dark:text-white">Vibrant Ecosystem</div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-black text-opacity-60 dark:text-white dark:text-opacity-50 text-sm">
                                Laravel's robust library of first-party tools and libraries, such as <a href="https://forge.laravel.com" class="underline">Forge</a>, <a href="https://vapor.laravel.com" class="underline">Vapor</a>, <a href="https://nova.laravel.com" class="underline">Nova</a>, and <a href="https://envoyer.io" class="underline">Envoyer</a> help you take your projects to the next level. Pair them with powerful open source libraries like <a href="https://laravel.com/docs/billing" class="underline">Cashier</a>, <a href="https://laravel.com/docs/dusk" class="underline">Dusk</a>, <a href="https://laravel.com/docs/broadcasting" class="underline">Echo</a>, <a href="https://laravel.com/docs/horizon" class="underline">Horizon</a>, <a href="https://laravel.com/docs/sanctum" class="underline">Sanctum</a>, <a href="https://laravel.com/docs/telescope" class="underline">Telescope</a>, and more.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 sm:text-left">
                    <div class="flex items-center">
                        <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="-mt-px w-5 h-5 text-gray-400">
                            <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>

                        <a href="https://laravel.bigcartel.com" class="ml-1 underline">
                            Shop
                        </a>

                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                            <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>

                        <a href="https://github.com/sponsors/taylorotwell" class="ml-1 underline">
                            Sponsor
                        </a>
                    </div>
                </div>

                <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </div>
            </div>
        </div>
    </div>
@endsection