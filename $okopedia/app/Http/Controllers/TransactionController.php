<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HeaderTransaction;
use App\DetailTransaction;
use App\Cart;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkoutCart() {
        $user = auth()->user();
        $cartItem = Cart::where('user_id', $user->id)->get();

        $transaction = HeaderTransaction::create([
                            'users_id' => $user->id,
                        ]);

        $transactionDetail = [];
        $detail;

        foreach($cartItem as $item) {
            $detail = [
                'transaction_id' => $transaction->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
            ];
            array_push($transactionDetail, $detail);
        }
        
        DetailTransaction::insert($transactionDetail);

        Cart::where('user_id', $user->id)->delete();

        return redirect('/history');
    }

    public function TransactionHistory() {
        $user = auth()->user();

        $transactions = HeaderTransaction::where('users_id', $user->id)->paginate(5);

        return view('History', ['transactions' => $transactions]);
    }

    public function TransactionDetail($id) {
        $user = auth()->user();
        $transactionDetail = DetailTransaction::with('products')->where('transaction_id', '=', $id)->get();

        return view('TransactionDetail', ['Details' => $transactionDetail]);
    }
}
