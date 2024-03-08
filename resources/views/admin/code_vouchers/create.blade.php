@extends('layouts.app')
@section('title')
    Code Voucher Add
@endsection
@section('page-content')

    <div class="container px-12 lg:mt-10 max-lg:px-10 max-sm:px-5 mx-auto min-h-screen">
        @if ($errors->any())
            <div class="alert alert-error shadow-md rounded-md mb-5">
                <div class="grid gap-1">
                    @foreach ($errors->all() as $error)
                        <div class="flex flex-row gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>{{ $error }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <section class="product-edit card card-compact bg-white shadow-xl rounded-md">
            <div class="card-body">
                <div class="grid title gap-2">
                    <p class="text-lg font-medium">Add New Code Voucher</p>
                    <hr class="mb-3 border-gray-300" />
                </div>
                <form action="{{ route('code-vouchers.store') }}" method="POST" class="grid gap-3"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-2 gap-3">
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Code</span>
                            </label>
                            <input type="text" name="code"
                                class="input input-bordered input-accent w-full focus:outline-offset-0 focus:border-accent" />
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Discount Price</span>
                            </label>
                            <input type="text" name="discount"
                                class="input input-bordered input-accent w-full focus:outline-offset-0 focus:border-accent" />
                        </div>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Description</span>
                        </label>
                        <textarea class="textarea textarea-accent focus:outline-offset-0 focus:border-accent" name="desc"></textarea>
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
