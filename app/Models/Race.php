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
        return $this->hasMany('\Apps\Models\Sponsor');
    }

    public function competitors(){
        return $this->hasMany('\Apps\Models\Competitors');
    }

    public function challenges(){
        return $this->hasMany('\Apps\Models\Challenges');
    }
}
