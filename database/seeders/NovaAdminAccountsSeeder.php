<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class NovaAdminAccountsSeeder extends Seeder
{
    public function run(): void
    {
        $this->adminAccount();
    }

    protected function adminAccount(): void
    {
        /** @var User $user */
        $user = User::query()->firstOrNew(['email' => 'menno@made-foryou.nl'], [
            'name' => 'Menno Tempelaar',
            'email' => 'menno@made-foryou.nl',
            'password' => '$2a$12$ywtkX7hD.e2pTN4RaemkZOgX8Dk79Q6.r2th2QXBWKZMy6s5AuCha',
        ]);

        if (! $user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }

        /** @var User $user */
        $user = User::query()->firstOrNew(['email' => 'muriel@made-foryou.nl'], [
            'name' => 'Muriël Baars',
            'email' => 'muriel@made-foryou.nl',
            'password' => '$2a$12$DWi5EAm8q.jCIFzw0hOne.nX8sDU4CDNXvedzAyshsMgljtNCp0TK',
        ]);

        if (! $user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }
    }
}
