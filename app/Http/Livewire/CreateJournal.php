<?php

namespace App\Http\Livewire;

use App\Journal;
use App\ChartOfAccount;
use Livewire\Component;
use Illuminate\Support\Str;

class CreateJournal extends Component
{
    public $allJournals = [];
    public $coas = [];
    public $disableButton;
    public $descriptions;
    public $debit_credits;
    public $error_message;
    protected $rules = [
        'allJournals.0.description' => 'required'
    ];
    public function mount(){
        $this->coas = ChartOfAccount::active();
        $this->allJournals = [
            ['description'=>null,'chart_of_account_id' => null , 'amount' => 0, 'debit_credit' => 0],
            ['description'=>null,'chart_of_account_id' => null , 'amount' => 0, 'debit_credit' => 1]
        ];
        $this->disableButton = count($this->allJournals) <= 0 ? "disabled" : "";
    }
    public function update()
    {
        $this->disableButton = count($this->allJournals)  <=  0 ? "disabled" : "";
    }
    public function addJournal()
    {
        $this->allJournals[] = ['description' => null,'chart_of_account_id' => null, 'amount' => 0, 'debit_credit' => ''];
    }
    public function deleteJournal($index)
    {
        unset($this->allJournals[$index]);
        array_values($this->allJournals);
    }
    function store(){
       
        $total_debit = collect($this->allJournals)->sum(function($journal){
            if($journal['debit_credit'] == 0){
                return $journal['amount'];
            }
        });
        $total_credit = collect($this->allJournals)->sum(function($journal){
            if($journal['debit_credit'] == 1){
                return $journal['amount'];
            }
        });
        if($total_credit !== $total_debit || $total_credit == 0 || $total_debit == 0){
            $this->error_message = 'Debit and Credit Amount must be equal and greater than 0';
            return;
        }
        $journal_no = journal_no(); // All Journals need to save with same journal no
        foreach($this->allJournals as $journal){
            // @dd($journal);
            Journal::create([
                'description' => $journal['description'],
                'chart_of_account_id' => $journal['chart_of_account_id'],
                'amount' => $journal['amount'],
                'debit_credit' => $journal['debit_credit'],
                'journal_no' =>  $journal_no
            ]);
        }
        session()->flash('success' , "Journals Created successfully!");
        return redirect()->route('journals.index');

    }
    public function render()
    {
        return view('livewire.create-journal');
    }
}
