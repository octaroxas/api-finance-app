<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'email' => 'ian@ianbrito.com.br',
            'password' => bcrypt('password')
        ]);

        $account = $user->account()->create(['name' => 'Ian Azevedo']);

        $wallet = Wallet::create([
            'name' => 'Carteira Padrão',
            'account_id' => $account->id
        ]);

        Transaction::factory(100)->create([
            'wallet_id' => $wallet->id
        ]);
    }
}
