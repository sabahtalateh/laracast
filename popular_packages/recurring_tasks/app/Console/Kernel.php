<?php

namespace App\Console;

use App\Console\Commands\Inspire;
use App\Console\Commands\LogThat;
use Faker\Factory;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Inspire::class,
        LogThat::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('inspire')
            ->hourly();


        $faker = Factory::create();
        $word = $faker->word;
        $schedule->command("app:log_word {$word}")
            ->everyMinute();

        $schedule->call(function () {
            Log::info('It works from scheduler');
        })->everyMinute();
    }
}
