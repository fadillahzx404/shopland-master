<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banners;
use App\Http\Requests\StoreBannersRequest;
use App\Http\Requests\UpdateBannersRequest;
use Illuminate\Support\Facades\Storage;

class BannersAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banners::all();
        return view('admin.banners.index', ['banners' => $banners]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBannersRequest $request)
    {
        $data = $request->all();

        $data['banner_image'] = $request->file('banner_image')->store('/images/banners', 'public');

        Banners::create($data);

        return redirect()
            ->route('banners.index')
            ->with('Success', 'New Banner has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Banners $banners)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banners $banners, $id)
    {
        $ban = Banners::findOrFail($id);
        return view('admin.banners.edit', ['ban' => $ban]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBannersRequest $request, Banners $banners, $id)
    {
        $data = $request->all();

        $item = Banners::findOrFail($id);

        if ($request->hasFile('banner_image')) {
            Storage::disk('public')->delete($item->banner_image);
            $data['banner_image'] = $request->file('banner_image')->store('/images/banners', 'public');
        }

        $item->update($data);

        return redirect()
            ->route('banners.index')
            ->with('Success', 'The Banner has been update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banners $banners, $id)
    {
        $item = Banners::findOrFail($id);

        Storage::disk('public')->delete($item->banner_image);

        $item->delete();

        return redirect()
            ->route('banners.index')
            ->with(['Success' => 'The Banner has been delete!']);
    }
}
