<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Opportunity;
use App\Models\PerformanceTarget;
use Illuminate\Support\Facades\Auth;

class SalesOverview extends Component
{
    public $yearlyTarget = 0;
    public $currentAchievement = 0;
    public $remainingTarget = 0;
    public $achievementRate = 0;
    public $bnAchievement = 0;
    public $mtAchievement = 0;

    public function mount()
    {
        $user = Auth::user();
        $currentYear = date('Y');

        // Get yearly target
        $yearlyTarget = PerformanceTarget::where('user_id', $user->id)
            ->where('year', $currentYear)
            ->sum('target_amount');
        
        $this->yearlyTarget = $yearlyTarget;

        // Calculate achievements
        $opportunities = Opportunity::where('sales_id', $user->id)
            ->whereYear('created_at', $currentYear)
            ->where('status', 'won')
            ->get();

        $this->currentAchievement = $opportunities->sum('amount');
        $this->remainingTarget = max(0, $yearlyTarget - $this->currentAchievement);
        $this->achievementRate = $yearlyTarget > 0 ? ($this->currentAchievement / $yearlyTarget * 100) : 0;

        // Calculate BU specific achievements
        $this->bnAchievement = $opportunities->where('business_unit', 'BN')->sum('amount');
        $this->mtAchievement = $opportunities->where('business_unit', 'MT')->sum('amount');
    }

    public function render()
    {
        return view('livewire.dashboard.sales-overview');
    }
}