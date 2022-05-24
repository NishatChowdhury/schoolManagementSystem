<?php

namespace App\Http\Livewire;

use App\Journal;
use Livewire\Component;

class ListJournal extends Component
{
    public $error_message;
    public $allJournals;
    public $total_debit;
    public $total_credit;

    public function mount()
    {
        $this->allJournals = Journal::with('coa')->get();
        $this->total_debit = Journal::whereDebitCredit(0)->sum('amount');
        $this->total_credit = Journal::whereDebitCredit(1)->sum('amount');
    }
    public function render()
    {
        return view('livewire.list-journal');
    }
}
