<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Track;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    //
    public function index()

    {

        $tracks = Track::all();
        
        return Inertia::render('Tracks/Index' , [
            'tracks' => $tracks
        ]);
    }
    public function create()
    {
        
        return Inertia::render('Tracks/Create');
    }
    public function store(Request $request)
    {

        
        $request->validate([
            'title' => ['required' , 'string' , 'max:255' ,  'unique:tracks,title'],
            'artist' => ['required' , 'string' , 'max:255'],
            'image' => ['required' , 'image' ],
            'music' => ['required' , 'file', 'extensions:mp3,wav' ],
            'display' => ['required' , 'boolean' ],
        ]);

        $uuid = 'trk-'  . Str::uuid();
        $imageExtension = $request->image->extension();
        $imagePath = $request->image->storeAs('/tracks/images' , $uuid . '.' . $imageExtension);

        $musicExtension = $request->music->extension();
        $musicPath = $request->music->storeAs('/tracks/musics' , $uuid . '.' . $musicExtension);


        Track::create([
            'title' => $request->title,
            'uuid' =>  $uuid, // 'uuid' => '5d025a80-8515-11eb-9e1a-7f6e9e9d8c3d
            'artist' => $request->artist,
            'image' => $imagePath,
            'music' => $musicPath,
            'display' => $request->display,

        ]);
        return redirect()->route('tracks.index');

    }
}
