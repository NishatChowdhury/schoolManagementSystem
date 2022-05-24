<?php

namespace App\Http\Controllers;

use App\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $themes = Theme::query()->paginate(25);
        return view('admin.theme.index',compact('themes'));
    }
}
