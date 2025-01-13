<?php

namespace App\Livewire\Opportunity;

use Livewire\Component;
use App\Models\Opportunity;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class OpportunityList extends Component
{
    use WithPagination;

    public $search = '';
    public $businessUnit = '';
    public $stage = '';
    public $status = 'in_progress';
    public $perPage = 10;

    protected $queryString = [
        'search' => ['except' => ''],
        'businessUnit' => ['except' => ''],
        'stage' => ['except' => ''],
        'status' => ['except' => 'in_progress'],
        'page' => ['except' => 1],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Opportunity::query()
            ->where('sales_id', Auth::id())
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                        ->orWhereHas('company', function ($q) {
                            $q->where('name', 'like', '%' . $this->search . '%');
                        });
                });
            })
            ->when($this->businessUnit, fn($query) => $query->where('business_unit', $this->businessUnit))
            ->when($this->stage, fn($query) => $query->where('stage', $this->stage))
            ->when($this->status, fn($query) => $query->where('status', $this->status))
            ->latest('visit_date');

        return view('livewire.opportunity.opportunity-list', [
            'opportunities' => $query->paginate($this->perPage),
        ]);
    }
}