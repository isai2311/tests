<?php

namespace App\Http\Controllers\API;

use App\Models\Opcion;
use App\Http\Controllers\ApiController;
use App\Models\Pregunta;
use Illuminate\Http\Request;

class OpcionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Pregunta $pregunta)
    {
        if (!$pregunta->exists) {
            return $this->errorResponse('La pregunta no existe', 404);
        }
        return $this->Mostrar($pregunta->opciones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Opcion  $opcion
     * @return \Illuminate\Http\Response
     */
    public function show(Opcion $opcion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Opcion  $opcion
     * @return \Illuminate\Http\Response
     */
    public function edit(Opcion $opcion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Opcion  $opcion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Opcion $opcion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Opcion  $opcion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Opcion $opcion)
    {
        //
    }
}
