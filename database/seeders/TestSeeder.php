<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Wallet;
use App\Models\Transaction;
use Laravolt\Avatar\Facade as Avatar;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TestSeeder extends Seeder
{
    private function initials($name)
    {
        $names = explode(' ', $name);
        $name = $names[0] . ' ' . $names[count($names) - 1];
        return preg_replace('/(?<=[A-Z\wÀ-ú])./', '', $name);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = 'João Godinho';
        $user = User::create([
            'email' => 'user@finance.ianbrito.com.br',
            'password' => bcrypt('password')
        ]);

        $initials = $this->initials($name);
        $path = 'avatars/' . $initials . '.png';
        $account = $user->account()->create(['name' => $name, 'avatar' => $path]);
        Avatar::create($account->name)->setDimension(256)->setFontSize(128)->save(storage_path('app/public/' . $path), 100);

        $wallet = Wallet::create([
            'name' => 'Carteira Padrão',
            'account_id' => $account->id
        ]);

        Transaction::factory(100)->create([
            'wallet_id' => $wallet->id
        ]);
    }
}
