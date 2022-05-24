<?php

namespace App\Http\Controllers;

use App\AcademicClass;
use App\AssignSubject;
use App\Classes;
use App\Group;
use App\Repository\StudentRepository;
use App\Section;
use App\Session;
use App\SessionClass;
use App\Staff;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InstitutionController extends Controller
{
    /**
     * @var StudentRepository
     */
    private $repository;

    public function __construct(StudentRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function academicyear()
    {
        $sessions = Session::all();
        return view ('admin.institution.academicyear', compact('sessions'));
    }

    public function academicyearstore(Request $request){
       return $request->all();
    }

    public function store_session(Request $request){
        //dd($request->all());
        $validator = Validator::make($request->all(),[
            'session' => 'required',
            'start' => 'required',
            'end' => 'required'
        ]);
        /*if ($validator->passes()){
            $data = [
                'year' => $request->year,
                'start' => $request->start,
                'end' => $request->end,
                'description' => $request->description,
            ];
        }*/
        $request['active'] = 0;
        Session::query()->create($request->all());
        return redirect('institution/academicyear')->with('success', 'Academic year added successfully');
    }

    public function edit_session(Request $request){
        $session = Session::query()->findOrFail($request->session_id);
        return $session;
    }

    public function update_session(Request $request){
        $session = Session::query()->findOrFail($request->session_id);
        $session->update($request->all());
        return redirect('institution/academicyear')->with('success', 'Academic year Updated');
    }

    public function delete_session($id){
         $session = Session::query()->findOrFail($id);
         $session->delete();
         return redirect('institution/academicyear')->with('success', 'Academic Year Deleted Successfully');
    }

    public function sessionStatus($id){
         $session = Session::query()->findOrFail($id);
         if($session->active == 0){
             $session->update(['active'=>1]);
         }else{
             $session->update(['active'=>0]);
         }
         return redirect('institution/academicyear')->with('success', 'Status change successfully!');
    }

    public function section_group()
    {
        $sections = Section::all();
        $groups = Group::all();
        return view ('admin.institution.section-group', compact('sections', 'groups'));
    }

    public function create_section(Request $req){
        Section::query()->create($req->all());
        return redirect('institution/section-groups')->with('success', 'Section added successfully');
    }

    public function edit_section(Request $req){
        $section = Section::query()->findorFail($req->id);
        return $section;
    }

    public function update_section(Request $req){
        $section = Section::query()->findOrFail($req->id);
        $section->update(['name' => $req->section_name]);
        return redirect('institution/section-groups')->with('success', 'Section has been Updated');
    }

    public function delete_section($id){
        $section= Section::query()->findOrFail($id);
        $section->delete();
        return redirect('institution/section-groups')->with('success', 'Section deleted successfully');
    }

    public function create_group(Request $req){
        Group::query()->create($req->all());
        return redirect('institution/section-groups')->with('success', 'Group added successfully');
    }

    public function edit_group(Request $req){
        $data = Group::query()->findorFail($req->id);
        return $data;
    }

    public function update_group(Request $req){
        $data = Group::query()->findOrFail($req->group_id);
        $info = ['name' => $req->group_name];
        $data->update($info);
        return redirect('institution/section-groups')->with('success', 'Group has been Updated');
    }

    public function delete_grp($id){
        $group = Group::query()->findOrFail($id)->first();
        $group->delete();
        return redirect('institution/section-groups')->with('success', 'Group deleted successfully');
    }
    /*Institute >> Section-Groups End*/


    public function academicClasses()
    {
        $classes = AcademicClass::all()->whereIn('session_id',activeYear());
        $repository = $this->repository;
        return view ('admin.institution.academicClasses', compact('classes','repository'));
    }

    public function storeAcademicClass(Request $req){
        AcademicClass::query()->create($req->all());
        return redirect('institution/academic-class');
    }

    public function editAcademicClass(Request $request)
    {
       $data = AcademicClass::query()->findOrFail($request->id);
       return $data;
    }

    public function updateAcademicClass(Request $request)
    {
        $data = AcademicClass::query()->findOrFail($request->id);
        $data->update($request->all());
        return redirect('institution/academic-class');

    }

    public function classes()
    {
        $classes = Classes::all();

        return view ('admin.institution.classes', compact('classes'));
    }

    public function store_class(Request $req){
        //dd($req->all());
        Classes::query()->create($req->all());
        return redirect('institution/class');
    }

    public function edit_SessionClass(Request $req){
        $class = Classes::query()->findOrFail($req->id);
        return $class;
    }

    public function update_SessionClass(Request $req){
        $class = Classes::query()->findOrFail($req->id);
        $class->update($req->all());
        return redirect(route('institution.classes'))->with('success', 'Class has been Updated');
    }

    public function delete_SessionClass($id){
        $class = Classes::query()->findOrFail($id);
        $class->delete();
        return redirect('institution/class')->with('success', 'Class has been Deleted');
    }

    /*Subjects Start*/
    public function subjects()
    {
        $subjects = Subject::all();
        return view ('admin.institution.subjects', compact('subjects'));
    }

    public function create_subject(Request $request){
        Subject::create($request->all());
        return redirect('institution/subjects')->with('success', 'Subject Added Successfully');
    }

    public function edit_subject(Request $req){
        $subject = Subject::findOrFail($req->id);
        return $subject;
    }

    public function update_subject(Request $req){
        $subject = Subject::findOrFail($req->id);
        $subject->update($req->all());
        return redirect('institution/subjects')->with('success', 'Class has been Updated');
    }

    public function delete_subject($id){
        $subject = Subject::findOrFail($id);
        $subject->delete();
        return redirect('institution/subjects')->with('success', 'Class has been Deleted');
    }
    /*Subjects End*/

    public function classSubjects($classId)
    {
        $class = AcademicClass::query()->findOrFail($classId);
        //$classes = AcademicClass::all()->pluck('name', 'id');
        $subjects = Subject::all();
        //$staffs = Staff::all()->pluck('name','id');
        $assignedSubjects = AssignSubject::query()->where('academic_class_id',$classId)->get();
        return view ('admin.institution.classsubjects', compact( 'subjects','assignedSubjects','class'));
    }

    public function assign_subject(Request $request){

        // delete unassigned subjects starts
        $deletable = AssignSubject::query()
            ->where('academic_class_id',$request->academic_class_id)
            ->whereNotIn('subject_id',$request->subjects)
            ->get();
        foreach($deletable as $delete){
            $delete->delete();
        }
        // delete unassigned subjects ends

        foreach($request->subjects as $subject){
            $data['academic_class_id'] = $request->academic_class_id;
            $data['subject_id'] = $subject;

            $isExist = AssignSubject::query()
                ->where('academic_class_id',$request->academic_class_id)
                ->where('subject_id',$subject)
                ->exists();

            if(!$isExist){
                AssignSubject::query()->create($data);
            }
        }

        //AssignSubject::query()->create($request->all());

        //return redirect('institution/subjects/classsubjects')->with('success', 'Subjects assigned Successfully');
        return redirect()->back();
    }

//    public function unAssignSubject($id)
//    {
//        $subject = AssignSubject::query()->findOrFail($id);
//        $subject->delete();
//        \Illuminate\Support\Facades\Session::flash('success','Subject unmount successfully');
//        return redirect()->back();
//    }

    public function signature()
    {
        return view('admin.institution.signature');
    }

    public function sig(Request $request)
    {
        $this->validate($request,[
            'signature' => 'required|mimetypes:image/png'
        ]);
        $image = 'signature.png';
        $request->file('signature')->move(public_path().'/assets/img/signature/', $image);
        return redirect()->back();
    }

    public function profile()
    {
        return view ('admin.institution.profile');
    }
}
