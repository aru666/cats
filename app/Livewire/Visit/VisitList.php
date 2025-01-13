<?php

namespace App\Livewire\Visit;

use Livewire\Component;
use App\Models\Visit;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class VisitList extends Component
{
    use WithPagination;

    public $search = '';
    public $businessUnit = '';
    public $visitType = '';
    public $hasProposal = '';
    public $perPage = 10;

    protected $queryString = [
        'search' => ['except' => ''],
        'businessUnit' => ['except' => ''],
        'visitType' => ['except' => ''],
        'hasProposal' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Visit::query()
            ->where('sales_id', Auth::id())
            ->when($this->search, function ($query) {
                $query->whereHas('company', function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%');
                })->orWhereHas('contact', function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->businessUnit, fn($query) => $query->where('business_unit', $this->businessUnit))
            ->when($this->visitType, fn($query) => $query->where('visit_type', $this->visitType))
            ->when($this->hasProposal !== '', fn($query) => $query->where('has_proposal', $this->hasProposal))
            ->latest('visit_date');

        return view('livewire.visit.visit-list', [
            'visits' => $query->paginate($this->perPage),
        ]);
    }

    public function convertToOpportunity($visitId)
    {
        $visit = Visit::findOrFail($visitId);
        
        return redirect()->route('opportunities.create', [
            'visit_id' => $visit->id,
            'company_id' => $visit->company_id,
            'contact_id' => $visit->contact_id,
            'business_unit' => $visit->business_unit,
            'product_types' => $visit->product_types,
            'visit_type' => $visit->visit_type,
            'visit_date' => $visit->visit_date,
            'content' => $visit->content,
        ]);
    }
}