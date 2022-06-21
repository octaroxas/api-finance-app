<?php

namespace App\Actions\User;

use App\Models\User;
use Laravolt\Avatar\Facade as Avatar;

class CreateUser
{
    public function handle($name, $email, $password)
    {
        $user = User::create([
            'email' => $email,
            'password' => bcrypt($password)
        ]);

        $initials = $this->initials($name);
        $path = 'avatars/' . $initials . '.png';
        Avatar::create($name)->setDimension(256)->setFontSize(128)->save(storage_path('app/public/' . $path), 100);

        $user->account()->create(['name' => $name, 'avatar' => $path]);

        return $user;
    }
    private function initials($name)
    {
        $names = explode(' ', $name);
        $name = $names[0] . ' ' . $names[count($names) - 1];
        return preg_replace('/(?<=[A-Z\wÀ-ú])./', '', $name);
    }
}
