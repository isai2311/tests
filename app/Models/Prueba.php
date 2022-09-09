<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use stdClass;

class Prueba extends Model
{
    use HasFactory;
    protected $table = 'prueba';

    protected $casts = [
        'Resultados' => 'boolean'
    ];

    protected $fillable = [
        'Resultados',
        'Descripcion'
    ];

    public function Preguntas(){
        return $this->hasMany(Pregunta::class, 'Prueba');
    }
    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'pruebausuario', 'Prueba', 'Usuario');
    }
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($prueba) {
            $prueba->Preguntas->each(function ($pregunta) {
                $pregunta->Opciones->each(function ($opcion) {
                    $opcion->delete();
                });
                $pregunta->delete();
            });
        });
    }
}
