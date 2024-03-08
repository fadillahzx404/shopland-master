<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CodeVouchers;

class CodeVouchersController extends Controller
{
    public function index()
    {
        $code_vouchers = CodeVouchers::all();
        return view('code_vouchers.index', ['code_vouchers' => $code_vouchers]);
    }
}
