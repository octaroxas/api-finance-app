<?php

namespace App\Http\Controllers\API\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController
{
    public function store(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!auth()->attempt($credentials))
            return response()->noContent(401);

        $user = User::find(auth()->user()->id);
        $token = $user->createToken('access_token')->plainTextToken;

        return response()->json(compact('user', 'token'));
    }

    public function destory(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->noContent(200);
    }
}
