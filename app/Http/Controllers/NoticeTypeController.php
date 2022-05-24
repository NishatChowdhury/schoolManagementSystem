<?php

namespace App\Http\Controllers;

use App\NoticeType;
use Illuminate\Http\Request;

class NoticeTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $types = NoticeType::all();
        return view('admin.notice.type',compact('types'));
    }
}
