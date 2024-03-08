@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('page-content')
    <div class="container px-20 lg:mt-8 max-lg:px-10 max-sm:px-5 mx-auto min-h-screen">

        <section class="dashboard w-full">
            <div class="title-heading  text-center w-full mt-8">
                <p class="text-3xl  max-sm:mx-auto p-5 [@media(min-width:625px)]:animate-bounce">Welcome On Dashboard User<b>
                         </b></p>
            </div>
            <div class="flex flex-row justify-center  max-sm:grid max-sm:grid-cols-1 pt-5 gap-5 px-12 ">


                <a href=""
                    class=" bg-white dark:bg-gray-800 overflow-hidden shadow-sm shadow-gray-400 rounded-lg transition hover:scale-90 delay-150 duration-300 ease-in-out grid">
                    <div class="stat">
                        <div class="stat-figure text-accent">
                            <i class="fa-solid fa-store fa-2xl"></i>
                        </div>
                        <div class="stat-title  text-lg font-semibold">Total Product</div>
                        <div class="stat-value">31K</div>

                    </div>

                </a>

                <a href=""
                    class=" bg-white dark:bg-gray-800 overflow-hidden shadow-sm shadow-gray-400 rounded-lg transition hover:scale-90 delay-150 duration-300 ease-in-out">
                    <div class="p-5 flex flex-row justify-evenly">
                        <p class="text-gray-900 text-lg font-semibold dark:text-gray-100 p-2 ">Total Category
                            Project
                        </p>
                        <p class="text-white text-md font-semibold rounded-md  dark:text-gray-100 p-2 px-3 bg-gray-800">
                            50</p>
                    </div>
                </a>

                <a href=""
                    class=" bg-white dark:bg-gray-800 overflow-hidden shadow-sm shadow-gray-400 rounded-lg transition hover:scale-90 delay-150 duration-300 ease-in-out">
                    <div class="p-5 flex flex-row justify-evenly">
                        <p class="text-gray-900 text-lg font-semibold dark:text-gray-100 p-2">Total My Experiences
                        </p>
                        <p class="text-white text-md font-semibold rounded-md  dark:text-gray-100 p-2 px-3 bg-gray-800">
                            50</p>
                    </div>

                </a>




            </div>
        </section>

    </div>
@endsection
