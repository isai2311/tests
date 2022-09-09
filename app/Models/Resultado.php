<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    use HasFactory;

    protected $table = 'resultado';

    protected $casts = [
        'Opcion' => 'integer',
        'Seleccionada' => 'boolean'
    ];

    protected $fillable = [
        'Opcion',
        'Seleccionada'
    ];

    public function Opcion()
    {
        return $this->belongsTo(Opcion::class, 'Opcion');
    }
}
