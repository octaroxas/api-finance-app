<?php

namespace App\Actions\Transactions;

use App\Models\Transaction;
use Illuminate\Http\Request;

class CreateTransaction
{
    public function handle(Request $request): Transaction
    {
        $transaction = Transaction::create($request->all());
        return $transaction;
    }
}
