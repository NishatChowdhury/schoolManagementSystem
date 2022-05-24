<?php
/**
 * Created by PhpStorm.
 * User: smartrahat
 * Date: 11/24/2019
 * Time: 12:34 PM
 */

namespace App\Repository;

use App\AcademicClass;
use App\Classes;
use App\Exam;
use App\Group;
use App\Section;
use App\Session;

class ExamRepository
{
    public function academicClasses()
    {
        return AcademicClass::query()->whereIn('session_id',activeYear())->get();
    }

    public function exams()
    {
        return Exam::all()->pluck('name','id');
    }

    public function classes()
    {
        return Classes::all()->pluck('name','id');
    }

    public function sections()
    {
        return Section::all()->pluck('name','id');
    }

    public function groups()
    {
        return Group::all()->pluck('name','id');
    }

    public function sessions()
    {
        return Session::all()->pluck('year','id');
    }
}
