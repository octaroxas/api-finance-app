<?php

namespace App\Http\Controllers\API\Auth;

use Exception;
use App\Actions\User\CreateUser;
use App\Http\Requests\Auth\RegisterRequest;
use Symfony\Component\HttpFoundation\Response;

class RegisteredUserController
{
    public function store(RegisterRequest $request, CreateUser $action)
    {
        try {
            $user = $action->handle($request->name, $request->email, $request->password);
            $account = $user->account;
            $token = $user->createToken('access_token')->plainTextToken;
            return response()->json(compact('user', 'account', 'token'), Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], Response::HTTP_UNAUTHORIZED);
        }
    }
}
