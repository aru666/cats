<?php

namespace App\Livewire\Contract;

use Livewire\Component;
use App\Models\Contract;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ContractList extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';
    public $perPage = 10;

    protected $queryString = [
        'search' => ['except' => ''],
        'status' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Contract::query()
            ->where('sales_id', Auth::id())
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('title', 'like', '%' . $this->search . '%')
                        ->orWhereHas('quote', function ($q) {
                            $q->where('title', 'like', '%' . $this->search . '%');
                        });
                });
            })
            ->when($this->status, fn($query) => $query->where('status', $this->status))
            ->latest();

        return view('livewire.contract.contract-list', [
            'contracts' => $query->paginate($this->perPage),
        ]);
    }
}