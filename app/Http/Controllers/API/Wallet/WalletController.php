<?php

namespace App\Http\Controllers\API\Wallet;

use App\Http\Resources\WalletResource;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WalletController
{
    public function index()
    {
        $account = \request()->user()->account;
        $wallets = $account->wallets;
        return response()->json(WalletResource::collection($wallets));
    }

    public function store(Request $request)
    {
        $account = \request()->user()->account;
        $wallet = Wallet::create(array_merge(
            $request->only('name'),
            ['account_id' => $account->id]
        ));
        return response()->json(compact('wallet'), Response::HTTP_CREATED);
    }

    public function show(Wallet $wallet)
    {
        // TODO: implemente o método show
    }

    public function update(Wallet $wallet, Request $request)
    {
        // TODO: implemente o método update
    }

    public function destroy(Wallet $wallet)
    {
        // TODO: implemente o método destroy
    }
}
