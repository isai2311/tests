<?php

namespace App\Http\Controllers\Prueba;

use Collator;
use Exception;
use App\Models\User;
use Faker\Core\Color;
use App\Models\Prueba;
use App\Models\Pregunta;
use Illuminate\Http\Request;
use App\Imports\PreguntasImport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class PruebaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pruebas.index');
    }

    public function usuarios()
    {
        return User::all();
    }
    public function importarPreguntas(Request $request, Prueba $prueba){
        $path = $request->file('file');
        if ($path) {
            $data = Excel::import(new PreguntasImport($prueba), $path);
        }
    }
    public function paginate(Request $request, $paginas = 10)
    {
        $campos = $request->all();
        $descripcion = $request->input('Descripcion');
        $id = $request->input('id');
        $resultados = $request->input('Resultados');

        $prueba = Prueba::query();

        if ($descripcion != '') {
            $prueba = $prueba->where('Descripcion', 'LIKE', '%' . $descripcion . '%');
        }
        if ($id != '') {
            $prueba = $prueba->where('id', $id);
        }
        if ($resultados != '') {
            $prueba = $prueba->where('Resultados', $resultados);
        }

        $prueba = $prueba->paginate($paginas);

        return [
            'pagination' => [
                'total'        => $prueba->total(),
                'current_page' => $prueba->currentPage(),
                'per_page'     => $prueba->perPage(),
                'last_page'    => $prueba->lastPage(),
                'from'         => $prueba->firstItem(),
                'to'           => $prueba->lastItem(),
            ],
            'Prueba' => $prueba,
        ];
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
        $reglas = [
            'Resultados' => 'boolean|required',
            'Descripcion' => 'string|required',
            'preguntas.*.Descripcion' => 'string|required',
            'preguntas.*.Tipo' => 'integer|required',
            'preguntas.*.opciones.*.Pregunta' => 'string|required',
            'usuarios.*.id' => 'integer|nullable|exists:users,id',

        ];

        DB::beginTransaction();
        try{
            $this->validate($request, $reglas);
            $campos = $request->all();
            $prueba = Prueba::create($campos);
            $preguntas = $request->input('preguntas');
            foreach ($preguntas as $key => $pregunta) {
                $pregunta['Prueba'] = $prueba->id;
                $idPregunta = $prueba->Preguntas()->create($pregunta);
                $opciones = $request->input('preguntas.'.$key.'.opciones');
                foreach ($opciones as $key => $opcion) {
                    $idOpcion = $idPregunta->Opciones()->create($opcion);
                }

            }
            if(isset($campos['usuarios'])){
                $usuarios = $request->input('usuarios');
                $usuarios = collect($usuarios);
                $usuariosArray = $usuarios->pluck('id');
                $prueba->Usuarios()->sync($usuariosArray);
            }
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }

        return [
            'success' => true,
            'message' => 'Prueba creado correctamente'
        ];
    }

    public function downloadTemplateExcel()
    {
        $file = public_path('template/preguntas.xlsx');
        return response()->download($file);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prueba  $prueba
     * @return \Illuminate\Http\Response
     */
    public function show(Prueba $prueba)
    {
        return Prueba::with('Preguntas.Opciones','usuarios')->findOrFail($prueba->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prueba  $prueba
     * @return \Illuminate\Http\Response
     */
    public function edit(Prueba $prueba)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prueba  $prueba
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prueba $prueba)
    {
        $reglas = [
            'Resultados' => 'boolean|required',
            'Descripcion' => 'string|required',
            'pregunta.*.Descripcion' => 'string|required',
            'pregunta.*.Tipo' => 'integer|required',
            'pregunta.*.opciones.*.Correcta' => 'boolean|required',
            'pregunta.*.opciones.*.Pregunta' => 'string|required',
            'usuarios.*.id' => 'integer|nullable|exists:users,id',

        ];

        DB::beginTransaction();
        try{
            $this->validate($request, $reglas);
            $campos = $request->all();
            $prueba->update($campos);
            $preguntas = $request->input('preguntas');
            foreach ($preguntas as $key => $pregunta) {
                $pregunta['Prueba'] = $prueba->id;
                if (!isset($pregunta['id'])) {
                    $idPregunta = $prueba->Preguntas()->create($pregunta);
                }else{
                    $idPregunta = $prueba->Preguntas()->findOrFail($pregunta['id']);
                    $idPregunta->update($pregunta);
                }
                $opciones = $request->input('preguntas.'.$key.'.opciones');
                foreach ($opciones as $key => $opcion) {
                    if (!isset($opcion['id'])) {
                        $idOpcion = $idPregunta->Opciones()->create($opcion);
                    }else{
                        $idOpcion = $idPregunta->Opciones()->findOrFail($opcion['id']);
                        $idOpcion->update($opcion);
                    }
                }

            }

            if(isset($campos['usuarios'])){
                $usuarios = $request->input('usuarios');
                $usuarios = collect($usuarios);

                $usuariosArray = $usuarios->pluck('id');
                $prueba->Usuarios()->sync($usuariosArray);
            }
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }

        return [
            'success' => true,
            'message' => 'Prueba actualizado correctamente'
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prueba  $prueba
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prueba $prueba)
    {
        $prueba->Preguntas()->delete();
        $prueba->delete();

        return [
            'success' => true,
            'message' => 'Prueba borrada correctamente'
        ];
    }
}
