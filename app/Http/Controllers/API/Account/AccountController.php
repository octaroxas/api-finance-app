<?php

namespace App\Http\Controllers\API\Account;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class AccountController
{
    public function store(Request $request)
    {
        try {
            $data = array_merge($request->only('name'), ['user_id' => $request->user()->id]);
            $account = DB::transaction(fn() => Account::firstOrCreate($data));
            return response()->json(compact('account'), Response::HTTP_CREATED);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage(),Response::HTTP_BAD_GATEWAY);
        }
    }

    public function show(Account $account)
    {
        return response()->json(compact('account'), Response::HTTP_OK);
    }

    public function update(Request $request, Account $account)
    {
        $account->update($request->all());
        $account->save();
        return response()->json(compact('account'), Response::HTTP_OK);
    }
}
