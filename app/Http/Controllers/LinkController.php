<?php

namespace App\Http\Controllers;

use App\ImportantLink;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $links = ImportantLink::all();
        return view('admin.settings.links',compact('links'));
    }

    public function store(Request $request)
    {
        ImportantLink::query()->create($request->all());
        return redirect('settings/links');
    }

    public function destroy($id)
    {
        $link = ImportantLink::query()->findOrFail($id);
        $link->delete();
        return redirect('settings/links');
    }
}
