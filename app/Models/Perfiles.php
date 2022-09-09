<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfiles extends Model
{
    use HasFactory;

    protected $table = 'tPerfiles';
    protected $primaryKey = 'cPerFolio';
    public $timestamps = false;

    protected $fillable = [
        'cPerDescripcion',
        'cPerPrivilegios',
        'cPerEstatus',
        'cPerNotificaciones',
        'cPerAdmin'
    ];
}
