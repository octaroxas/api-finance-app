<?php

namespace App\Http\Controllers\API\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SessionController
{
    public function store(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!auth()->attempt($credentials))
            return response()->noContent(Response::HTTP_UNAUTHORIZED);

        $user = User::find(auth()->user()->id);
        $account = $user->account;
        $token = $user->createToken('access_token')->plainTextToken;

        return response()->json(compact('user', 'account', 'token'));
    }

    public function destory(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->noContent(Response::HTTP_OK);
    }
}
