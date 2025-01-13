<?php

namespace App\Livewire\Company;

use Livewire\Component;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class CompanyForm extends Component
{
    public Company $company;
    public $isEdit = false;

    protected $rules = [
        'company.tax_id' => 'required|string|size:8|unique:companies,tax_id',
        'company.name' => 'required|string|max:255',
        'company.short_name' => 'nullable|string|max:255',
        'company.phone' => 'nullable|string|max:20',
        'company.address' => 'nullable|string|max:255',
        'company.website' => 'nullable|string|max:255',
        'company.business_unit' => 'required|string',
        'company.industry_type' => 'required|string',
        'company.focus_issues' => 'nullable|string',
        'company.marketing_schedule' => 'nullable|string',
        'company.fiscal_year' => 'nullable|string',
    ];

    public function mount($company = null)
    {
        if ($company) {
            $this->company = $company;
            $this->isEdit = true;
            $this->rules['company.tax_id'] = 'required|string|size:8|unique:companies,tax_id,' . $company->id;
        } else {
            $this->company = new Company();
        }
    }

    public function save()
    {
        $this->validate();
        
        if (!$this->isEdit) {
            $this->company->sales_id = Auth::id();
        }
        
        $this->company->save();

        session()->flash('message', $this->isEdit ? '公司資料已更新' : '公司資料已建立');
        
        return redirect()->route('companies.show', $this->company);
    }

    public function render()
    {
        return view('livewire.company.company-form');
    }
}