<?php

namespace App\Livewire\Visit;

use Livewire\Component;
use App\Models\Visit;
use App\Models\Company;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class VisitForm extends Component
{
    public Visit $visit;
    public $isEdit = false;
    public $companies = [];
    public $contacts = [];
    public $selectedCompanyId = null;

    protected $rules = [
        'visit.company_id' => 'required|exists:companies,id',
        'visit.contact_id' => 'required|exists:contacts,id',
        'visit.business_unit' => 'required|string',
        'visit.product_types' => 'required|array',
        'visit.product_types.*' => 'required|string',
        'visit.visit_type' => 'required|string|in:親訪,電訪',
        'visit.visit_date' => 'required|date',
        'visit.content' => 'required|string',
        'visit.next_action' => 'nullable|string',
        'visit.reminder_at' => 'nullable|date',
        'visit.has_proposal' => 'boolean',
        'visit.opportunity_name' => 'nullable|string|max:255',
        'visit.is_direct_client' => 'boolean',
        'visit.agency' => 'nullable|string|max:255',
    ];

    public function mount($visit = null)
    {
        if ($visit) {
            $this->visit = $visit;
            $this->isEdit = true;
            $this->selectedCompanyId = $visit->company_id;
            $this->loadContacts();
        } else {
            $this->visit = new Visit();
            $this->visit->is_direct_client = true;
            $this->visit->has_proposal = false;
            $this->visit->visit_date = now()->format('Y-m-d');
        }

        $this->companies = Company::where('sales_id', Auth::id())
            ->where('is_active', true)
            ->orderBy('name')
            ->get();
    }

    public function updatedSelectedCompanyId($value)
    {
        $this->visit->company_id = $value;
        $this->loadContacts();
        $this->visit->contact_id = null;
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
            $this->visit->sales_id = Auth::id();
        }
        
        $this->visit->save();

        session()->flash('message', $this->isEdit ? '拜訪紀錄已更新' : '拜訪紀錄已建立');
        
        return redirect()->route('visits.show', $this->visit);
    }

    public function render()
    {
        return view('livewire.visit.visit-form');
    }
}