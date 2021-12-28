<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function insertTransaction(Request $request)
    {
        $request->validate([
            'cardNumber' => 'required|integer|digits:16',
            'method' => 'required',
            
        ]);
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

    public function view()
    {
        $transactions = [];
        $email = Auth::user()->email;
        if (str_ends_with($email, '@jh.com')) {
            # code...
            $transactions = Transaction::all();
        }else{
            $transactions = Transaction::where('users_id', '=', Auth::user()->id)->get();;
        }
        return view('admin/transaction-history', [
            'transactions' => $transactions
        ]);
    }

    public function trDetail($id){
        $selectedDetail = TransactionDetail::where('transaction_id', '=', $id)
            ->get();
        $decoded = json_decode($selectedDetail);
        $sum = 0;
        foreach ($decoded as $key => $value) {
            # code...
            $sum += $value->price;
        }
        return view('admin/transaction-detail', [
            'details' => $selectedDetail,
            'sum' => $sum,
            // 'transaction' => Transaction::where('id', '=', $selectedDetail[0]->transaction_id)->get()
        ]);
    }
}
