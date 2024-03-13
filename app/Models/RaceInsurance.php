<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaceInsurance extends Model
{
    use HasFactory;
    protected $table = 'race_insurances';
    /**
     * The attributes that are mass assignable.
     *
     * These attributes can be filled using mass assignment.
     *
     * @var array
     */
    protected $fillable = [
        'race',
        'insurance',
    ];

    public function races() {
        return $this->belongsTo('\App\Models\Race', 'race', 'id');
    }
    public function insurances() {
        return $this->belongsTo('\App\Models\Insurance', 'insurance', 'cif');
    }
}
