// app/commands/UserGeneratorCommand.php

<?php


//namespace App\Console\Commands;

use Illuminate\Console\Command;



//use Illuminate\Console\Command;

class first_command extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'command:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Generate a new user";

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $this->line('this is your fisrt command .');
    }

}