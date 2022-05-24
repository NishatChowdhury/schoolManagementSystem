<?php

namespace App\Http\Controllers;

use App\NoticeCategory;
use Illuminate\Http\Request;

class NoticeCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = NoticeCategory::all();
        return view('admin.notice.category',compact('categories'));
    }

    public function store(Request $request)
    {
        NoticeCategory::query()->create($request->all());
        return redirect('notice/category');
    }
}
