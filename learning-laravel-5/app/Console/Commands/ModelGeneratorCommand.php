<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ModelGeneratorCommand extends Command
{

    /**
     * @var ModelGenerator
     */
    protected $generator;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'g:model
                            {name : Имя модели}
                            {--path=models : Путь}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Создать модель.';

    /**
     * Create a new command instance.
     *
     * @param ModelGenerator $generator
     */
    public function __construct(ModelGenerator $generator)
    {
        parent::__construct();

        $this->generator = $generator;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $model = $this->argument('name');
        $path = $this->option('path');

        $this->generator->make($model, $path);

        $this->info("{$path}/{$model}.php was created");
    }

}
