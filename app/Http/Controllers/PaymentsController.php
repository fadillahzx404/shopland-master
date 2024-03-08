<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->has('code')) {
            $code = $data['code'];
        } else {
            $code = null;
        }

        $paymentId = Str::random(10);

        Payments::create([
            'payment_id' => "#$paymentId",
            'users_id' => $data['users_id'],
            'products_id' => $data['products_id'][$key],
            'quantity' => $data['quantity'][$key],
            'subtotal' => $data['subtotal'],
            'status_payment' => 'Wait',
            'total_payment' => $data['total_payment'],
            'code_vouchers_id' => $code,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Payments $payments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payments $payments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payments $payments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payments $payments)
    {
        //
    }
}
