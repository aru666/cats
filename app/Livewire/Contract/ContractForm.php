<?php

namespace App\Livewire\Contract;

use Livewire\Component;
use App\Models\Contract;
use App\Models\Quote;
use Illuminate\Support\Facades\Auth;

class ContractForm extends Component
{
    public Contract $contract;
    public $isEdit = false;
    public $quotes = [];

    protected $rules = [
        'contract.quote_id' => 'required|exists:quotes,id',
        'contract.title' => 'required|string|max:255',
        'contract.content' => 'required|string',
        'contract.amount' => 'required|numeric|min:0',
        'contract.status' => 'required|string|in:draft,sent,signed,cancelled',
        'contract.start_date' => 'required|date',
        'contract.end_date' => 'required|date|after:start_date',
        'contract.payment_terms' => 'required|string',
        'contract.delivery_terms' => 'required|string',
        'contract.special_terms' => 'nullable|string',
        'contract.notes' => 'nullable|string',
    ];

    public function mount($contract = null)
    {
        if ($contract) {
            $this->contract = $contract;
            $this->isEdit = true;
        } else {
            $this->contract = new Contract();
            $this->contract->status = 'draft';
        }

        $this->quotes = Quote::where('sales_id', Auth::id())
            ->whereIn('status', ['accepted'])
            ->orderBy('title')
            ->get();
    }

    public function save()
    {
        $this->validate();
        
        if (!$this->isEdit) {
            $this->contract->sales_id = Auth::id();
        }
        
        $this->contract->save();

        session()->flash('message', $this->isEdit ? '合約已更新' : '合約已建立');
        
        return redirect()->route('contracts.show', $this->contract);
    }

    public function render()
    {
        return view('livewire.contract.contract-form');
    }
}