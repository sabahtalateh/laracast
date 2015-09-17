<?php

use App\Statuses\Status;
use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $userIds = \App\Users\User::lists('id')->toArray();

        foreach (range(0, 500) as $index) {
            Status::create([
                'user_id' => $faker->randomElement($userIds),
                'body' => $faker->sentence(),
                'created_at' => $faker->dateTime()
            ]);
        }

    }
}
