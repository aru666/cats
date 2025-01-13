<?php

namespace App\Livewire\Company;

use Livewire\Component;
use App\Models\Company;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class CompanyList extends Component
{
    use WithPagination;

    public $search = '';
    public $businessUnit = '';
    public $industryType = '';
    public $perPage = 10;

    protected $queryString = [
        'search' => ['except' => ''],
        'businessUnit' => ['except' => ''],
        'industryType' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Company::query()
            ->where('sales_id', Auth::id())
            ->where('is_active', true)
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('tax_id', 'like', '%' . $this->search . '%')
                        ->orWhere('short_name', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->businessUnit, fn($query) => $query->where('business_unit', $this->businessUnit))
            ->when($this->industryType, fn($query) => $query->where('industry_type', $this->industryType));

        return view('livewire.company.company-list', [
            'companies' => $query->paginate($this->perPage),
        ]);
    }
}