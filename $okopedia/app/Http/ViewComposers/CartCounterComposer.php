<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Cart;
use DB;

class CartCounterComposer
{
    public $cartCount;
    
    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct()
    {
        
        $user_id = auth()->user();
        $this->cartCount = \DB::table('carts')->where('user_id', '<=', $user_id->id)->count();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('cartCount', $this->cartCount);
    }
}