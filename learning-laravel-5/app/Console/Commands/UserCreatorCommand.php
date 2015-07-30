<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class UserCreatorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Делает пользователя бом-бом.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $username = $this->ask('username');
        $password = $this->ask('password');
        $email = $this->ask('What email');

        $user = new User();
        $user->user_name = $username;
        $user->password = bcrypt($password);
        $user->email = $email;
        $user->save();

        $this->info('User Created.');
    }
}
