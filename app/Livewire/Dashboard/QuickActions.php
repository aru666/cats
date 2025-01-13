<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class QuickActions extends Component
{
    public function createOpportunity()
    {
        return redirect()->route('opportunities.create');
    }

    public function createProposal()
    {
        return redirect()->route('proposals.create');
    }

    public function createQuote()
    {
        return redirect()->route('quotes.create');
    }

    public function createContract()
    {
        return redirect()->route('contracts.create');
    }

    public function viewCompletedOpportunities()
    {
        return redirect()->route('opportunities.index', ['status' => 'won']);
    }

    public function render()
    {
        return view('livewire.dashboard.quick-actions');
    }
}