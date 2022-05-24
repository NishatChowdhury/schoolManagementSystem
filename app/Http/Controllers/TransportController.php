<?php

namespace App\Http\Controllers;

use App\Location;
use App\Student;
use App\Transport;
use Illuminate\Http\Request;
use App\Repository\StudentRepository;

class TransportController extends Controller
{
    private $repository;

    public function __construct(StudentRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }
    public function index()
    {
        $data['locations'] = Location::paginate(10);
        return view('admin.account.transport.location.add-transport')->with($data);
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required',
                'amount' => 'required'
            ],
            [
                'name.required' => 'Location name is required',
                'amount.required' => 'Fare amount is required',
            ]);
        Location::create($request->all());

        return redirect(route('transport.index'))->with('message','Location Successfully Inserted');
    }

    public function edit($id){
        $data['single_location'] = Location::findOrFail($id);
        $data['locations'] = Location::paginate(10);
        return view('admin.account.transport.location.edit-transport')->with($data);
    }

    public function update(Request $request,$id){
        $data['locations'] = Location::paginate(10);
        $location = Location::findOrFail($id);
        $location->update($request->all());
        return redirect(route('transport.index'))->with($data);

    }

    public function student_list(Request $request, Student $student)
    {
        if($request->all()){
            $s = $student->newQuery();
            if($request->get('studentId')){
                $studentId = $request->get('studentId');
                $s->where('studentId',$studentId);
            }
            if($request->get('name')){
                $name = $request->get('name');
                $s->where('name','like','%'.$name.'%');
            }
            if($request->get('class_id')){
                $class = $request->get('class_id');
                $s->where('class_id',$class);
            }
            if($request->get('section_id')){
                $section = $request->get('section_id');
                $s->where('section_id',$section);
            }
            if($request->get('group_id')){
                $group = $request->get('group_id');
                $s->where('group_id',$group);
            }

            $students = $s->get();
        }else{
            $students = [];
        }

        $repository = $this->repository;
        $trnsport_fee = Location::query()->pluck('name','id');

        return view('admin.account.transport.location.assign-location',compact('repository','students','trnsport_fee'));
    }

    public function transport_assign(Request $request)
    {
        //dd($request->all());
        foreach ($request->student_id as $key=>$value)
        {
            $student_id = Transport::query()->where('student_id',$value)->first();

            if($student_id == null AND $request->location_id[$key] != null)
            {
                Transport::create([
                    'student_id' => $value,
                    'location_id' => $request->location_id[$key],
                    'status' => 1
                ]);
            }
        }
    }




}
