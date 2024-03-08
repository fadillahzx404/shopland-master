@extends('layouts.app')
@section('title')
    Products Edit
@endsection
@section('page-content')
    <div class="container px-12 lg:mt-10 max-lg:px-10 max-sm:px-5 mx-auto min-h-screen">

        <section class="product-edit card card-compact bg-white shadow-xl rounded-md">
            <div class="card-body">
                <div class="grid title gap-2">
                    <p class="text-lg font-medium">Edit Product <b>{{ $pro->name_product }}</b></p>
                    <hr class="mb-3 border-gray-300" />
                </div>
                <form action="{{ route('products.update', $pro->id) }}" class="grid gap-3" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Name</span>
                        </label>
                        <input type="text" value="{{ $pro->name_product }}" name="name_product"
                            class="input input-bordered input-accent w-full focus:outline-offset-0 focus:border-accent" />
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Price</span>
                            </label>
                            <input type="number" value="{{ $pro->price }}" name="price"
                                class="input input-bordered input-accent w-full focus:outline-offset-0 focus:border-accent" />
                        </div>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Category</span>
                            </label>
                            <select class="select select-accent w-full focus:outline-offset-0 focus:border-accent"
                                name="category_id">
                                @foreach ($category as $cat)
                                    <option value="{{ $cat->id }}">
                                        {{ $cat->category_name }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Description</span>
                        </label>

                        <textarea class="textarea textarea-accent focus:outline-offset-0 focus:border-accent" name="desc_product">{{ $pro->desc_product }}</textarea>
                    </div>
                    <div class="form-control">
                        <div class="img-before">
                            <label class="label">
                                <span class="label-text">Image product before: </span>
                            </label>
                            <div class="flex flex-row gap-2 w-full">
                                @foreach ($pro->images as $img)
                                    <img src="{{ asset('storage/' . $img->image_product) }}"
                                        class="max-h-[16rem] max-w-[16rem] border-2" alt="">
                                @endforeach
                            </div>
                        </div>
                    </div>


                    <div class="form-control image-up">

                        <label for="files" class="label">
                            <span class="label-text">Upload image</span>
                            <span class="label-text-alt text-red-600">*The first photo will be used as a
                                thumbnail</span>
                        </label>

                        <input type="file" accept="image/*" onchange="preview(this)"
                            class="file-input file-input-bordered file-input-accent w-full  focus:outline-offset-0 focus:border-accent"
                            multiple name="image_product[]" />



                        <div class="preview-area flex flex-row gap-2"></div>

                    </div>

                    <div class="flex flex-row gap-2 mt-10 justify-end">
                        <a href="{{ route('products.index') }}"
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
        function preview(elem, output = '') {
            Array.from(elem.files).map((file) => {
                const blobUrl = window.URL.createObjectURL(file)
                output += `<img class='max-h-[20rem] max-w-[15rem] border-2 mt-3 rounded-md' src=${blobUrl}>`
            })
            elem.nextElementSibling.innerHTML = output
        }
    </script>
@endpush
