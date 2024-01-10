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

        return Inertia::render('Tracks/Index', [
            'tracks' => $tracks
        ]);
    }
    public function create()
    {

        return Inertia::render('Tracks/Create');
    }
    public function store(Request $request)
    {
    }
    public function edit(Track $track)
    {

        return Inertia::render('Tracks/edit', [
            'track' => $track
        ]);
    }


    public function update(Request $request, Track $track)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'artist' => ['required', 'string', 'max:255'],
            'display' => ['required','boolean']
        ]);


        $track->title = $request->title;
        $track->artist = $request->artist;
        $track->display = $request->display;

        $track->save();
        // ou
        // $track->update([
        //     'title' => $request->title,
        //     'artist' => $request->artist,
        //     'display' => $request->display,
        // ]);

        return redirect()->route('tracks.index');
    }

    public function destroy(Track $track)
    {
        $track->delete();
        return redirect()->route('tracks.index');

    }
}
