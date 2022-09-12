@extends('layouts.layout')

@section('content')
    <div id="pruebas">
        <div class="row">
            <h4>{{ $prueba->Descripcion }}</h1>
            <div class="col-md-12">
                @foreach ($prueba->Preguntas as $pregunta)
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary"> {{ $pregunta->Descripcion }}</h6>
                            </div>
                            <div class="row">
                                <div class="col-md-12">

                                    <label for="respuesta">Respuesta</label>
                                        @foreach ($pregunta->Opciones as $opcion)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                {{ $opcion->Pregunta }}
                                            </label>
                                          </div>
                                        @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                @endforeach
            </div>
        </div>
    </div>
@endsection
