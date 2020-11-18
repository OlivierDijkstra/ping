<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class DomainModal extends Component
{
    public $storingDomain = false;

    public $host;

    protected $rules = [
        'host' => 'required|url',
    ];

    public function storeDomain()
    {
        $this->validate();

        // Execution doesn't reach here if validation fails.
        auth()->user()->currentTeam->domains()->create([
            'host' => $this->host
        ]);

        $this->storingDomain = false;

        $this->emit('refreshDomains');
    }

    public function render()
    {
        return view('livewire.dashboard.domain-modal');
    }
}
