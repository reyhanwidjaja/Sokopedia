<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Product; 
use App\Cart;

class CartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

     /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Cart
     */

    public function cart(){
        $user = auth()->user();

        $carts = Cart::with('products')->where('user_id', '=', $user->id)->get();

        return view('cart', ['carts' => $carts]);
    }

    public function addCart($id,Request $request)
    {
        $product=Product::find($id);
        $user = auth()->user();

        $cartItem = Cart::where(['user_id' => $user->id, 'product_id' => $product->id])->get();

        if($cartItem != null) {
            Cart::where(['user_id' => $user->id, 'product_id' => $product->id])->update(['quantity' => $request->qty]);
        }

        Cart::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'quantity' => $request->qty,
        ]);

        return redirect('/cart');
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        Cart::where(['user_id' => $user->id, 'product_id' => $request->id])->update(['quantity' => $request->qty]);
        
        return redirect('/cart');
    }

    public function remove(Request $request)
    {
        $user = auth()->user();
        Cart::where(['user_id' => $user->id, 'product_id' => $request->id])->delete();

        return redirect('/cart');
    }
}
