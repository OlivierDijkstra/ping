<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class OverviewButton extends Component
{
    public $domainId;
    
    public function redirectToOverview()
    {
        return redirect('/dashboard/overview/' . $this->domainId);
    }

    public function render()
    {
        return view('livewire.dashboard.overview-button');
    }
}
