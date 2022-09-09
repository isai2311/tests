<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opcion extends Model
{
    use HasFactory;

    protected $table = 'opcion';

    protected $casts = [
        'Correcta' => 'boolean'
    ];

    protected $fillable = [
        'Pregunta',
        'Correcta',
        'Pregunta_id',
    ];
}
