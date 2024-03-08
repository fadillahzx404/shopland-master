@extends('layouts.root')
@section('title')
    Detail Product
@endsection
@section('content')
    <div class="cart-data" data-cart="{!! \Session::get('Success') !!}"></div>
    <div class="container px-20 lg:mt-8 max-lg:px-10 max-sm:px-5 mx-auto grid gap-12">
        <section class="image-product-and-checkout-card flex flex-row gap-5">

            <div class="image-product flex flex-row  gap-5 max-sm:grid">
                <section id="main-carousel" class="splide" aria-label="My Awesome Gallery">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach ($pro->images as $img)
                                <li class="splide__slide">
                                    <img src="{{ asset('storage/' . $img->image_product) }}"
                                        class="w-full h-full rounded-lg object-cover border-2" alt="">
                                </li>
                            @endforeach


                        </ul>
                    </div>
                </section>


                <ul id="thumbnails" class="thumbnails self-center">
                    @foreach ($pro->images as $img)
                        <li class="thumbnail">
                            <img src="{{ asset('storage/' . $img->image_product) }}"
                                class="rounded-lg border-2 border-gray-700" alt="">
                        </li>
                    @endforeach

                </ul>
            </div>

            <div class="checkout-card self-center">
                <div class="card w-96  bg-base-100 shadow-xl border-2 hover:shadow-xl ">
                    <div class="card-body">

                        <div class="price-rating flex flex-row max-sm:grid max-sm:gap-1">
                            <p class="card-title max-sm:text-base font-extrabold">{{ $pro->name_product }}</p>
                            <p class="card-subtitle text-base text-accent font-semibold text-end max-sm:text-xs">
                                Rp.
                                {{ number_format($pro->price) }}</p>

                        </div>
                        <p class="text-justify">{{ $pro->desc_product }}</p>
                        <div class="card-actions grid mt-2">
                            @if (Route::has('login'))
                                @auth


                                    <form action="{{ route('carts-store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="products_id" value="{{ $pro->id }}">
                                        <div class="flex flex-row w-full justify-between mb-5">
                                            <p class="text-sm">Quantity</p>
                                            <div class="flex items-center space-x-3">
                                                <button
                                                    class="inline-flex items-center justify-center p-1 text-sm font-medium h-6 w-6 text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                                    type="button" id="minus" onclick="decrementClick()">
                                                    <span class="sr-only">Quantity button</span>
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 18 2">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                                    </svg>
                                                </button>
                                                <div>
                                                    <input type="number" id="quantity" name="quantity" value="1"
                                                        min="1" required
                                                        class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                </div>
                                                <button
                                                    class="inline-flex items-center justify-center h-6 w-6 p-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                                    type="button" id="plus" onclick="incrementClick()">
                                                    <span class="sr-only">Quantity
                                                        button</span>
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 18 18">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <button type="submit"
                                            class="btn btn-accent w-full hover:text-white transition duration-300 hover:scale-90">Add
                                            to
                                            cart</button>
                                    </form>
                                @else
                                    <div class="flex flex-row w-full justify-between mb-5">
                                        <p class="text-sm">Quantity</p>
                                        <div class="flex items-center space-x-3">
                                            <button
                                                class="inline-flex items-center justify-center p-1 text-sm font-medium h-6 w-6 text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                                type="button" id="minus" onclick="decrementClick()">
                                                <span class="sr-only">Quantity button</span>
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 18 2">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M1 1h16" />
                                                </svg>
                                            </button>
                                            <div>
                                                <input type="number" id="quantity" name="quantity" value="1"
                                                    min="1" required
                                                    class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                            <button
                                                class="inline-flex items-center justify-center h-6 w-6 p-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                                type="button" id="plus" onclick="incrementClick()">
                                                <span class="sr-only">Quantity
                                                    button</span>
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 18 18">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <button onclick="my_modal_2.showModal()"
                                        class="btn btn-accent
                                w-full hover:text-white transition duration-300 hover:scale-90">Add
                                        to
                                        cart</button>

                                    <dialog id="my_modal_2" class="modal">
                                        <div class="modal-box flex flex-col items-center text-center">
                                            <form method="dialog">
                                                <button
                                                    class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                            </form>
                                            <h3 class="font-bold text-lg">Hello Customer! You are not login</h3>
                                            <div class="p-3 bg-blue-500 text-white rounded-full mt-4 animate-bounce">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    class="stroke-current shrink-0 w-8 h-8 ">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </div>
                                            <p class="py-4 text-sm">Please login into your account to add product to cart or
                                                register if
                                                you not have account.</p>

                                            <div class="modal-action">

                                                <form method="dialog">
                                                    <!-- if there is a button in form, it will close the modal -->


                                                    <a href="{{ route('login') }}"
                                                        class="btn btn-sm text-center font-medium text-white  bg-black hover:bg-green-600 hover:outline-1 hover:outline-black hover:text-gray-900 rounded-2xl">Log
                                                        in</a>
                                                    <a href="{{ route('register') }}"
                                                        class="btn btn-sm text-center font-medium text-gray-800  bg-gray-300 hover:bg-green-600 hover:text-gray-900 rounded-2xl ">Signup</a>

                                                </form>
                                            </div>
                                        </div>
                                        <form method="dialog" class="modal-backdrop">
                                            <button>close</button>
                                        </form>
                                    </dialog>
                                @endauth
                            @endif
                        </div>

                    </div>
                </div>
            </div>

        </section>
        <section class="reviews-products">

            <p class="text-lg font-semibold underline underline-offset-8">Customer Review</p>
            <div class="review-customer grid gap-4 mt-8">
                <div class="flex flex-row gap-4">
                    <div class="image-users h-14 w-14 rounded-full">
                        <img class="" src="/images/user.png" alt="">
                    </div>
                    <div class="rating rating-md self-center min-sm:place-self-center">
                        <input type="radio" name="rating-1" class="mask mask-star-2 bg-yellow-500" disabled />
                        <input type="radio" name="rating-2" class="mask mask-star-2 bg-yellow-500" disabled />
                        <input type="radio" name="rating-3" class="mask mask-star-2 bg-yellow-500" disabled />
                        <input type="radio" name="rating-4" class="mask mask-star-2 bg-yellow-500" disabled />
                        <input type="radio" name="rating-5" class="mask mask-star-2 bg-yellow-200" disabled />
                    </div>
                </div>
                <p class="font-bold text-xl text-green-800">Udin</p>
                <p class="text-base font-light">Lorem Ipsum is simply dummy text of the printing and typesetting
                    industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                    printer took a galley of type and scrambled it to make a type specimen book. </p>
            </div>
            <div class="review-customer grid gap-4 mt-8">
                <div class="flex flex-row gap-4">
                    <div class="image-users h-14 w-14 rounded-full">
                        <img class="" src="/images/user.png" alt="">
                    </div>
                    <div class="rating rating-md self-center min-sm:place-self-center">
                        <input type="radio" name="rating-1" class="mask mask-star-2 bg-yellow-500" disabled />
                        <input type="radio" name="rating-2" class="mask mask-star-2 bg-yellow-500" disabled />
                        <input type="radio" name="rating-3" class="mask mask-star-2 bg-yellow-500" disabled />
                        <input type="radio" name="rating-4" class="mask mask-star-2 bg-yellow-500" disabled />
                        <input type="radio" name="rating-5" class="mask mask-star-2 bg-yellow-200" disabled />
                    </div>
                </div>
                <p class="font-bold text-xl text-green-800">Udin</p>
                <p class="text-base font-light">Lorem Ipsum is simply dummy text of the printing and typesetting
                    industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                    printer took a galley of type and scrambled it to make a type specimen book. </p>
            </div>
            <div class="review-customer grid gap-4 mt-8">
                <div class="flex flex-row gap-4">
                    <div class="image-users h-14 w-14 rounded-full">
                        <img class="" src="/images/user.png" alt="">
                    </div>
                    <div class="rating rating-md self-center min-sm:place-self-center">
                        <input type="radio" name="rating-1" class="mask mask-star-2 bg-yellow-500" disabled />
                        <input type="radio" name="rating-2" class="mask mask-star-2 bg-yellow-500" disabled />
                        <input type="radio" name="rating-3" class="mask mask-star-2 bg-yellow-500" disabled />
                        <input type="radio" name="rating-4" class="mask mask-star-2 bg-yellow-500" disabled />
                        <input type="radio" name="rating-5" class="mask mask-star-2 bg-yellow-200" disabled />
                    </div>
                </div>
                <p class="font-bold text-xl text-green-800">Udin</p>
                <p class="text-base font-light">Lorem Ipsum is simply dummy text of the printing and typesetting
                    industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                    printer took a galley of type and scrambled it to make a type specimen book. </p>
            </div>
        </section>


    </div>
@endsection

@push('addon-script')
    <script>
        var i = 1;

        function incrementClick() {
            document.getElementById('quantity').value = ++i;
        }

        function decrementClick() {
            document.getElementById('quantity').value = --i;
        }
    </script>
@endpush
