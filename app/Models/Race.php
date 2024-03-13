<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * These attributes can be filled using mass assignment.
     *
     * @var array
     */
    protected $fillable = [
        'description',
        'unevenness',
        'map',
        'max_competitors',
        'distance',
        'date',
        'time',
        'start',
        'promotion',
        'inscription',
        'active',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * These attributes will be automatically cast to the specified types when accessed.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'date',
    ];

    public function sponsors(){
        return $this->hasMany(Sponsor::class);
    }

    public function competitors(){
        return $this->hasMany(Competitor::class);
    }

    public function challenges(){
        return $this->belongsToMany(Challenge::class, 'race_challenges', 'race', 'challenge');

    }
    
    public function insurances(){
        return $this->belongsToMany(Insurance::class, 'race_insurances', 'race', 'insurance');
    }
}
