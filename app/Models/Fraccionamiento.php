<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fraccionamiento extends Model
{
    use HasFactory;
    
    protected $filltable =[
        'nombre'
    ];

    protected $table = 'fraccionamientos';

}
