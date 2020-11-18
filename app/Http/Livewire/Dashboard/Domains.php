<?php

namespace App\Http\Livewire\Dashboard;

use Illuminate\Support\Facades\Log;
use Livewire\Component;
use App\Models\Domain;

class Domains extends Component
{
    public $selectedDomain = null;
    public $deletingDomain = false;

    protected $listeners = ['refreshDomains' => '$refresh'];

    public function openDeleteModal($id)
    {
        $this->deletingDomain = true;
        $this->selectedDomain = $id;
    }

    public function deleteDomain()
    {
        Domain::findOrFail($this->selectedDomain)->delete();
        
        $this->emit('refreshDomains');

        $this->selectedDomain = null;
        $this->deletingDomain = false;
    }
    
    public function render()
    {
        $domains = auth()->user()->currentTeam->domains;

        return view('livewire.dashboard.domains', [
            'domains' => $domains,
        ]);
    }
}