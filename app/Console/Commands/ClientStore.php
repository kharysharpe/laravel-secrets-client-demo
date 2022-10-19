<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClientStore extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'client:set';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Store data in Secrets Server';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $key = $this->ask('Key');
        $value = $this->ask('Value');

        $result = secrets('config', $key, $value);

        if ($result) {
            $this->info('Value stored.');
        }

        return Command::SUCCESS;
    }
}
