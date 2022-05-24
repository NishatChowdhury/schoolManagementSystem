<?php

use App\COA;
use App\CommunicationSetting;
use App\HolidayDuration;
use App\Journal;
use App\JournalItem;
use App\Menu;
use App\RawAttendance;
use App\Session;
use App\ImportantLink;
use App\Shift;
use App\SiteInformation;
use App\Theme;
use App\weeklyOff;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\HigherOrderBuilderProxy;
use Illuminate\Support\HigherOrderCollectionProxy;
use Illuminate\Support\Str;

function isActive($path, $active = 'active menu-open'){
    return call_user_func_array('Request::is', (array)$path) ? $active : '';
}

function siteConfig($col){
    $config = SiteInformation::query()->first();
    return $config->$col;
}

function smsConfig($col){
    $config = CommunicationSetting::query()->first();
    return $config ? $config->$col : false;
}

function socialConfig($col){
    $config = \App\Social::query()->first();
    return $config->$col;
}

function activeYear(){
    return Session::query()->where('active',1)->pluck('id');
}

function importantLinks(){
    return ImportantLink::all();
}

function academicClass($id){
    $academicClass = \App\AcademicClass::query()->findOrFail($id);
    $className = $academicClass->academicClasses->name ?? '';
    $section = $academicClass->section->name ?? '';
    $group = $academicClass->group->name ?? '';
    return $className.' '.$section.$group;
}

function journal_no(){
  return Journal::latest()->first() ? Str::padLeft(Journal::latest()->first()->journal_no + 1, 5, '0') : Str::padLeft(1,5,'0');
}

function dateToRead($date){
    return date('d-m-yy', strtotime($date));
}
function inWord($number){
    $f = new NumberFormatter("en",NumberFormatter::SPELLOUT);
    return $f->format($number);
}

function coa_balance($coa){
    return $coa->journals->where('debit_credit',0)->sum('amount')-$coa->journals->where('debit_credit',1)->sum('amount');
}
/**
 * @param int $capital
 * @param int $income
 * @param int $expense
 *
 */
function capital_coa_balance($capital, $income, $expense){
    return ($capital + $income - $expense);
}

function minTime($studentId,$date){
    $a = RawAttendance::query()
        ->where('registration_id',$studentId)
        ->where('access_date','like','%'.$date.'%')
        ->get();

    if($a->count() > 0){
        $t = $a->min('access_date')->format('H:i:s');
    }else{
        $t = $a->min('access_date');
    }

    return $t;
}

function maxTime($studentId,$date){
    $a = RawAttendance::query()
        ->where('registration_id',$studentId)
        ->where('access_date','like','%'.$date.'%')
        ->get();

    if($a->count() > 0){
        $t = $a->max('access_date')->format('H:i:s');
    }else{
        $t = $a->max('access_date');
    }

    return $t;
}

/**
 * Display menus in front end
 */
function menus(){
    $menus = Menu::query()
        ->where('menu_id',null)
        ->orderBy('order')
        ->get();
    return $menus;
}

function isMenu(): bool
{
    return true;
}

/** Get current theme id */
function theme()
{
    $setting = SiteInformation::query()->first();
    return $setting->theme_id;
}

/** Get current theme
 * @param $col
 * @return HigherOrderBuilderProxy|HigherOrderCollectionProxy|mixed
 */
function themeConfig($col){
    $setting = SiteInformation::query()->first();
    $config = Theme::query()->findOrFail($setting->theme_id);
    return $config->$col;
}

/**
 * Ledger balance of Chart of Account's head
 * @param $id
 * @param $start
 * @param $end
 * @param $side
 * @return int|mixed
 */
function balance($id,$start,$end,$side): int
{
    $debit = JournalItem::query()
        ->where('coa_id',$id)
        ->whereHas('journal',function($query)use($start,$end){
            $query->whereBetween('date',[$start,$end]);
        })
        ->sum('debit');

    $credit = JournalItem::query()
        ->where('coa_id',$id)
        ->whereHas('journal',function($query)use($start,$end){
            $query->whereBetween('date',[$start,$end]);
        })
        ->sum('credit');

    if($side == 'dr'){
        $debit = $debit - $credit;
        if($debit > 0){
            $balance = $debit;
        }else{
            $balance = 0;
        }
    }else{
        $credit = $credit - $debit;
        if($credit > 0){
            $balance = $credit;
        }else{
            $balance = 0;
        }
    }

//    if($debit > $credit){
//        $balance = $debit - $credit;
//    }else{
//        $balance = $credit - $debit;
//    }

    //return $debit - $credit;
    return $balance;
}

function netProfit($start,$end)
{
    //$start = '2021-04-01';
    //$end = '2021-04-30';
    $sum = 0;
    $in_debit = 0;
    $in_credit = 0;
    $ex_debit = 0;
    $ex_credit = 0;

    $income = COA::query()->where('coa_grandparents_id',4)->get();
    $expense = COA::query()->where('coa_grandparents_id',3)->get();

    foreach($income as $in){
        $in_debit += balance($in->id,$start,$end,'dr');
        $in_credit += balance($in->id,$start,$end,'cr');
    }

    foreach($expense as $ex){
        $ex_debit += balance($ex->id,$start,$end,'dr');
        $ex_credit += balance($ex->id,$start,$end,'cr');
    }

    $profit = $in_credit - $in_debit;
    $loss = $ex_debit - $ex_credit;

    if($profit > $loss){
        $balance = $profit - $loss;
    }else{
        $balance = $loss - $profit;
    }

    return $balance;

}
