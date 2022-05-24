<?php

namespace App\Http\Controllers\apiControllers;

use App\Http\Controllers\Controller;
use App\Models\Backend\AcademicClass;
use App\Models\Backend\Father;
use App\Models\Backend\Guardian;
use App\Models\Backend\Mother;
use App\Student;
use App\Models\Backend\StudentAcademic;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {
        $s = Student::query()->get();
        return $s;
    }


    public function create()
    {
        //
    }


    public function store(Request $req)
    {
        $rules = [
            'name' => 'required',
            'name_bn' => 'required',
            'birth_certificate' => 'required|integer',
            'nationality' => 'required',
            'disability' => 'required',
            'studentId' => 'required|unique:students',
            'status' => 'required',
            'dob' => 'required',
            'gender_id' => 'required',
            'blood_group_id' => 'required',
            'religion_id' => 'required',
            'address' => 'required',
            'area' => 'required',
            'zip' => 'required',
            'city_id' => 'required',
            'country_id' => 'required',
            'mobile' => 'required',
            'email' => 'required',
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.'

        ];

        $this->validate($req, $rules, $customMessages);

        $data = $req->all();

        if ($req->hasFile('pic')){
            $image = $req->studentId.'.'.$req->file('pic')->getClientOriginalExtension();
            $req->file('pic')->move(storage_path('app/public/uploads/students/'), $image);
            $data = $req->except('pic');
            $data['image'] = $image;
            try{
                $studentStore = Student::query()->create($data);
            }catch (\Exception $e){
                dd($e);
            }
        }else{
            try{
                $studentStore = Student::query()->create($data);
            }catch (\Exception $e){
                dd($e);
            }
        }

        $getAcademicClass = AcademicClass::find($req->academic_class_id);

       $academic= StudentAcademic::create([
            'academic_class_id' => $req->academic_class_id,
            'student_id' => $studentStore->id,
            'session_id' => $getAcademicClass->session_id,
            'class_id' => $getAcademicClass->class_id,
            'section_id' => $getAcademicClass->section_id,
            'group_id' => $getAcademicClass->group_id,
            'shift_id' => 0,
            'rank' => $req->rank,
        ]);

        $father = Father::create([
            'f_name' => $req->f_name,
            'student_id' => $studentStore->id,
            'f_name_bn' => $req->f_name_bn,
            'f_mobile' => $req->f_mobile,
            'f_email' => $req->f_email,
            'f_dob' => $req->f_dob,
            'f_occupation' => $req->f_occupation,
            'f_nid' => $req->f_nid,
            'f_birth_certificate' => $req->f_birth_certificate,
        ]);

        $mother = Mother::create([
            'm_name' => $req->m_name,
            'student_id' => $studentStore->id,
            'm_name_bn' => $req->m_name_bn,
            'm_mobile' => $req->m_mobile,
            'm_email' => $req->m_email,
            'm_dob' => $req->m_dob,
            'm_occupation' => $req->m_occupation,
            'm_nid' => $req->m_nid,
            'm_birth_certificate' => $req->m_birth_certificate,
        ]);

        $guardian = Guardian::create([
            'g_name' => $req->g_name,
            'student_id' => $studentStore->id,
            'g_name_bn' => $req->g_name_bn,
            'g_mobile' => $req->g_mobile,
            'g_email' => $req->g_email,
            'g_dob' => $req->g_dob,
            'g_occupation' => $req->g_occupation,
            'g_nid' => $req->g_nid,
            'g_birth_certificate' => $req->g_birth_certificate,
        ]);

        return ['student'=>$studentStore,'notices'=>$academic,'father'=>$father,
            'mother'=>$mother,'guardian'=>$guardian];
    }


    public function show($id)
    {
        return Student::query()
            ->with('gender','religion',
            'city','division','country','location','academicClasses','father','mother','guardian')
            ->find($id);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
