<?php


namespace App\Repository;


use App\Day;

class ScheduleRepository
{
    public function days()
    {
        return Day::all()->pluck('name','id');
    }
}
