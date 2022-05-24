<?php
/**
 * Created by PhpStorm.
 * User: smartrahat
 * Date: 11/9/2019
 * Time: 4:30 PM
 */

namespace App\Repository;

use App\AcademicClass;
use App\Group;
use App\Section;

class AttendanceRepository
{
    public function academicClasses()
    {
        return AcademicClass::query()->whereIn('session_id',activeYear())->get();
    }

//    public function classes()
//    {
//        return AcademicClass::all()->pluck('name','id');
//    }
//
//    public function sections()
//    {
//        return Section::all()->pluck('name','id');
//    }
//
//    public function groups()
//    {
//        return Group::all()->pluck('name','id');
//    }
}
