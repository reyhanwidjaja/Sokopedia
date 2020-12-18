<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;

class DetailController extends Controller
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
    public function index3($id)
    {
        $product=Product::find($id);
        return view('detailProduct',['product'=>$product]);
    }

    public function addCartPage($id){
        $product=Product::find($id);
        return view('addCart',['product'=>$product]);
    }

}
