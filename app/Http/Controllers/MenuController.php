<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $parents = Menu::all()->pluck('name','id');
        $pages = Page::all()->pluck('name','id');
        $systemPages = [
            'contacts' => 'Contacts',
            'gallery' => 'Gallery',
            'notice' => 'Notice',
            'internal-result' => 'Internal Result',
            'teacher' => 'Teacher',
        ];
        $menus = Menu::query()
            ->where('menu_id',null)
            ->orderBy('order')
            ->get();
        return view('admin.menu.index',compact('parents','menus','pages','systemPages'));
    }

    public function store(Request $request)
    {
        Menu::query()->create($request->all());
        Session::flash('success','Menu added successfully');
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $parents = Menu::all()->pluck('name','id');
        $menu = Menu::query()->findOrFail($request->get('id'));
        $pages = Page::all()->pluck('name','id');
        $systemPages = [
            'contacts' => 'Contacts',
            'gallery' => 'Gallery',
            'notice' => 'Notice',
            'internal-result'=>'Internal Result',
            'teacher' => 'Teacher',
        ];
        $menus = Menu::query()
            ->where('menu_id',null)
            ->orderBy('order')
            ->get();
        return view('admin.menu.edit',compact('menu','pages','menus','parents','systemPages'));
    }

    public function update($id,Request $request)
    {
        $menu = Menu::query()->findOrFail($id);
        $menu->update($request->all());
        Session::flash('success','Page modified successfully!');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $menu = Menu::query()->findOrFail($id);
        $menu->delete();
        Session::flash('success','Menu has been deleted!');
        return redirect()->back();
    }
}
