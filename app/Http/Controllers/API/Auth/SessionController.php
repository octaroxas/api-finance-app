<?php

namespace App\Http\Controllers\API\Auth;

use Illuminate\Http\Request;

class SessionController
{
    public function store(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!auth()->attempt($credentials))
            return response()->noContent(401);

        $user = auth()->user();

        $token = $user->createToken('access_token')->plainTextToken;

        return response()->json(compact('user', 'token'));
    }

    public function destory()
    {
        // TODO: implemente o método destory
    }
}
