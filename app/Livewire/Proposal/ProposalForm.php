<?php

namespace App\Livewire\Proposal;

use Livewire\Component;
use App\Models\Proposal;
use App\Models\Opportunity;
use Illuminate\Support\Facades\Auth;

class ProposalForm extends Component
{
    public Proposal $proposal;
    public $isEdit = false;
    public $opportunities = [];

    protected $rules = [
        'proposal.opportunity_id' => 'required|exists:opportunities,id',
        'proposal.title' => 'required|string|max:255',
        'proposal.content' => 'required|string',
        'proposal.amount' => 'required|numeric|min:0',
        'proposal.status' => 'required|string|in:draft,sent,accepted,rejected',
        'proposal.valid_until' => 'required|date',
        'proposal.notes' => 'nullable|string',
    ];

    public function mount($proposal = null)
    {
        if ($proposal) {
            $this->proposal = $proposal;
            $this->isEdit = true;
        } else {
            $this->proposal = new Proposal();
            $this->proposal->status = 'draft';
        }

        $this->opportunities = Opportunity::where('sales_id', Auth::id())
            ->where('status', 'in_progress')
            ->orderBy('name')
            ->get();
    }

    public function save()
    {
        $this->validate();
        
        if (!$this->isEdit) {
            $this->proposal->sales_id = Auth::id();
        }
        
        $this->proposal->save();

        session()->flash('message', $this->isEdit ? '提案已更新' : '提案已建立');
        
        return redirect()->route('proposals.show', $this->proposal);
    }

    public function render()
    {
        return view('livewire.proposal.proposal-form');
    }
}