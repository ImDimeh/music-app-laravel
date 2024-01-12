<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\ApiKey;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\FlareClient\Api;

class ApiKeyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   

        // $user = request()->user();

        $apiKey = ApiKey::where('user_id', request()->user()->id)->get();
        // $apiKey = $user::where('user_id', $user->id)->get();
        // $ApiKey = ApiKey::where('user_id', request()->user()->id())->get();
        return Inertia::render('Api-Key/index', [
            'ApiKeys' => $apiKey,

        ]);
        //
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        // $ApiKey = ApiKey::where('user_id', request()->user()->id())->get();
        //
        return Inertia::render('Api-Key/Create', [
            // 'ApiKey' => $ApiKey,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $key = 'ply-' . Str::random(40);
        
        $request->validate([
            

            'name' => ['required', 'string', 'max:255'],

            // 'tracks.*' => ['required', 'string', 'exists:tracks,uuid'],
        ]);

      
        ApiKey::create([
            'uuid' => 'ply-' . Str::uuid(),
            
            'user_id' => $request->user()->id,
            'name' => $request->name,
            'key' => $key

        ]);
        // plus tard a garder
        // $ApiKey->tracks()->attach($tracks->pluck('id'));



        return redirect()->route('api-keys.create')->with('success', 'Playlist created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ApiKey $apiKey)
    {

        

      
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ApiKey $apiKey)
    {
        //
        $apiKey->delete();
        return redirect()->route('api-keys.index');
    }
}
