<?php

namespace App\Http\Controllers\API\Transaction;

use App\Actions\Transactions\CreateTransaction;
use App\Http\Controllers\Controller;
use App\Http\Resources\TransactionResource;
use App\Http\Resources\WalletWithTransactionsResource;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransactionController extends Controller
{
    public function index()
    {
        $account = \request()->user()->account;
        $wallets = $account->wallets;
        return response()->json(WalletWithTransactionsResource::collection($wallets), Response::HTTP_OK);
    }

    public function store(Request $request, CreateTransaction $action)
    {
        $transaction = $action->handle($request);
        return response()->json(compact('transaction'), Response::HTTP_CREATED);
    }

    public function show(Transaction $transaction)
    {
        return response()->json(TransactionResource::make($transaction), Response::HTTP_OK);
    }

    public function update(Transaction $transaction, Request $request)
    {
        $transaction->update($request->all());
        return response()->json(TransactionResource::make($transaction), Response::HTTP_OK);
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return response()->noContent(Response::HTTP_OK);
    }
}
