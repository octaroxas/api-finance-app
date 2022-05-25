<?php

namespace App\Actions\User;

use App\Models\User;

class CreateUser
{
    public function handle($name, $email, $password)
    {
        $user = User::create([
            'email' => $email,
            'password' => bcrypt($password)
        ]);

        $user->account()->create([
            'name' => $name
        ]);

        return $user;
    }
}
