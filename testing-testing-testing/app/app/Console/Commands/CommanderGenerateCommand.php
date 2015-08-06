<?php

namespace App\Console\Commands;

use Acme\Console\CommandGenerator;
use Acme\Console\CommandInputParser;
use Illuminate\Console\Command;

class CommanderGenerateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'commander:generate
                            {path : Path to the class to generate}
                            {--properties= : List of properties to build}
                            {--base=./app : The base directory to begin from}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate command.';
    /**
     * @var CommandInputParser
     */
    private $parser;
    /**
     * @var CommandGenerator
     */
    private $generator;

    /**
     * Create a new command instance.
     *
     * @param CommandInputParser $parser
     * @param CommandGenerator $generator
     */
    public function __construct(CommandInputParser $parser, CommandGenerator $generator)
    {
        parent::__construct();
        $this->parser = $parser;
        $this->generator = $generator;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Parse the input of artisan command
        // into a usable format
        $input = $this->parser->parse(
            $this->argument('path'),
            $this->option('properties')
        );

        // Create a file by a boilerplate
        $this->generator->make(
            $input,
            app_path('Console/Commands/template/command.template'),
            $this->getClassPath()
        );

        $this->info('All done!');
    }

    private function getClassPath()
    {
        return $this->option('base') . '/' . $this->argument('path') . '.php';
    }
}
