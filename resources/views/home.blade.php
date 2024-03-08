@extends('layouts.root')
@section('title')
    Homepage
@endsection
@section('content')
    <div class="container px-20 lg:mt-8 max-lg:px-10 max-sm:px-5 mx-auto">
        <section class="banner max-lg:mt-8">
            <div class="splide" id="frist-splide" aria-label="...">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach ($banners as $ban)
                            <li class="splide__slide"><img src="{{ asset('storage/' . $ban->banner_image) }}"
                                    class="rounded-xl max-sm:h-[240px]" alt="">
                            </li>
                        @endforeach

                    </ul>
                </div>

                <!-- Add the progress bar element -->
                <div class="my-carousel-progress">
                    <div class="my-carousel-progress-bar"></div>
                </div>
            </div>
        </section>

        <section class="menu-content flex flex-row mt-10 gap-16">
            <div class="option-content flex flex-col min-w-fit prose max-sm:hidden  ">
                <h2 class="filter-by">Filter by</h2>
                <form method="GET">
                    <div class="grid gap-3">
                        <button type="submit" name="popular" value="popular"
                            class="populer link no-underline transition duration-300 hover:scale-90 text-sm bg-gray-300 hover:text-white hover:bg-green-500 p-1 text-center rounded-2xl">Populer</button>
                        <button type="submit" name="rating" value="rating"
                            class="rating-menu link no-underline transition duration-300 hover:scale-90 text-sm bg-gray-300 hover:text-white hover:bg-green-500 p-1 text-center rounded-2xl">Rating</button>
                        <button type="submit" name="newest" value="newest"
                            class="new link no-underline transition duration-300 hover:scale-110 text-sm bg-gray-300 hover:text-white hover:bg-green-500 p-1 text-center rounded-2xl {{ Request::input('newest') ? 'bg-green-500 scale-90 text-white' : 'bg-gray-300' }}">Newest</button>
                    </div>
                </form>

            </div>
            <div class="page-content flex flex-col flex-auto">
                <div class="flex justify-between max-sm:flex-col-reverse">
                    <div class="grid max-sm:mt-5 max-sm:text-center">
                        <p class="text-xl font-bold">The Best Product On Here</p>
                        <p class="text-gray-500 text-sm">Choose or search the product you want</p>
                    </div>

                    <form method="GET">
                        <div class="input-search relative">

                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 absolute top-4 left-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <input type="text" placeholder="Search" name="search_product"
                                value="{{ request()->get('search_product') }}"
                                class="input input-accent focus:outline-offset-0 focus:border-none rounded-3xl sm:max-w-96 [@media(min-width:425px)]:w-96 [@media(max-width:425px)]:w-full  max-sm:pl-10 max-sm:input-md pl-10" />
                            <button type="submit"
                                class="btn btn-active btn-accent rounded-3xl btn-sm text-white max-sm:btn-sm max-sm:text-xs absolute right-3 top-2 ">Search</button>
                        </div>
                    </form>
                </div>

                <div class="grid xl:grid-cols-4 lg:grid-cols-3 grid-cols-2 gap-4 mt-10 max-sm:mt-5">
                    @foreach ($products as $pro)
                        <a href="{{ route('detail_product', $pro->id) }}">
                            <div
                                class="card card-compact w-auto bg-base-100 shadow-xl border transition-all duration-300 ease-in-out hover:shadow-xl hover:shadow-green-200 hover:scale-105">
                                <figure
                                    class="bg-cover bg-center [@media(min-width:1280px)]:h-[160px] [@media(min-width:1024px)]:h-[140px] [@media(width:768px)]:max-h-28 max-sm:h-[100px] border-b">
                                    @forelse ($pro->images as $img)
                                        <img src="{{ asset('storage/' . $img->image_product) }}">
                                    @break

                                    @empty
                                        {{-- If for some reason the business has no images, you can put here some kind of placeholder image, using 3rd party services or maybe your own generic image --}}
                                        <img src="//via.placeholder.com/150x150" alt="" class="img-fluid" />
                                    @endforelse
                                </figure>
                                <div class="card-body">
                                    <p class="card-product-title text-lg max-sm:text-base font-extrabold">
                                        {{ $pro->name_product }}
                                    </p>
                                    <p class="card-category font-semibold pb-2 text-base -mt-2 text-gray-500">
                                        @if (Request::filled('search_product'))
                                            {{ $pro->category }}
                                        @else
                                            {{ $pro->category->category_name }}
                                        @endif
                                    </p>
                                    <div class="price-rating flex flex-row max-sm:grid max-sm:gap-1 -mt-3">
                                        <p
                                            class="card-subtitle text-base text-accent font-semibold text-start max-sm:text-xs">
                                            Rp.
                                            {{ number_format($pro->price) }}</p>
                                        <div class="rating rating-xs min-sm:place-self-center">
                                            <input type="radio" name="rating-1" class="mask mask-star-2 bg-yellow-500"
                                                disabled />
                                            <input type="radio" name="rating-2" class="mask mask-star-2 bg-yellow-500"
                                                disabled />
                                            <input type="radio" name="rating-3" class="mask mask-star-2 bg-yellow-500"
                                                disabled />
                                            <input type="radio" name="rating-4" class="mask mask-star-2 bg-yellow-500"
                                                disabled />
                                            <input type="radio" name="rating-5" class="mask mask-star-2 bg-yellow-200"
                                                disabled />
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </a>
                    @endforeach




                </div>

            </div>

        </section>
    </div>
@endsection
