@extends('layouts.app')
@section('title')
    Add Banners
@endsection
@section('page-content')
    <div class="flash-data" data-error="{!! \Session::get('error') !!}"></div>
    <div class="container px-12 lg:mt-10 max-lg:px-10 max-sm:px-5 mx-auto min-h-screen">

        <section class="product-edit card card-compact bg-white shadow-xl rounded-md">
            <div class="card-body">
                <div class="grid title gap-2">
                    <p class="text-lg font-medium">Edit Banner <b>{{ $ban->banner_name }}</b></p>
                    <hr class="mb-3 border-gray-300" />
                </div>
                <form action="{{ route('banners.update', $ban->id) }}" method="POST" class="grid gap-3"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Banner Name</span>
                        </label>
                        <input type="text" name="banner_name" value="{{ $ban->banner_name }}"
                            class="input input-bordered input-accent w-full focus:outline-offset-0 focus:border-accent" />
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Image banner before</span>
                        </label>
                        <img src="{{ asset('storage/' . $ban->banner_image) }}" alt=""
                            class="max-h-[20rem] border-2 rounded-xl">
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Upload Image Banner</span>
                        </label>
                        <input type="file" name="banner_image" id="imgInp"
                            class="file-input file-input-bordered file-input-accent w-full focus:outline-offset-0 focus:border-accent" />
                        <label class="label">
                            <span class="label-text mt-2">Preview Banner</span>
                        </label>
                        <img id="blah" class="rounded-xl p-8 border-2 max-h-[20rem]" src="" />
                    </div>


                    <div class="flex flex-row gap-2 mt-10 justify-end">
                        <a href="{{ route('banners.index') }}"
                            class="btn btn-sm btn-error transition duration-300 hover:scale-90">Cancel</a>
                        <button class="btn btn-sm px-5 btn-accent text-white transition duration-300 hover:scale-90"
                            type="submit">Save</button>
                    </div>

                </form>
            </div>
        </section>

    </div>
@endsection
@push('addon-script')
    <script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>
@endpush
