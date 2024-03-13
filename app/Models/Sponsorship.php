<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    use HasFactory;
    protected $table = 'sponsorships';
    /**
     * The attributes that are mass assignable.
     *
     * These attributes can be filled using mass assignment.
     *
     * @var array
     */
    protected $fillable = [
        'race',
        'sponsor',
    ];

    public function races() {
        return $this->belongsTo(Race::class, 'race', 'id');
    }
    public function sponsors() {
        return $this->belongsTo(Sponsor::class, 'sponsor', 'id');
    }
}
