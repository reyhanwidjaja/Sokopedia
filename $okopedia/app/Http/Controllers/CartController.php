<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product; 

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
        return view('cart');
    }

    public function addCart($id)
    {
        $product=Product::find($id);
        if(!$product){
            abort(404);
        }

        $cart=session()->get('cart');

        //kalo empty dia jadiin ini produk pertama
        if(!$cart){
            $cart=[
                    $id => [
                        "name" => $product->product_name,
                        "quantity" => 1,
                        "price" => $product->product_price,
                        "photo" => $product->product_photo
                    ]
                ];
                session()->put('cart',$cart);
                return redirect('cart');
        }

        //kalo ga empty check dia ada ga produknya yg mau dimasukin dicart
        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
            session()->put('cart',$cart);
            return redirect('cart');
        }

        //kalo pas dicek gada di cart dia masukkin ke cart
        $cart[$id] = [
            "name" => $product->product_name,
            "quantity" => 1,
            "price" => $product->product_price,
            "photo" => $product->product_photo
        ];
        session()->put('cart',$cart);
        return redirect('cart');
    }

    //update cart
    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    //delete cart
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}
