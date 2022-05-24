<?php

namespace App\Http\Controllers;

use App\BloodGroup;
use App\Gender;
use App\Repository\StaffRepository;
use App\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * @var StaffRepository
     */
    private $repository;

    public function __construct(StaffRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }
    public function teacher()
    {
        $staffs = Staff::all()->sortBy('code');
        return view ('admin.staff.teacher', compact('staffs'));
    }

    public function addstaff()
    {
        $genders = Gender::all()->pluck('name', 'id');
        $blood_groups = BloodGroup::all()->pluck('name', 'id');
        return view ('admin.staff.addstaff', compact('genders', 'blood_groups'));
    }

    public function store_staff(Request $req){
        //dd($req->all());
        $this->validate($req,[
            'name' => 'required',
            'mobile' => 'required',
            'dob' => 'sometimes|date',
            'gender_id' => 'required',
            'blood_group_id' => 'required',
            'image' => 'sometimes|max:2000',
            //'mail' => 'sometimes|email',
            'code' => 'required',
            'title' => 'required',
            'role_id' => 'required',
            'job_type_id' => 'required',
            'staff_type_id' => 'required',
        ]);
        if ($req->hasFile('image')){
            $image = $req->code.'.'.$req->file('image')->getClientOriginalExtension();
            $req->file('image')->move(public_path().'/assets/img/staffs/', $image);
            $data = $req->except('image');
            $data['image'] = $image;
            //dd($data);
            Staff::query()->create($data);
            //dd('added');
        }else{
            Staff::query()->create($req->except('image'));
        }

        return redirect(route('staff.addstaff'))->with('success','Staff Saved Successfully');
    }

    public function edit_staff($id){
        $info = Staff::query()->findOrFail($id);
        $genders = Gender::all()->pluck('name', 'id');
        $blood_groups = BloodGroup::all()->pluck('name', 'id');
        return view ('admin.staff.editstaff', compact('genders', 'blood_groups','info'))->with('update',$info);
    }

    public function update_staff(Request $req){
        //dd($req->id);
        $this->validate($req,[
            'name' => 'required',
            'mobile' => 'required',
            'dob' => 'sometimes|date',
            'gender_id' => 'required',
            'blood_group_id' => 'required',
            'image' => 'sometimes|max:2000',
            //'mail' => 'sometimes|email',
            'code' => 'required',
            'title' => 'required',
            'role_id' => 'required',
            'job_type_id' => 'required',
            'staff_type_id' => 'required',
        ]);
        $staff = Staff::query()->findOrFail($req->id);
        if ($req->hasFile('image')){
            //unlink(public_path('/assets/img/staffs/').$is_exists->image);
            $image = $req->code.'.'.$req->file('image')->getClientOriginalExtension();
            $req->file('image')->move(public_path().'/assets/img/staffs/', $image);
            $data = $req->except('image');
            $data['image'] = $image;
            $staff->update($data);
        }else{
            $staff->update($req->all());
        }

        return redirect(route('staff.addstaff'))->with('success','Staff Saved Successfully');
    }

    public function delete_staff($id){
        $is_exists = Staff::query()->findOrFail($id);

        if ($is_exists->image != null){
            unlink(public_path('/assets/img/staffs/'.$is_exists->image));
        }
        $is_exists->delete();
        return redirect(route('staff.teacher'))->with('success','Staff Deleted Successfully');
    }
    public function threshold()
    {
        return view ('admin.staff.threshold');
    }

    public function kpi()
    {
        return view ('admin.staff.kpi');
    }

    public function payslip()
    {
        return view ('admin.staff.payslip');
    }

    public function staffProfile($staffId)
    {
        $staff = Staff::query()->findOrFail($staffId);
        return view('admin.staff.staffProfile',compact('staff'));
    }

}
