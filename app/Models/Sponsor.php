<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
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
        'cif',          // CIF del patrocinador
        'name',         // Nombre del patrocinador
        'logo',         // Logo del patrocinador
        'address',      // Dirección del patrocinador
        'principal',    // Indica si el patrocinador es principal o no
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * These attributes will be automatically cast to the specified types when accessed.
     *
     * @var array
     */
    protected $casts = [
        'principal' => 'boolean', // El campo 'principal' se casteará a tipo booleano
    ];
}
