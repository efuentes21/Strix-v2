<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
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
        'name',         // Nombre del desafío
        'description',  // Descripción del desafío
        'difficulty',
        'active',
    ];

    public function races(){
        return $this->belongsToMany(Race::class, 'race_challenges', 'challenge', 'race');
    }
}
