<?php

namespace App\Http\Controllers;

use App\COA;
use App\Journal;
use App\ChartOfAccount;
use App\JournalItem;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class JournalController extends Controller
{
    use SoftDeletes;

    public function index(Request $request)
    {
        $coa = COA::all()->pluck('name','id');

        $j = Journal::query();

        if($request->has('start') && $request->has('end')){
            $start = $request->get('start');
            $end = $request->get('end');
            $j->whereBetween('date',[$start,$end]);
        }

        if($request->has('head') && $request->get('head') > 0){
            $head = $request->get('head');
            $j->whereHas('items',function($q)use($head){
                $q->where('coa_id',$head);
            });
        }

        $journals = $j->orderByDesc('date')->paginate(25);

        //dd($journals);
        return view('admin.journal.index',compact('journals','coa'));
    }

    public function create()
    {
        $coa = COA::all()->where('is_enabled',1)->pluck('name','id');
        $journalNo = $this->journalNumber();
        return view('admin.journal.create',compact('coa','journalNo'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'date' => 'required|date',
            'reference' => 'required',
            'description' => 'sometimes|max:255'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        $request['user_id'] = auth()->id();
        $journal = Journal::query()->create($request->all());

        $len = count($request->journal_id);
        for ($i=0;$i<$len;$i++){
            $items['journal_id'] = $journal->id;
            $items['coa_id'] = $request->journal_id[$i];
            $items['description'] = $request->description[$i];
            $items['debit'] = $request->debit[$i];
            $items['credit'] = $request->credit[$i];
            JournalItem::query()->create($items);
        }

        return redirect('admin/journals');
    }

    /**
     * @param $id
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $journal = Journal::query()->findOrFail($id);
        return view('admin.journal.show',compact('journal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Journal  $journal
     * @return Response
     */
    public function edit(Journal $journal)
    {
        //return view('admin.journals.edit', compact('journal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Journal  $journal
     * @return Response
     */
    public function update(Request $request, Journal $journal)
    {
        //return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy($id): RedirectResponse
    {
        $journal = Journal::query()->findOrFail($id);
        foreach($journal->items as $item){
            $item->delete();
        }
        $journal->delete();
        Session::flash('success','Journal has been deleted!');
        return redirect()->back();
    }

    public function classic(Request $request)
    {
        $start = $request->get('start');
        $end = $request->get('end');
        $journals = Journal::query()->whereBetween('date',[$start,$end])->orderBy('date')->paginate(100);
        return view('admin.journal.classic',compact('journals','start','end'));
    }

    /**
     * Figure out new and unique journal number
     * @return string
     */
    public function journalNumber(): string
    {
        $maxJournalId = Journal::query()->max('id');
        $increment = $maxJournalId + 1;
        $journalNumber = str_pad($increment,7,0,STR_PAD_LEFT);
        return 'JUR'.$journalNumber;
    }
}
