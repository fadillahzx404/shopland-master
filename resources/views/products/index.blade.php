@extends('layouts.root')
@section('title')
    All Products
@endsection
@section('content')
    <div class="container px-20 lg:mt-8 max-lg:px-10 max-sm:px-5 mx-auto grid gap-12">
        <section class="best-product flex flex-col gap-10 max-sm:gap-5">
            <div class="text-best-product grid max-sm:mt-5 max-sm:text-center">
                <p class="text-2xl font-bold">Top 5 Product By Rating</p>
                <p class="text-gray-500 text-sm">The best product by rating on here.</p>
            </div>
            <div class="best-product-content max-sm:pr-0 pr-5">
                <div class="splide is-overflow" id="second-splide" role="group" aria-label="Splide Basic HTML Example">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach ($pro_lat as $lat)
                                <li class="splide__slide">
                                    <a href="{{ route('detail_product', $lat->id) }}" class="p-3">
                                        <div
                                            class="card card-compact  bg-base-100 shadow-xl border transition-all duration-300 ease-in-out hover:shadow-xl hover:shadow-green-200 hover:scale-105 max-sm:w-11/12">
                                            <figure
                                                class="bg-cover bg-center max-w-xs  [@media(min-width:1280px)]:h-[160px] [@media(min-width:1024px)]:h-[140px] [@media(width:768px)]:max-h-28 border-b">
                                                @forelse ($lat->images as $img)
                                                    <img src="{{ asset('storage/' . $img->image_product) }}" />
                                                @break

                                                @empty
                                                    {{-- If for some reason the business has no images, you can put here some kind of placeholder image, using 3rd party services or maybe your own generic image --}}
                                                    <img src="//via.placeholder.com/150x150" alt=""
                                                        class="img-fluid" />
                                                @endforelse
                                            </figure>
                                            <div class="card-body">
                                                <p class="card-product-title text-lg max-sm:text-base font-extrabold">
                                                    {{ $lat->name_product }}
                                                </p>
                                                <p class="card-category font-semibold pb-2 text-base -mt-2 text-gray-500">
                                                    {{ $lat->category->category_name }}</p>
                                                <div class="price-rating flex flex-row max-sm:grid max-sm:gap-1 -mt-3">
                                                    <p
                                                        class="card-subtitle text-base text-accent font-semibold text-start max-sm:text-xs">
                                                        Rp.
                                                        {{ number_format($lat->price) }}</p>
                                                    <div class="rating rating-xs min-sm:place-self-center">
                                                        <input type="radio" name="rating-1"
                                                            class="mask mask-star-2 bg-yellow-500" disabled />
                                                        <input type="radio" name="rating-2"
                                                            class="mask mask-star-2 bg-yellow-500" disabled />
                                                        <input type="radio" name="rating-3"
                                                            class="mask mask-star-2 bg-yellow-500" disabled />
                                                        <input type="radio" name="rating-4"
                                                            class="mask mask-star-2 bg-yellow-500" disabled />
                                                        <input type="radio" name="rating-5"
                                                            class="mask mask-star-2 bg-yellow-200" disabled />
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>




        </section>


        <section class="all-product flex flex-col flex-auto">
            <div class="flex justify-between max-sm:flex-col-reverse">
                <div class="grid max-sm:mt-5 max-sm:text-center">
                    <p class="text-2xl font-bold">All Product On Here</p>
                    <p class="text-gray-500 text-sm">Choose or search the product you want.</p>
                </div>


                <div class="input-search relative">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 absolute top-4 left-3" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <input type="text" placeholder="Search"
                        class="input input-accent focus:outline-offset-0 focus:border-none rounded-3xl sm:max-w-96 [@media(min-width:425px)]:w-96 [@media(max-width:425px)]:w-full  max-sm:pl-10 max-sm:input-md pl-10" />
                    <button
                        class="btn btn-active btn-accent rounded-3xl btn-sm text-white max-sm:btn-sm max-sm:text-xs absolute right-3 top-2 ">Search</button>
                </div>
            </div>

            <div class="grid xl:grid-cols-4 lg:grid-cols-3 grid-cols-2 gap-4 mt-10 max-sm:mt-5">
                @foreach ($products as $pro)
                    <a href="{{ route('detail_product', $pro->id) }}">
                        <div
                            class="card card-compact w-auto bg-base-100 shadow-xl border transition-all duration-300 ease-in-out hover:shadow-xl hover:shadow-green-200 hover:scale-105">
                            <figure
                                class="bg-cover bg-center [@media(min-width:1280px)]:h-[160px] [@media(min-width:1024px)]:h-[140px] [@media(width:768px)]:max-h-28 max-sm:h-[100px] border-b">
                                @forelse ($pro->images as $img)
                                    <img src="{{ asset('storage/' . $img->image_product) }}" />
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
                                    {{ $pro->category->category_name }}</p>
                                <div class="price-rating flex flex-row max-sm:grid max-sm:gap-1 -mt-3">
                                    <p class="card-subtitle text-base text-accent font-semibold text-start max-sm:text-xs">
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

        </section>

    </div>
@endsection
