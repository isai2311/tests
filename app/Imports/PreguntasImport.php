<?php

namespace App\Imports;

use App\Models\Opcion;
use App\Models\Pregunta;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PreguntasImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function __construct($prueba)
    {
        $this->prueba = $prueba;
    }
    public function model(array $row){
        $opciones = $row['opciones'];
        $opcionesArray = explode('|', $opciones);
        $pregunta = Pregunta::create([
          'Descripcion' => $row['pregunta'] ?? '',
          'Tipo' => 1,
          'Prueba' => $this->prueba->id,
        ]);
        foreach ($opcionesArray as $opcion) {
            Opcion::create([
                'Pregunta_id' => $pregunta->id,
                'Correcta' => false,
                'Pregunta' => $opcion,
            ]);
        }
        return $pregunta;
    }
}
