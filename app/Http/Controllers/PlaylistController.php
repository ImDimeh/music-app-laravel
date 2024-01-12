<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Track;
use App\Models\Playlist;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\ValidationException;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = request()->user();
        $playlists = $user->playlists()->withCount('tracks')->get();
        
        return Inertia::render('Playlists/index' , [
            'playlists' => $playlists ,
        ]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $tracks = Track::where('display', true)->orderBy('title')->get();

        return Inertia::render('Playlists/Create' , [
            'tracks' => $tracks ,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'tracks' => ['required', 'array'],
            'tracks.*' => ['required', 'string']
            // 'tracks.*' => ['required', 'string', 'exists:tracks,uuid'],
        ]);
        
        $tracks = Track::whereIn('uuid', $request->tracks)->where('display' , true )->get();
        if($tracks->count() !== count($request->tracks)){
            throw  ValidationException::withMessages([
                'tracks' => 'Invalid track in array'
            ]);
            
        };
            $playlist = Playlist::create([
                'uuid' => 'ply-' . Str::uuid(),
                'title' => $request->title,
                'user_id' => $request->user()->id,
            ]);
            $playlist->tracks()->attach($tracks->pluck('id'));
            


        return redirect()->route('playlists.create')->with('success', 'Playlist created.');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Playlist $playlist)
    {
       
        //
        return Inertia::render('playlists/Show' , [
            'playlist' => $playlist ,
            
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Playlist $playlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Playlist $playlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Playlist $playlist)
    {
        //
    }
}
