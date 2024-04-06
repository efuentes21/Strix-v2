<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaceChallenge extends Model
{
    use HasFactory;
    protected $table = 'race_challenges';
    /**
     * The attributes that are mass assignable.
     *
     * These attributes can be filled using mass assignment.
     *
     * @var array
     */
    protected $fillable = [
        'race',
        'challenge',
        'position',
    ];

    public function races() {
        return $this->belongsTo(Race::class, 'race', 'id');
    }
    public function challenges() {
        return $this->belongsTo(Challenge::class, 'challenge', 'id');
    }
}
