<?php

namespace App\Livewire\Opportunity;

use Livewire\Component;
use App\Models\Opportunity;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Visit;
use Illuminate\Support\Facades\Auth;

class OpportunityForm extends Component
{
    public Opportunity $opportunity;
    public $isEdit = false;
    public $companies = [];
    public $contacts = [];
    public $selectedCompanyId = null;
    public $visitId = null;

    protected $rules = [
        'opportunity.company_id' => 'required|exists:companies,id',
        'opportunity.agency' => 'nullable|string|max:255',
        'opportunity.contact_id' => 'required|exists:contacts,id',
        'opportunity.name' => 'required|string|max:255',
        'opportunity.visit_type' => 'required|string|in:親訪,電訪',
        'opportunity.visit_date' => 'required|date',
        'opportunity.content' => 'required|string',
        'opportunity.business_unit' => 'required|string',
        'opportunity.product_types' => 'required|array',
        'opportunity.product_types.*' => 'required|string',
        'opportunity.amount' => 'required|numeric|min:0',
        'opportunity.estimated_amount' => 'required|numeric|min:0',
        'opportunity.success_rate' => 'required|integer|min:0|max:100',
        'opportunity.cooperation_issues' => 'nullable|string',
        'opportunity.has_ad_exchange' => 'boolean',
        'opportunity.next_action' => 'nullable|string',
        'opportunity.reminder_at' => 'nullable|date',
        'opportunity.stage' => 'required|string',
        'opportunity.status' => 'required|string',
        'opportunity.status_reason' => 'nullable|string',
    ];

    public function mount($opportunity = null, $visitId = null)
    {
        if ($opportunity) {
            $this->opportunity = $opportunity;
            $this->isEdit = true;
            $this->selectedCompanyId = $opportunity->company_id;
            $this->loadContacts();
        } else {
            $this->opportunity = new Opportunity();
            $this->opportunity->status = 'in_progress';
            $this->opportunity->stage = 'development';
            $this->opportunity->success_rate = 30;
            $this->opportunity->has_ad_exchange = false;
            $this->opportunity->visit_date = now()->format('Y-m-d');
            
            if ($visitId) {
                $this->visitId = $visitId;
                $this->loadVisitData();
            }
        }

        $this->companies = Company::where('sales_id', Auth::id())
            ->where('is_active', true)
            ->orderBy('name')
            ->get();
    }

    public function loadVisitData()
    {
        $visit = Visit::findOrFail($this->visitId);
        
        $this->opportunity->company_id = $visit->company_id;
        $this->selectedCompanyId = $visit->company_id;
        $this->loadContacts();
        
        $this->opportunity->contact_id = $visit->contact_id;
        $this->opportunity->business_unit = $visit->business_unit;
        $this->opportunity->product_types = $visit->product_types;
        $this->opportunity->visit_type = $visit->visit_type;
        $this->opportunity->visit_date = $visit->visit_date;
        $this->opportunity->content = $visit->content;
        $this->opportunity->name = $visit->opportunity_name;
        
        if (!$visit->is_direct_client) {
            $this->opportunity->agency = $visit->agency;
        }
    }

    public function updatedSelectedCompanyId($value)
    {
        $this->opportunity->company_id = $value;
        $this->loadContacts();
        $this->opportunity->contact_id = null;
    }

    public function loadContacts()
    {
        if ($this->selectedCompanyId) {
            $this->contacts = Contact::where('company_id', $this->selectedCompanyId)
                ->where('employment_status', 'active')
                ->orderBy('name')
                ->get();
        } else {
            $this->contacts = [];
        }
    }

    public function save()
    {
        $this->validate();
        
        if (!$this->isEdit) {
            $this->opportunity->sales_id = Auth::id();
        }
        
        $this->opportunity->save();

        session()->flash('message', $this->isEdit ? '商機資料已更新' : '商機資料已建立');
        
        return redirect()->route('opportunities.show', $this->opportunity);
    }

    public function render()
    {
        return view('livewire.opportunity.opportunity-form');
    }
}