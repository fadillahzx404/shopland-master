@extends('layouts.app')
@section('title')
    Category Add
@endsection
@section('page-content')
    <div class="flash-data" data-error="{!! \Session::get('error') !!}"></div>
    <div class="container px-12 lg:mt-10 max-lg:px-10 max-sm:px-5 mx-auto min-h-screen">

        <section class="product-edit card card-compact bg-white shadow-xl rounded-md">
            <div class="card-body">
                <div class="grid title gap-2">
                    <p class="text-lg font-medium">Add New Category</p>
                    <hr class="mb-3 border-gray-300" />
                </div>
                <form action="{{ route('category.store') }}" method="POST" class="grid gap-3" enctype="multipart/form-data">
                    @csrf
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Category Name</span>
                        </label>
                        <input type="text" name="category_name"
                            class="input input-bordered input-accent w-full focus:outline-offset-0 focus:border-accent" />
                    </div>


                    <div class="flex flex-row gap-2 mt-10 justify-end">
                        <a href="{{ route('category.index') }}"
                            class="btn btn-sm btn-error transition duration-300 hover:scale-90">Cancel</a>
                        <button class="btn btn-sm px-5 btn-accent text-white transition duration-300 hover:scale-90"
                            type="submit">Save</button>
                    </div>

                </form>
            </div>
        </section>

    </div>
@endsection

