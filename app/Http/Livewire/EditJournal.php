<?php

namespace App\Http\Livewire;

use App\Journal;
use App\ChartOfAccount;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class EditJournal extends Component
{
    public $allJournals = [];
    public $coas = [];
    public $disableButton;
    public $descriptions;
    public $debit_credits;
    public $error_message;
    public $journal_no;
    public $deleted_ids;
    protected $rules = [
        'allJournals.0.description' => 'required'
    ];
    public function mount($journal_no){
        $this->coas = ChartOfAccount::active();
        $this->allJournals = Journal::whereJournalNo($journal_no)->get()->toArray();
        $this->journal_no = $journal_no;
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
        isset($this->allJournals[$index]['id']) ? $this->deleted_ids[] = $this->allJournals[$index]['id'] : '';
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
        if($this->allJournals){
            if($total_credit !== $total_debit || $total_credit == 0 || $total_debit == 0){
                $this->error_message = 'Debit and Credit Amount must be equal and greater than 0';
                return;
            }
        }
        DB::transaction(function () {
            if($this->allJournals){
                foreach($this->allJournals as $journal){
                    if(isset($journal['id'])){
                        Journal::find($journal['id'])->update(
                            [
                                'description' => $journal['description'],
                                'chart_of_account_id' => $journal['chart_of_account_id'],
                                'amount' => $journal['amount'],
                                'debit_credit' => $journal['debit_credit'],
                                'journal_no' =>  $this->journal_no
                            ]
                        );
                    }else{
                        Journal::Create(
                            [
                                'description' => $journal['description'],
                                'chart_of_account_id' => $journal['chart_of_account_id'],
                                'amount' => $journal['amount'],
                                'debit_credit' => $journal['debit_credit'],
                                'journal_no' =>  $this->journal_no
                            ]
                        );
                    }
                }
            }
            if($this->deleted_ids){
                foreach(Journal::whereIn('id',$this->deleted_ids)->get() as $deleted_journal){
                $deleted_journal->delete();
                }
            }
        });
        
        session()->flash('success' , "Journals Created successfully!");
        return redirect()->route('journals.index');

    }
    public function render()
    {
        return view('livewire.edit-journal');
    }
}
