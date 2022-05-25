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

        return response()->json(WalletResource::make($wallet), Response::HTTP_CREATED);
    }

    public function show(Wallet $wallet)
    {
        return response()->json(WalletResource::make($wallet), Response::HTTP_OK);
    }

    public function update(Wallet $wallet, Request $request)
    {
        $wallet = $wallet->update($request->all());
        return \response()->json(WalletResource::make($wallet), Response::HTTP_OK);
    }

    public function destroy(Wallet $wallet)
    {
        $wallet->delete();
        return \response()->noContent(Response::HTTP_OK);
    }
}
