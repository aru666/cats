<?php

namespace App\Livewire\Contact;

use Livewire\Component;
use App\Models\Contact;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class ContactForm extends Component
{
    public Contact $contact;
    public $isEdit = false;
    public $companies = [];

    protected $rules = [
        'contact.company_id' => 'required|exists:companies,id',
        'contact.name' => 'required|string|max:255',
        'contact.nickname' => 'nullable|string|max:255',
        'contact.department' => 'nullable|string|max:255',
        'contact.title' => 'nullable|string|max:255',
        'contact.job_type' => 'nullable|string|max:255',
        'contact.job_level' => 'nullable|string|max:255',
        'contact.email' => 'nullable|email|max:255',
        'contact.mobile' => 'nullable|string|max:20',
        'contact.phone' => 'nullable|string|max:20',
        'contact.notes' => 'nullable|string',
        'contact.employment_status' => 'required|string|in:active,inactive',
    ];

    public function mount($contact = null)
    {
        if ($contact) {
            $this->contact = $contact;
            $this->isEdit = true;
        } else {
            $this->contact = new Contact();
            $this->contact->employment_status = 'active';
        }

        $this->companies = Company::where('sales_id', Auth::id())
            ->where('is_active', true)
            ->orderBy('name')
            ->get();
    }

    public function save()
    {
        $this->validate();
        
        if (!$this->isEdit) {
            $this->contact->sales_id = Auth::id();
        }
        
        $this->contact->save();

        session()->flash('message', $this->isEdit ? '聯絡人資料已更新' : '聯絡人資料已建立');
        
        return redirect()->route('contacts.show', $this->contact);
    }

    public function render()
    {
        return view('livewire.contact.contact-form');
    }
}