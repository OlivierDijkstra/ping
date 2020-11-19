<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class BackToDomainButton extends Component
{
    public function redirectToDashboard()
    {
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.dashboard.back-to-domain-button');
    }
}
