<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function insertTransaction(Request $request)
    {
        $userid = Auth::user()->id;
        $decoded = json_decode($request->product);

        $transaction = new Transaction();
        $transaction->users_id = $userid;
        $transaction->method = $request->method;
        $transaction->card_number = $request->cardNumber;
        $transaction->total_price = $request->totalPrice;

        $transaction->save();

        $latestId = $transaction->id;


        for ($i = 0; $i < count($decoded); $i++) {
            $transactionDetail = new TransactionDetail();

            $transactionDetail->furniture_id = $decoded[$i]->id;
            $transactionDetail->transaction_id = $latestId;
            $transactionDetail->qty = $decoded[$i]->qty;
            $transactionDetail->price = $decoded[$i]->totalPrice;

            $transactionDetail->save();
            echo $i;
        }

        return redirect()->back();
    }
}
