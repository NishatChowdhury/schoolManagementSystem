<?php
/**
 * Created by PhpStorm.
 * User: smartrahat
 * Date: 11/7/2019
 * Time: 12:16 PM
 */

namespace App\Repository;


use App\AcademicClass;
use App\AssignSubject;
use App\BloodGroup;
use App\BookCategory;
use App\City;
use App\Classes;
use App\Country;
use App\Division;
use App\Gender;
use App\Group;
use App\leavePurpose;
use App\Religion;
use App\Section;
use App\Session;
use App\Student;
use App\StudentLeave;
use App\Subject;

class StudentRepository
{
    public function sessions()
    {
        return Session::all()
            //->where('active',1)
            ->pluck('year','id');
    }

    public function activeSessions()
    {
        return Session::all()->where('active',1)->pluck('year','id');
    }

    public function names()
    {
        return Student::all()->pluck('name','id');
    }

    public function academicClasses()
    {
        return AcademicClass::query()->whereIn('session_id',activeYear())->get();
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

    public function genders()
    {
        return Gender::all()->pluck('name', 'id');
    }

    public function bloods()
    {
        return BloodGroup::all()->pluck('name', 'id');
    }

    public function divisions()
    {
        return Division::all()->pluck('name', 'id');
    }

    public function cities()
    {
        return City::all()->pluck('name', 'id');
    }

    public function countries()
    {
        return Country::all()->pluck('name', 'id');
    }

    public function religions()
    {
        return Religion::all()->pluck('name','id');
    }

    public function bookCategories(){
        return BookCategory::all()->pluck('book_category','id');
    }


    public function optionals($class)
    {
        $subjects = AssignSubject::query()
            ->where('academic_class_id',$class)
            //->where('is_optional',1)
            ->pluck('subject_id');

        return Subject::query()->whereIn('id',$subjects)->pluck('name','id');
    }
}
