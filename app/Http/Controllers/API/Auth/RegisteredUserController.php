<?php

namespace App\Http\Controllers\API\Auth;

use App\Actions\User\CreateUser;
use App\Http\Requests\Auth\RegisterRequest;
use Exception;

class RegisteredUserController
{
    public function store(RegisterRequest $request, CreateUser $action)
    {
        try {
            $user = $action->handle($request->name, $request->email, $request->password);
            $account = $user->account;
            $token = $user->createToken('access_token')->plainTextToken;
            return response()->json(compact('user', 'account', 'token'));
        } catch (Exception $ex) {
            return response()->json([
                'message' => $ex->getMessage(),
            ], 400);
        }
    }
}
