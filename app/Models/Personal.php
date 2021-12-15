<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'telefono',
        'direccion',
        'tipo',
        'ine',
        'servicio',
        'idr',
        'fraccionamiento',
        ];
    
    protected $table = 'personal';
}
