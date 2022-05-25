<?php

namespace App\Http\Controllers\API\Auth;

use App\Models\User;
use Illuminate\Http\Request;

class RegisteredUserController
{
    public function store(Request $request)
    {
        $user = User::create($request->all());

        $user->account()->create($request->all());

        $token = $user->createToken('access_token')->plainTextToken;

        return response()->json(compact('user', 'token'));
    }
}
