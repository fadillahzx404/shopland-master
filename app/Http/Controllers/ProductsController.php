<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Products::with('images')->get();

        $pro_lat = Products::with('images')
            ->latest()
            ->take(5)
            ->get();
        return view('products.index', ['products' => $products, 'pro_lat' => $pro_lat]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function detail($id)
    {
        $pro = Products::with('images')->findOrFail($id);
        return view('products.detail_product', ['pro' => $pro]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
