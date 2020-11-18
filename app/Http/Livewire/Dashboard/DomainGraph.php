<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Domain;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Livewire\Component;

class DomainGraph extends Component
{
    public $domain;

    public function mount($id)
    {
        $this->domain = Domain::find($id);
    }

    public function render()
    {
        $graph = (new LineChartModel())
            ->setTitle('Latency')
            ->setAnimated(false);

        $this->domain->pings()->orderBy('created_at', 'desc')->take(60)->get()->each(function ($ping) use ($graph) {
            return $graph->addPoint($ping->created_at->format('M d h:i'), $ping->latency);
        });

        return view('livewire.dashboard.domain-graph')
            ->with([
                'graph' => $graph
            ]);
    }
}
