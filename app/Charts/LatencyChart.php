<?php

declare(strict_types=1);

namespace App\Charts;

use App\Models\Domain;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class LatencyChart extends BaseChart
{
    public ?array $middlewares = ['auth:sanctum'];

    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $pings = Domain::find($request->query('id'))
            ->pings()
            ->latest()
            ->limit(60);
 
        return Chartisan::build()
            ->labels($pings->pluck('created_at')->toArray())
            ->dataset('Latency (in seconds)', $pings->pluck('latency')->toArray());
    }
}
