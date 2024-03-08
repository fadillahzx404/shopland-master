@extends('layouts.app')
@section('title')
    Code Voucher
@endsection
@section('page-content')
    <div class="container px-12 lg:mt-8 max-lg:px-10 max-sm:px-5 mx-auto min-h-screen">
        <div class="flash-data" data-flash="{!! \Session::get('Success') !!}"></div>
        <p class="text-3xl font-semibold mt-8 mb-6">All Code Vocuhers</p>
        <div class="relative overflow-x-auto shadow-lg borde bg-white border-gray-200 sm:rounded-lg p-5">
            <div class="title-table grid">
                <div class="flex justify-between">
                    <div class="grid place-content-center">
                        <p class="text-lg font-bold">Code Voucher</p>
                        <p class="text-sm font-light text-gray-400">Code Voucher on here, you can add new category, edit or
                            delete.
                        </p>
                    </div>
                    <a href="{{ route('code-vouchers.create') }}"
                        class="btn btn-sm btn-accent text-white transition duration-300 hover:scale-90 my-3 hover:text-black hover:bg-green-200">Add
                        code vocuher</a>
                </div>

                <hr class="mb-3 mt-2 border-gray-400" />

            </div>
            <div class="pb-4  ">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" id="searchInput"
                        class="block p-2 pl-10 text-sm text-gray-900 border  border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-accent    focus:border-accent     "
                        placeholder="Search for items">
                </div>
            </div>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 datatable display" id="datatable">
                <thead class="text-xs text-gray-700 uppercase bg-white dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">
                            No
                        </th>
                        <th scope="col" class="p-4 text-center">
                            Code
                        </th>
                        <th scope="col" class="p-4 ">
                            Discount Price
                        </th>
                        <th scope="col" class="p-4 text-justify">
                            Desc
                        </th>
                        <th scope="col" class="p-4 text-end ">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($code_vouchers as $cv)
                        <tr class="border-2 ">
                            <td class="w-4 p-4 text-center">
                                {{ $loop->iteration }}
                            </td>
                            <th scope="row" class="py-4 text-center">

                                {{ $cv->code }}
                            </th>
                            <td class="p-4">
                                Rp. {{ number_format($cv->discount) }}
                            </td>
                            <td class="py-4">
                                {{ $cv->desc }}
                            </td>

                            <td class="p-4 text-end">

                                <div class="flex gap-2 justify-end">
                                    <a href="{{ route('code-vouchers.edit', $cv->id) }}"
                                        class="bg-orange-200 hover:bg-orange-400 p-3 rounded-md hover:text-white tooltip"
                                        data-tip="Edit"><span><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('code-vouchers.destroy', $cv->id) }}"
                                        class="bg-red-200 hover:bg-red-500 p-3 rounded-md hover:text-white tooltip"
                                        data-tip="Delete" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"><i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>

                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
