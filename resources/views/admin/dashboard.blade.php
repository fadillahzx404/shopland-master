@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('page-content')
    <div class="container px-12 lg:mt-8 max-lg:px-10 max-sm:px-5 mx-auto min-h-screen">

        <section class="dashboard w-full">
            <div class="title-heading  text-center w-full mt-8">
                <p class="text-3xl  max-sm:mx-auto p-5 [@media(min-width:625px)]:animate-bounce">Welcome On Dashboard <b>
                        {{ Auth::user()->name }} </b></p>
            </div>
            <div class="grid grid-cols-4  max-sm:grid max-sm:grid-cols-1 pt-5 gap-3 ">




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
                    class=" bg-white dark:bg-gray-800 overflow-hidden shadow-sm shadow-gray-400 rounded-lg transition hover:scale-90 delay-150 duration-300 ease-in-out grid">
                    <div class="stat">
                        <div class="stat-figure text-accent">
                            <i class="fa-solid fa-store fa-2xl"></i>
                        </div>
                        <div class="stat-title  text-lg font-semibold">Total Product</div>
                        <div class="stat-value">31K</div>

                    </div>

                </a>


            </div>
        </section>
        <section class="last-transaction card card-compac bg-white shadow-sm shadow-gray-400 mt-5">
            <div class="card-body">
                <div class="overflow-x-auto">
                    <table class="table">
                        <!-- head -->
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Job</th>
                                <th>Favorite Color</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- row 1 -->
                            <tr class="bg-base-200">
                                <th>1</th>
                                <td>Cy Ganderton</td>
                                <td>Quality Control Specialist</td>
                                <td>Blue</td>
                            </tr>
                            <!-- row 2 -->
                            <tr>
                                <th>2</th>
                                <td>Hart Hagerty</td>
                                <td>Desktop Support Technician</td>
                                <td>Purple</td>
                            </tr>
                            <!-- row 3 -->
                            <tr>
                                <th>3</th>
                                <td>Brice Swyre</td>
                                <td>Tax Accountant</td>
                                <td>Red</td>
                            </tr>
                            <!-- row 4 -->
                            <tr>
                                <th>4</th>
                                <td>Brice Swyre</td>
                                <td>Tax Accountant</td>
                                <td>Red</td>
                            </tr>
                            <!-- row 5 -->
                            <tr>
                                <th>5</th>
                                <td>Brice Swyre</td>
                                <td>Tax Accountant</td>
                                <td>Red</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </section>

    </div>
@endsection
