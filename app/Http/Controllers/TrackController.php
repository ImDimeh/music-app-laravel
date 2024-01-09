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
            'title' => ['required' , 'string' , 'max:255' ,  'unique:tracks.title'],
            'artist' => ['required' , 'string' , 'max:255'],
            'image' => ['required' , 'image' ],
            'music' => ['required' , 'file', 'extensions:mp3,wav' ],
            'display' => ['required' , 'boolean' ],
        ]);

        $uuid = Str::uuid();
        $extension = $request->image->extension();
        $imagePath = $request->image->storeAs('/tracks/images' , $uuid . '.' . $extension);
        Track::create([
            'title' => $request->title,
            'uuid' => 'trk-' . $uuid, // 'uuid' => '5d025a80-8515-11eb-9e1a-7f6e9e9d8c3d
            'artist' => $request->artist,
            'image' => $imagePath,
            'music' => $request->music->store('musics' , 'public'),
            'display' => $request->display,

        ]);

    }
}
