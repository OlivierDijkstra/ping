<?php

namespace App\Console\Commands;

use App\Jobs\PerformPing;
use App\Models\Domain;
use Illuminate\Console\Command;

class RecordPings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ping';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pings all available domains for their current status';

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
     * @return int
     */
    public function handle()
    {
        $domains = Domain::all();

        foreach ($domains as $domain) {
            PerformPing::dispatch($domain);
        }

        return 0;
    }
}
