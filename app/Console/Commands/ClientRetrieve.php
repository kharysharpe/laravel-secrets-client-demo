<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClientRetrieve extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'client:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieve data in Secrets';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $key = $this->ask('Key to retrieve');

        $value = secrets('config', $key);

        $this->line('Retrieved:');
        dump($value);

        return Command::SUCCESS;
    }
}
