@extends('layouts.root')
@section('title')
    Code Vouchers
@endsection
@section('content')
    <div class="container px-20 lg:mt-8 max-lg:px-10 max-sm:px-5 mx-auto grid gap-12">
        <div class="grid max-sm:mt-10">
            <p class="text-xl font-bold">All Code Vouchers</p>
            <p class="text-sm text-gray-400">Copy Code Vouchers and paste on your cart.</p>
        </div>
        <div class="flex flex-row max-sm:grid gap-3">
            @foreach ($code_vouchers as $cv)
                <div class="stats shadow-xl border rounded-md flex overflow-y-auto max-h-36 ">
                    <div class="grid w-96 ">
                        <div class="stat grid">
                            <div class="stat-title">Code</div>
                            <div class="stat-value" id="copy_{{ $cv->id }}">{{ $cv->code }}</div>
                            <div class="stat-desc text-xl">Rp. {{ number_format($cv->discount) }}</div>
                        </div>
                        <div class=" pl-5 pb-3 ">
                            <p class="text-justify ">{{ $cv->desc }}</p>
                        </div>

                    </div>
                    <div class="border-none relative">

                        <button
                            class="btn btn-ghost btn-clipboard bg-white mx-2 mt-5 rounded-full text-accent hover:text-gray-900 transition dura hover:scale-90"
                            data-clipboard-target="#copy_{{ $cv->id }}" id="copy_{{ $cv->id }}"><svg
                                class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 18 20">
                                <path
                                    d="M5 9V4.13a2.96 2.96 0 0 0-1.293.749L.879 7.707A2.96 2.96 0 0 0 .13 9H5Zm11.066-9H9.829a2.98 2.98 0 0 0-2.122.879L7 1.584A.987.987 0 0 0 6.766 2h4.3A3.972 3.972 0 0 1 15 6v10h1.066A1.97 1.97 0 0 0 18 14V2a1.97 1.97 0 0 0-1.934-2Z" />
                                <path
                                    d="M11.066 4H7v5a2 2 0 0 1-2 2H0v7a1.969 1.969 0 0 0 1.933 2h9.133A1.97 1.97 0 0 0 13 18V6a1.97 1.97 0 0 0-1.934-2Z" />
                            </svg></button>
                        <div class="tooltip tooltip-open tooltip-bottom absolute top-16 left-8" style="display:none"
                            id="copy_{{ $cv->id }}" data-tip="copied!">
                        </div>


                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        $(".btn-clipboard[id]").on("click", function() {

            const btn_id = $(this).attr('id');

            $('.tooltip[id=' + btn_id + ']').css({
                "display": "block",
                "transition-timing-function": "ease-in-out"
            });

            setTimeout(() => {
                $('.tooltip[id=' + btn_id + ']').css({
                    "display": "none",
                    "transition-timing-function": "ease-in-out"
                });
            }, 2500);


        });
    </script>
@endpush
