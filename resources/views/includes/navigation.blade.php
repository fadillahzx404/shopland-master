<nav class="bg-white sticky top-0 z-40 pt-2 shadow-md   ">
    <div class="mx-auto max-w-full px-2 sm:px-6 lg:px-20 ">
        <div class="flex flex-row h-16 items-center justify-between">
            <div class="relative inset-y-0 left-0  items-center sm:hidden">
                <!-- Mobile menu button-->
                <button type="button" id="mobile-menu-button"
                    class="relative inline-flex items-center justify-center rounded-md p-2  text-gray-400 hover:bg-green-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!--
            Icon when menu is closed.

            Menu open: "hidden", Menu closed: "block"
          -->
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!--
            Icon when menu is open.

            Menu open: "block", Menu closed: "hidden"
          -->
                    <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex flex-1 items-stertch sm:items-stretch justify-between">
                <div class="flex-shrink-0 self-center">
                    <img class="h-8 w-auto hover:scale-90 transition duration-300 max-sm:pl-3" src="/images/logo.png" />
                </div>
                @if (Route::has('login'))
                    @auth
                        <div class="flex flex-row space-x-3 sm:hidden">
                            <div
                                class="dropdown dropdown-end self-center {{ request()->is('carts*') ? 'bg-accent rounded-full ' : '' }}">
                                <label tabindex="0"
                                    class="btn btn-ghost btn-circle transition duration-300 hover:scale-90 max-sm:btn-sm">
                                    <a href="{{ route('carts', Auth::user()->id) }}">
                                        <div class="indicator">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5 {{ request()->is('carts*') ? 'text-white' : '' }}"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                            <span
                                                class="badge  badge-sm indicator-item {{ request()->is('carts*') ? 'badge-ghost border' : 'badge-accent' }}">{{ Auth::user()->carts->count('product_id') }}</span>
                                        </div>
                                    </a>
                                </label>

                            </div>
                            <div class="border border-grey-900 "></div>
                            <div class="dropdown dropdown-end self-center">
                                <label tabindex="0"
                                    class="btn btn-ghost btn-circle avatar transition duration-300 hover:scale-90 max-sm:btn-sm">
                                    <div class="w-9 rounded-full max-sm:w-7">
                                        <img src="/images/user.png" />
                                    </div>
                                </label>
                                <ul tabindex="0"
                                    class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow-xl bg-base-100 border-2 rounded-box w-40 space-y-1">
                                    <li><a href="{{ Auth::user()->roles == 'ADMIN' ? route('dashboard-admin') : route('dashboard-user') }}"
                                            class="hover:bg-accent hover:text-white">Dashboard</a></li>
                                    <li><a href="" class="hover:bg-accent hover:text-white">Profile</a></li>
                                    <li>
                                        <form method="POST" class="hover:bg-accent hover:text-white"
                                            action="{{ route('logout') }}">
                                            @csrf

                                            <a :href="route('logout')"
                                                onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                                Log out
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @else
                        <div class="flex flex-row gap-2 sm:hidden">
                            <a href="{{ route('login') }}"
                                class="btn btn-sm text-center font-medium text-white  bg-black hover:bg-green-600 hover:outline-1 hover:outline-black hover:text-gray-900 rounded-2xl">Log
                                in</a>
                            <a href="{{ route('register') }}"
                                class="btn btn-sm text-center font-medium text-gray-800  bg-gray-300 hover:bg-green-600 hover:text-gray-900 rounded-2xl ">Signup</a>
                        </div>
                    @endauth
                @endif
                <div class="hidden sm:block self-center">
                    <div class="flex space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->

                        <a href="/"
                            class="hover:scale-90 transition duration-300 text-gray-600 rounded-md px-3 py-2 text-sm font-medium {{ request()->is('/') ? 'bg-green-600 text-white' : '' }} ">Home</a>

                        <a href="/all_products"
                            class="hover:scale-90 transition duration-300 text-gray-600 hover:bg-green-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium {{ request()->is('all_products') ? 'bg-green-600 text-white' : '' }}">All
                            Product</a>
                        <a href="/about"
                            class="hover:scale-90 transition duration-300 text-gray-600 hover:bg-green-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium {{ request()->is('about') ? 'bg-green-600 text-white' : '' }}">About
                            Us</a>
                        <a href="/code_vouchers"
                            class="hover:scale-90 transition duration-300 text-gray-600 hover:bg-green-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium {{ request()->is('code_vouchers') ? 'bg-green-600 text-white' : '' }}">Code Vouchers</a>


                    </div>
                </div>
                <div class="hidden sm:block login-register self-center flex-row space-x-2">
                    @if (Route::has('login'))
                        @auth
                            <div class="flex space-x-3">
                                <div
                                    class="dropdown dropdown-end {{ request()->is('carts*') ? 'bg-accent rounded-full ' : '' }}">
                                    <label tabindex="0"
                                        class="btn btn-ghost btn-circle transition duration-300 hover:scale-90 ">
                                        <a href="{{ route('carts', Auth::user()->id) }}">
                                            <div class="indicator">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5 {{ request()->is('carts*') ? 'text-white' : '' }}"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                                </svg>
                                                <span
                                                    class="badge  badge-sm indicator-item {{ request()->is('carts*') ? 'badge-ghost border' : 'badge-accent' }}">{{ Auth::user()->carts->count('product_id') }}</span>
                                            </div>
                                        </a>
                                    </label>



                                </div>
                                <div class="border border-grey-900 "></div>
                                <div class="dropdown dropdown-end ">
                                    <label tabindex="0"
                                        class="btn btn-ghost btn-circle avatar transition duration-300 hover:scale-90">
                                        <div class="w-9 rounded-full">
                                            <img src="/images/user.png" />
                                        </div>
                                    </label>
                                    <ul tabindex="0"
                                        class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-40 space-y-1">
                                        <li><a href="{{ Auth::user()->roles == 'ADMIN' ? route('dashboard-admin') : route('dashboard-user') }}"
                                                class="hover:bg-accent hover:text-white">Dashboard</a></li>
                                        <li><a href="" class="hover:bg-accent hover:text-white">Profile</a></li>
                                        <li>
                                            <form method="POST" class="hover:bg-accent hover:text-white"
                                                action="{{ route('logout') }}">
                                                @csrf

                                                <a :href="route('logout')"
                                                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                                    Log out
                                                </a>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('login') }}"
                                class="hover:scale-90 transition duration-300  font-semibold text-white px-4 py-2  bg-black hover:bg-green-600 hover:outline-1 hover:outline-black hover:text-gray-900 rounded-2xl text-sm">Log
                                in</a>
                            <a href="{{ route('register') }}"
                                class="hover:scale-90 transition duration-300 font-semibold text-gray-800 px-4 py-2  bg-gray-300 hover:bg-green-600 hover:text-gray-900 rounded-2xl text-sm">Signup</a>
                        @endauth
                    @endif
                </div>

            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="sm:hidden" id="mobile-menu">
            <div class="space-y-2 px-2 pb-3 pt-2 hidden" id="mobile-menu-slide">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="/"
                    class=" text-gray-400 rounded-md px-3 py-2 font-medium block {{ request()->is('/') ? 'bg-green-500 text-white' : '' }}"
                    aria-current="page"><i class="fa-solid fa-house w-7 "></i> Home</a>
                <a href="/all_products"
                    class="text-gray-400 hover:bg-green-600 hover:text-white block rounded-md px-3 py-2 text-base font-medium {{ request()->is('all_products') ? 'bg-green-600 text-white' : '' }}"><i
                        class="fa-solid fa-shop w-7"></i> All
                    Product</a>
                <a href="/"
                    class="text-gray-400 hover:bg-green-600 hover:text-white block rounded-md px-3 py-2 text-base font-medium {{ request()->is('about') ? 'bg-green-600 text-white' : '' }}"><i
                        class="fa-solid fa-building w-7 pl-1"></i> About</a>

            </div>
        </div>
</nav>
