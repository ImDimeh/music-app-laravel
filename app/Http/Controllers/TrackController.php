<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Track;
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
}
