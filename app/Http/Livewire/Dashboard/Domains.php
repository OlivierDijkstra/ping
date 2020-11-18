<?php

namespace App\Http\Livewire\Dashboard;

use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Domains extends Component
{
    protected $listeners = ['refreshDomains' => '$refresh'];
    
    public function render()
    {
        $domains = auth()->user()->currentTeam->domains;

        return view('livewire.dashboard.domains', [
            'domains' => $domains,
        ]);
    }
}