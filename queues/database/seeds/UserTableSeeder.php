<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::unguard();

        User::create([
            'name' => 'user',
            'email' => 'mail@mail.com',
            'password' => 'password'
        ]);

        User::reguard();
    }
}
