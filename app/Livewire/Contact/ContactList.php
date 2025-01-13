<?php

namespace App\Livewire\Contact;

use Livewire\Component;
use App\Models\Contact;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ContactList extends Component
{
    use WithPagination;

    public $search = '';
    public $department = '';
    public $jobLevel = '';
    public $employmentStatus = 'active';
    public $perPage = 10;

    protected $queryString = [
        'search' => ['except' => ''],
        'department' => ['except' => ''],
        'jobLevel' => ['except' => ''],
        'employmentStatus' => ['except' => 'active'],
        'page' => ['except' => 1],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Contact::query()
            ->where('sales_id', Auth::id())
            ->where('is_active', true)
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%')
                        ->orWhere('mobile', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->department, fn($query) => $query->where('department', $this->department))
            ->when($this->jobLevel, fn($query) => $query->where('job_level', $this->jobLevel))
            ->when($this->employmentStatus, fn($query) => $query->where('employment_status', $this->employmentStatus));

        return view('livewire.contact.contact-list', [
            'contacts' => $query->paginate($this->perPage),
        ]);
    }
}