<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\Users;
use App\Models\CodeVouchers;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $id)
    {
        $code_voucher = CodeVouchers::where('code', $request->input('code_voucher'))->first();

        $carts = Carts::with('products')
            ->where('users_id', $id)
            ->get();
        return view('carts.index', ['carts' => $carts, 'code' => $code_voucher]);
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

        $product_id = $data['products_id'];
        $users_id = $data['users_id'];
        $quantity = $data['quantity'];

        $pro = Carts::with('products')
            ->where('products_id', $product_id)
            ->where('users_id', $users_id)
            ->first();

        if ($pro !== null) {
            Carts::where('products_id', $product_id)
                ->where('users_id', $users_id)
                ->update(['quantity' => ($pro['quantity'] += $quantity)]);

            $name = $pro->products->name_product;

            return redirect()
                ->route('detail_product', $data['products_id'])
                ->with('Success', "The quantity of $name has been update on cart");
        } else {
            Carts::create($data);

            return redirect()
                ->route('detail_product', $data['products_id'])
                ->with('Success', 'The Product has been added on cart');
        }
    }

    public function update_quantity(Request $request, Carts $carts, $id)
    {
        $data = $request->all();

        Carts::findOrFail($id)->update([
            'quantity' => $data['quantity'],
        ]);

        $name = $data['name_product'];

        return redirect()
            ->route('carts', $data['users_id'])
            ->with('Success', "The quantity of $name has been update on cart");
    }

    public function destroy_cart_item(Request $request, Carts $carts, $id)
    {
        $item = Carts::findOrFail($id);
        $user = $request->user();

        $item->delete();

        return redirect()
            ->route('carts', $user->id)
            ->with('Success', 'The Product has been delete');
    }
}
