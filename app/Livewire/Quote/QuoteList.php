<?php

namespace App\Livewire\Quote;

use Livewire\Component;
use App\Models\Quote;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class QuoteList extends Component
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
        $query = Quote::query()
            ->where('sales_id', Auth::id())
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('title', 'like', '%' . $this->search . '%')
                        ->orWhereHas('proposal', function ($q) {
                            $q->where('title', 'like', '%' . $this->search . '%');
                        });
                });
            })
            ->when($this->status, fn($query) => $query->where('status', $this->status))
            ->latest();

        return view('livewire.quote.quote-list', [
            'quotes' => $query->paginate($this->perPage),
        ]);
    }
}