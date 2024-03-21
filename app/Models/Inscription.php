<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
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
        'race',
        'competitor',
        'number',
        'arrival',
        'insurance',
    ];

    public function races() {
        return $this->belongsTo(Race::class, 'race', 'id');
    }
    public function competitors() {
        return $this->belongsTo(Competitor::class, 'competitor', 'id');
    }
    public function insurances() {
        return $this->belongsTo(Insurance::class, 'insurance', 'id');
    }
}
