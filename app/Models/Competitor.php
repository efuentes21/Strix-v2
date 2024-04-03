<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Competitor extends Authenticatable
{
    use HasFactory;

    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dni',
        'email',
        'password',
        'name',
        'address',
        'birthdate',
        'sex',
        'points',
        'pro',
        'federation',
        'insurance',
        'partner',
        'active',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'birthdate' => 'date',
        'pro' => 'boolean',
        'partner' => 'boolean',
    ];

    public function races(){
        return $this->belongsToMany(Race::class, 'inscriptions', 'competitor', 'race');
    }

    public function insurance(){
        return $this->belongsTo(Insurance::class);
    }
}
