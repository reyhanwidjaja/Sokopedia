<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $product=Product::paginate(3);
        return view('home',['product'=>$product]);
    }

    public function searchProduct(Request $request) {
        $product = Product::where('product_name', 'like', "%".$request->search."%")->paginate(3);

        return view('home', ['product' => $product]);
    }
}