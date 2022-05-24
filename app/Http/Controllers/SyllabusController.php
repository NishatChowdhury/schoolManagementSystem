<?php

namespace App\Http\Controllers;
use App\AcademicClass;
use App\Classes;
use App\Session;
use App\Syllabus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SyllabusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //$session = Session::query()->where('active',1)->first()->id;
        $data['academic_class'] = AcademicClass::query()->whereIn('session_id',activeYear())->get();
        $data['syllabuses'] = Syllabus::query()->orderBy('academic_class_id')->get();
        return view('admin.syllabus.index')->with($data);
    }

    public function store(Request $request)
    {
        $this->validate($request,
        [
            'academic_class_id' => 'required',
            'file'              =>  'required|mimes:pdf'
        ],
        [
            'academic_class_id.required' => 'Academic Class Filed is Required',
            'file.required' => 'File Filed is Required',
            'file.mimes' => 'File Must be PDF format',
        ]);

        $class_name_id = AcademicClass::query()->where('id',$request->academic_class_id)->first();
        $class_name = $class_name_id->academicClasses->name;

        if($request->hasFile('file')){
            $name = time().$class_name.'.'.$request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path().'/assets/syllabus/'.'/', $name);
            $data = $request->except('file');
            $data['file'] = $name;
            //dd($data);
            Syllabus::query()->create($data);
        }else{
            Syllabus::query()->create($request->all());
        }
        return redirect('syllabuses');

    }

    public function destroy($id)
    {
        $syllabus = Syllabus::query()->findOrFail($id);
        File::delete('assets/syllabus/'.$syllabus->file);
        $syllabus->delete();

        return redirect('syllabuses');
    }
}
