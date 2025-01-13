<?php

namespace App\Livewire\Quote;

use Livewire\Component;
use App\Models\Quote;
use App\Models\Proposal;
use Illuminate\Support\Facades\Auth;

class QuoteForm extends Component
{
    public Quote $quote;
    public $isEdit = false;
    public $proposals = [];

    protected $rules = [
        'quote.proposal_id' => 'required|exists:proposals,id',
        'quote.title' => 'required|string|max:255',
        'quote.content' => 'required|string',
        'quote.amount' => 'required|numeric|min:0',
        'quote.status' => 'required|string|in:draft,sent,accepted,rejected',
        'quote.valid_until' => 'required|date',
        'quote.payment_terms' => 'nullable|string',
        'quote.delivery_terms' => 'nullable|string',
        'quote.notes' => 'nullable|string',
    ];

    public function mount($quote = null)
    {
        if ($quote) {
            $this->quote = $quote;
            $this->isEdit = true;
        } else {
            $this->quote = new Quote();
            $this->quote->status = 'draft';
        }

        $this->proposals = Proposal::where('sales_id', Auth::id())
            ->whereIn('status', ['sent', 'accepted'])
            ->orderBy('title')
            ->get();
    }

    public function save()
    {
        $this->validate();
        
        if (!$this->isEdit) {
            $this->quote->sales_id = Auth::id();
        }
        
        $this->quote->save();

        session()->flash('message', $this->isEdit ? '報價已更新' : '報價已建立');
        
        return redirect()->route('quotes.show', $this->quote);
    }

    public function render()
    {
        return view('livewire.quote.quote-form');
    }
}