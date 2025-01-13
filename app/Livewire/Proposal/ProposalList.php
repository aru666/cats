<?php

namespace App\Livewire\Proposal;

use Livewire\Component;
use App\Models\Proposal;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ProposalList extends Component
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
        $query = Proposal::query()
            ->where('sales_id', Auth::id())
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('title', 'like', '%' . $this->search . '%')
                        ->orWhereHas('opportunity', function ($q) {
                            $q->where('name', 'like', '%' . $this->search . '%');
                        });
                });
            })
            ->when($this->status, fn($query) => $query->where('status', $this->status))
            ->latest();

        return view('livewire.proposal.proposal-list', [
            'proposals' => $query->paginate($this->perPage),
        ]);
    }
}