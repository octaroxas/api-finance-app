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
        $name = implode(' ',array_combine([1, 2], $names));
        return preg_replace('/(?<=[A-Z\wÀ-ú])./', '', $name);
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'email' => 'user@finance.ianbrito.com.br',
            'password' => bcrypt('password')
        ]);

        $account = $user->account()->create(['name' => 'Vânia Maria Marques de Brito de Azevedo']);
        $initials = $this->initials($account->name);
        $path = storage_path('app/public/avatars/') . $initials . '.png';

        Avatar::create($account->name)->setDimension(256)->setFontSize(128)->save($path, 100);

        $wallet = Wallet::create([
            'name' => 'Carteira Padrão',
            'account_id' => $account->id
        ]);

        Transaction::factory(100)->create([
            'wallet_id' => $wallet->id
        ]);
    }
}
