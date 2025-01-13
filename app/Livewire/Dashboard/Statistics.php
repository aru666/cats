<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Visit;
use App\Models\Opportunity;
use Illuminate\Support\Facades\Auth;

class Statistics extends Component
{
    public $monthlyVisits = 0;
    public $activeOpportunities = 0;
    public $activeProposals = 0;
    public $activeQuotes = 0;
    public $activeContracts = 0;

    public function mount()
    {
        $user = Auth::user();
        $currentMonth = now()->month;

        $this->monthlyVisits = Visit::where('sales_id', $user->id)
            ->whereMonth('visit_date', $currentMonth)
            ->count();

        $opportunities = Opportunity::where('sales_id', $user->id)
            ->where('status', 'in_progress');

        $this->activeOpportunities = $opportunities->count();
        $this->activeProposals = $opportunities->where('stage', 'proposal')->count();
        $this->activeQuotes = $opportunities->where('stage', 'quotation')->count();
        $this->activeContracts = $opportunities->where('stage', 'contract')->count();
    }

    public function render()
    {
        return view('livewire.dashboard.statistics');
    }
}