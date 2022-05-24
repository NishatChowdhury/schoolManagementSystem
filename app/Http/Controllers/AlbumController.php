<?php

namespace App\Http\Controllers;

use App\Album;
use App\Repository\GalleryRepositories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AlbumController extends Controller
{
    /**
     * @var GalleryRepositories
     */
    private $repositories;

    public function __construct(GalleryRepositories $repositories)
    {
        $this->middleware('auth');
        $this->repositories = $repositories;
    }

    public function index()
    {
        $albums = Album::all();
        $repository = $this->repositories;
        return view('admin.gallery.album',compact('albums','repository'));
    }

    public function store(Request $request)
    {
        Album::query()->create($request->all());
        return redirect('gallery/albums');
    }

    public function destroy($id)
    {
        $album = Album::query()->findOrFail($id);
        $album->delete();
        return redirect('gallery/albums');
    }
}
