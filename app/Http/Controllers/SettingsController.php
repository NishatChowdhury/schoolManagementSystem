<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function basicInfo()
    {
        return view('admin.settings.basicInfo');
    }

    public function notice()
    {
        return view('admin.settings.notice');
    }

    public function image()
    {
        return view('admin.settings.image');
    }

    public function configuredPage()
    {
        return view('admin.settings.configuredPage');
    }

    public function slider()
    {
        return view('admin.settings.slider');
    }
}
