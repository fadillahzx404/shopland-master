<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryProducts;
use Illuminate\Http\Request;

class CategoryAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = CategoryProducts::all();
        return view('admin.categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        CategoryProducts::create($data);

        return redirect()
            ->route('category.index')
            ->with('Success', 'New Category Product has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoryProducts $categoryProducts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryProducts $categoryProducts, $id)
    {
        $cat = CategoryProducts::findOrFail($id);
        return view('admin.categories.edit', ['cat' => $cat]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategoryProducts $categoryProducts, $id)
    {
        $data = $request->all();

        $item = CategoryProducts::findOrFail($id);

        $item->update($data);

        return redirect()
            ->route('category.index')
            ->with('Success', 'The Category Product has been update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryProducts $categoryProducts, $id)
    {
        $item = CategoryProducts::findOrFail($id);
        $item->delete();
        return redirect()
            ->route('category.index')
            ->with('Success', 'The Category Product has been delete');
    }
}
