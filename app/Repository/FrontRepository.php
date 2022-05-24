<?php
/**
 * Created by PhpStorm.
 * User: smartrahat
 * Date: 12/12/2019
 * Time: 1:23 AM
 */

namespace App\Repository;

use App\BloodGroup;
use App\Exam;
use App\Gender;
use App\Group;
use App\Location;
use App\Religion;
use App\Session;

class FrontRepository
{
    public function sessions()
    {
        return Session::all()->pluck('year','id');
    }

    public function exams()
    {
        return Exam::all()->pluck('name','id');
    }

    public function genders()
    {
        return Gender::all()->pluck('name', 'id');
    }

    public function bloods()
    {
        return BloodGroup::all()->pluck('name', 'id');
    }

    public function religions()
    {
        return Religion::all()->pluck('name','id');
    }

    public function locations()
    {
        return Location::all()->pluck('name','id');
    }

    public function groups()
    {
        return Group::all()->pluck('name','id');
    }
}
