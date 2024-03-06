<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competitor extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dni',
        'name',
        'address',
        'birthdate',
        'pro',
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
        return $this->hasMany('\Apps\Models\Race');
    }

    public function insurance(){
        return $this->belongsTo('\Apps\Models\Insurance');
    }
}
