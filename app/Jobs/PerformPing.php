<?php

namespace App\Jobs;

use App\Models\Domain;
use GuzzleHttp\Client;
use GuzzleHttp\TransferStats;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PerformPing implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $domain;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Domain $domain)
    {
        $this->domain = $domain;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $client = new Client();

        $output = null;

        $client->request('GET', $this->domain->host, [
            'on_stats' => function (TransferStats $stats) {
                $this->domain->pings()->create([
                    'latency' => $stats->getTransferTime(),
                    'status' => $stats->hasResponse() ? $stats->getResponse()->getStatusCode() : 500,
                ]);

                $output = $this->domain->pings()->latest('created_at')->first();
            }
        ]);

        return $output;
    }
}
