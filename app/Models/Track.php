<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'title',
        'image',
        'artist',
        'music',
        'display',
        'play_Count'



    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
