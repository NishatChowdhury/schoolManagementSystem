<?php

namespace App\Http\Controllers;

use App\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PlaylistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $playlists = Playlist::query()->paginate(20);
        return view('admin.playlist.index',compact('playlists'));
    }

    public function store(Request $request)
    {
        Playlist::query()->create($request->all());
        Session::flash('success','Playlist has been created');
        return redirect()->back();
    }

    public function show($id)
    {
        $playlist = Playlist::query()->findOrFail($id);
        //$videos = $playlist->videos;
        return view('admin.playlist.videos',compact('playlist'));
    }
}
