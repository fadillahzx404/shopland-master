<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\CodeVouchersRequest;
use App\Models\CodeVouchers;
use Illuminate\Http\Request;

class CodeVoucherAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $code_vouchers = CodeVouchers::all();
        return view('admin.code_vouchers.index', ['code_vouchers' => $code_vouchers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.code_vouchers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CodeVouchersRequest $request)
    {
        $data = $request->all();

        CodeVouchers::create($data);

        return redirect()
            ->route('code-vouchers.index')
            ->with('Success', 'New Code Voucher has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(CodeVouchers $codeVouchers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CodeVouchers $codeVouchers, $id)
    {
        $voucher = CodeVouchers::findOrFail($id);
        return view('admin.code_vouchers.edit', ['voucher' => $voucher]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CodeVouchers $codeVouchers, $id)
    {
        $data = $request->all();

        $item = CodeVouchers::findOrFail($id);

        $item->update($data);

        return redirect()
            ->route('code-vouchers.index')
            ->with('Success', 'The Code Voucher has been update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CodeVouchers $codeVouchers, $id)
    {
        $item = CodeVouchers::findOrFail($id);

        $item->delete();

        return redirect()
            ->route('code-vouchers.index')
            ->with('Success', 'The Code Voucher has been delete');
    }
}
