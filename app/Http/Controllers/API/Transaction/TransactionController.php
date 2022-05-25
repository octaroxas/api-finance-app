<?php

namespace App\Http\Controllers\API\Transaction;

use App\Actions\Transactions\CreateTransaction;
use App\Http\Controllers\Controller;
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
        return \response()->json(WalletWithTransactionsResource::collection($wallets), Response::HTTP_OK);
    }

    public function store(Request $request, CreateTransaction $action)
    {
        $transaction = $action->handle($request);
        return response()->json(compact('transaction'), Response::HTTP_CREATED);
    }

    public function show(Transaction $transaction)
    {
        // TODO: implemente o método show
    }

    public function update(Transaction $transaction, Request $request)
    {
        // TODO: implemente o método update
    }

    public function destroy(Transaction $transaction)
    {
        // TODO: implemente o método destroy
    }
}
