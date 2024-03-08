<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\ImageProducts;
use App\Models\CategoryProducts;
use App\Models\Carts;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class ProductsAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::with('images')->get();

        return view('admin.products.index', ['products' => $products]);
    }
    public function detail($id)
    {
        $products = Products::findOrFail($id);
        return view('admin.products.detail_product');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = CategoryProducts::all();
        return view('admin.products.create', ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $product = new Products();
        $product = Products::create([
            'name_product' => $data['name_product'],
            'desc_product' => $data['desc_product'],
            'price' => $data['price'],
            'category_id' => $data['category_id'],
        ]);

        foreach ($request->file('image_product') as $imagefile) {
            $image = new ImageProducts();
            $path = $imagefile->store('/images/image_products', 'public');
            $image->image_product = $path;
            $image->product_id = $product->id;
            $image->save();
        }

        return redirect()
            ->route('products.index')
            ->with('Success', 'The New Product has been Add');
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $products, $id)
    {
        $pro = Products::findOrFail($id);
        $category = CategoryProducts::all();

        // dd($category);
        return view('admin.products.edit', ['pro' => $pro, 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $products, $id)
    {
        $data = $request->all();

        $product = Products::with('images')
            ->findOrFail($id)
            ->update([
                'name_product' => $data['name_product'],
                'desc_product' => $data['desc_product'],
                'price' => $data['price'],
                'category_id' => $data['category_id'],
            ]);

        $item = Products::with('images')->findOrFail($id);
        if ($request->hasFile('image_product')) {
            foreach ($item->images as $img) {
                Storage::disk('public')->delete($img->image_product);
                $img->delete();
            }
            foreach ($request->file('image_product') as $imagefile) {
                $image = new ImageProducts();
                $path = $imagefile->store('/images/image_products', 'public');
                $image->image_product = $path;
                $image->product_id = $item->id;
                $image->save();
            }
        }

        return redirect()
            ->route('products.index')
            ->with('Success', 'The Product has been update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $products, Carts $carts, $id)
    {
        $item = Products::with('images')->findOrFail($id);
        foreach ($item->images as $img) {
            Storage::disk('public')->delete($img->image_product);
            $img->delete();
        }
        $item->delete();

        $carts = Carts::where('products_id', $id)->delete();

        return redirect()
            ->route('products.index')
            ->with(['Success' => 'The Product has been delete!']);
    }
}
