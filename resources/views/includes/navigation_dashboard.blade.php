<div class="container px-8 max-lg:px-0 sticky lg:top-3   z-40">
    <div class="navbar bg-white sticky lg:rounded-lg lg:border-1  top-0 z-40 shadow-md">
        <div class="flex flex-row grow lg:justify-end  max-lg:justify-between">
            <div class="flex-none lg:hidden">
                <label for="my-drawer-2" aria-label="open sidebar" class="btn btn-square btn-ghost">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </label>
            </div>



            <div class="flex space-x-3 lg:px-8">
                <div class="dropdown dropdown-end {{ Auth::user()->roles == 'ADMIN' ? 'hidden' : '' }}">
                    <label tabindex="0" class="btn btn-ghost btn-circle transition duration-300 hover:scale-90">
                        <div class="indicator">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <span class="badge badge-accent badge-sm indicator-item">8</span>
                        </div>
                    </label>


                    <div tabindex="0" class="mt-3 z-[1] card card-compact dropdown-content w-52 bg-base-100 shadow">
                        <div class="card-body">
                            <span class="font-bold text-lg">8 Items</span>
                            <span class="text-info">Subtotal: $999</span>
                            <div class="card-actions">
                                <button class="btn btn-primary btn-block">View cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid">
                <p class="">Hello, <b>{{ Auth::user()->name }}</b></p>
                <p class="text-end font-light text-sm">{{ Auth::user()->roles }}</p>
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
                        class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-40">
                        <li>
                            <a href="/" class="hover:bg-accent hover:text-white">
                                Homepage
                            </a>
                        </li>
                        <li><a href="{{ route('profile.edit') }}" class="hover:bg-accent hover:text-white">Profile</a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}"
                                class="hover:bg-accent hover:text-white">
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
        </div>
    </div>
</div>
