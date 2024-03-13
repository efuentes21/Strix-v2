<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
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
        'cif',      // CIF de la aseguradora
        'name',     // Nombre de la aseguradora
        'address',  // Dirección de la aseguradora
        'price',    // Precio del seguro
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
        'price' => 'decimal:2', // Precio se casteará a tipo 'decimal' con 2 decimales
    ];

    public function races(){
        return $this->belongsToMany(Race::class, 'race_insurances');
    }
}
