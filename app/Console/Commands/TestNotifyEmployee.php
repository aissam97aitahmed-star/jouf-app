<?php

namespace App\Console\Commands;

use App\Events\NotifyEmployee;
use Illuminate\Console\Command;

class TestNotifyEmployee extends Command
{
   /**
     * The name and signature of the console command.
     */
    protected $signature = 'test:notify-employee';

    /**
     * The console command description.
     */
    protected $description = 'Dispatch NotifyEmployee event for testing broadcasting';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        broadcast(new NotifyEmployee('you have new notify'));

        $this->info('NotifyEmployee event dispatched successfully!');
    }
}
