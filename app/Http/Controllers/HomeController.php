<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banners;
use App\Models\Products;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $banners = Banners::all();
        // $products = Products::with('images')->get();

        if ($request->filled('search_product')) {
            $products = Products::search($request->search_product)
                ->query(function ($query) {
                    $query->join('category_products', 'products.category_id', 'category_products.id')->select(['products.*', 'category_products.category_name as category']);
                })
                ->get();
            $products->load('images');
        } elseif ($request->input('newest')) {
            $products = Products::with('images')
                ->latest()
                ->get();
        } else {
            $products = Products::with('images')->get();
        }

        return view('home', ['banners' => $banners, 'products' => $products]);
    }
}
