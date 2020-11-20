<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Domain;
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
        return view('livewire.dashboard.domain-graph', [
            'domain' => $this->domain
        ]);
    }
}
