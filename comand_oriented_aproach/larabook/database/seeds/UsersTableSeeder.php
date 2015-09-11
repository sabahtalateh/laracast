<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(0, 50) as $index) {
            \App\Users\User::create([
                'username' => $faker->userName . $index,
                'email' => $faker->email,
                'password' => 'secret'
            ]);
        }

    }
}
