<?php

namespace App\Http\Controllers;

use App\Notice;
use App\Repository\NoticeRepositories;
use App\Session;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    /**
     * @var NoticeRepositories
     */
    private $repositories;

    public function __construct(NoticeRepositories $repositories)
    {
        $this->middleware('auth');
        $this->repositories = $repositories;
    }

    public function index()
    {
        $notices = Notice::query()->get();
        $repository = $this->repositories;
        return view('admin.notice.index',compact('notices','repository'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'notice_type_id ' => 'required',
            'notice_category_id' => 'required',
            'title' =>  'required|unique|max:255',
            'description' => 'required',
            'start' => 'required|date',
            'end' => 'required|date'
        ]);

        if($request->has('file')){
            $file = date('YmdHis').'.'.$request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path().'/assets/files/notice/', $file);
            $data = $request->except('file');
            $data['file'] = $file;
            try{
                Notice::query()->create($data);
            }catch (\Exception $e){
                dd($e);
            }
        }else{
            Notice::query()->create($request->except('file'));
        }
        $request->session()->flash('success','Notice published successfully!');
        return redirect('admin/notices');
    }

    public function edit($id)
    {
        $notices = [];
        $notice = Notice::query()->findOrFail($id);
        $repository = $this->repositories;
        return view('admin.notice.edit',compact('notice','repository','notices'));
    }

    public function update($id, Request $request)
    {
        //dd($request->all());
        $notice = Notice::query()->findOrFail($id);

        if($request->has('file')){
            $file = date('YmdHis').'.'.$request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path().'/assets/files/notice/', $file);
            $data = $request->except('file');
            $data['file'] = $file;
            try{
                $notice->update($data);
            }catch (\Exception $e){
                dd($e);
            }
        }else{
            $notice->update($request->all());
        }

        //Notice::query()->create($request->all());
        $request->session()->flash('success','Notice updated successfully!');
        return redirect('admin/notices');
    }

    public function destroy($id)
    {
        $notice = Notice::query()->findOrFail($id);
        $notice->delete();
        \Illuminate\Support\Facades\Session::flash('success','Notice Deleted successfully');
        return redirect()->back();
    }
}
