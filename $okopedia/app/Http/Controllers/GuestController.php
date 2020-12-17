<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;

class GuestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index2()
    {
        $product=Product::paginate(3);
        return view('guestHome',['product'=>$product]);
    }

    public function searchProduct(Request $request) {
        $product = Product::where('product_name', 'like', "%".$request->search."%")->paginate(3);

        return view('guestHome', ['product' => $product]);
    }
}
