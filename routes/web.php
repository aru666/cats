<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Visit\VisitList;
use App\Livewire\Visit\VisitForm;
use App\Livewire\Company\CompanyList;
use App\Livewire\Company\CompanyForm;
use App\Livewire\Contact\ContactList;
use App\Livewire\Contact\ContactForm;
use App\Livewire\Opportunity\OpportunityList;
use App\Livewire\Opportunity\OpportunityForm;
use App\Livewire\Proposal\ProposalList;
use App\Livewire\Proposal\ProposalForm;
use App\Livewire\Quote\QuoteList;
use App\Livewire\Quote\QuoteForm;
use App\Livewire\Contract\ContractList;
use App\Livewire\Contract\ContractForm;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Companies
    Route::get('/companies', CompanyList::class)->name('companies.index');
    Route::get('/companies/create', CompanyForm::class)->name('companies.create');
    Route::get('/companies/{company}/edit', CompanyForm::class)->name('companies.edit');
    Route::get('/companies/{company}', CompanyForm::class)->name('companies.show');

    // Contacts
    Route::get('/contacts', ContactList::class)->name('contacts.index');
    Route::get('/contacts/create', ContactForm::class)->name('contacts.create');
    Route::get('/contacts/{contact}/edit', ContactForm::class)->name('contacts.edit');
    Route::get('/contacts/{contact}', ContactForm::class)->name('contacts.show');

    // Visits
    Route::get('/visits', VisitList::class)->name('visits.index');
    Route::get('/visits/create', VisitForm::class)->name('visits.create');
    Route::get('/visits/{visit}/edit', VisitForm::class)->name('visits.edit');
    Route::get('/visits/{visit}', VisitForm::class)->name('visits.show');

    // Opportunities
    Route::get('/opportunities', OpportunityList::class)->name('opportunities.index');
    Route::get('/opportunities/create', OpportunityForm::class)->name('opportunities.create');
    Route::get('/opportunities/{opportunity}/edit', OpportunityForm::class)->name('opportunities.edit');
    Route::get('/opportunities/{opportunity}', OpportunityForm::class)->name('opportunities.show');

    // Proposals
    Route::get('/proposals', ProposalList::class)->name('proposals.index');
    Route::get('/proposals/create', ProposalForm::class)->name('proposals.create');
    Route::get('/proposals/{proposal}/edit', ProposalForm::class)->name('proposals.edit');
    Route::get('/proposals/{proposal}', ProposalForm::class)->name('proposals.show');

    // Quotes
    Route::get('/quotes', QuoteList::class)->name('quotes.index');
    Route::get('/quotes/create', QuoteForm::class)->name('quotes.create');
    Route::get('/quotes/{quote}/edit', QuoteForm::class)->name('quotes.edit');
    Route::get('/quotes/{quote}', QuoteForm::class)->name('quotes.show');

    // Contracts
    Route::get('/contracts', ContractList::class)->name('contracts.index');
    Route::get('/contracts/create', ContractForm::class)->name('contracts.create');
    Route::get('/contracts/{contract}/edit', ContractForm::class)->name('contracts.edit');
    Route::get('/contracts/{contract}', ContractForm::class)->name('contracts.show');
});