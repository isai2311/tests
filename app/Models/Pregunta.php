<?php

namespace App\Models;

use stdClass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pregunta extends Model
{
    use HasFactory;
    protected $table = 'pregunta';
    protected $appends = array('opcion');

    protected $casts = [
        'Tipo' => 'integer',
        'Punto' => 'integer'
    ];

    protected $fillable = [
        'Tipo',
        'Punto',
        'Descripcion',
        'Prueba'
    ];

    public function Opciones(){
        return $this->hasMany(Opcion::class, 'Pregunta_id');
    }
    public function getOpcionAttribute()
    {
        $opcion = new stdClass();
        $opcion->Correcta = false;
        $opcion->Pregunta = "";
        $opcion->id = "";

        return $opcion;
    }
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($pregunta) {
            $pregunta->Opciones->each(function ($opcion) {
                $opcion->delete();
            });
        });
    }
}
