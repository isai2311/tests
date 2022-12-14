<?php

namespace App\Http\Controllers\Usuario;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('usuarios.index');
    }
    public function listado(Request $request, $paginas = 10)
    {
        $campos = $request->all();
        $email = $request->input('email','');
        $id = $request->input('id','');
        $name = $request->input('name','');

        $usuario = User::query();

        if ($email != '') {
            $usuario = $usuario->where('email', 'LIKE', '%' . $email . '%');
        }
        if ($name != '') {
            $usuario = $usuario->where('name', 'LIKE', '%' . $name . '%');
        }
        if ($id != '') {
            $usuario = $usuario->where('id', $id);
        }
        $usuario = $usuario->paginate($paginas);

        return [
            'pagination' => [
                'total'        => $usuario->total(),
                'current_page' => $usuario->currentPage(),
                'per_page'     => $usuario->perPage(),
                'last_page'    => $usuario->lastPage(),
                'from'         => $usuario->firstItem(),
                'to'           => $usuario->lastItem(),
            ],
            'Usuario' => $usuario,
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
        $usuario = new User();
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->password = bcrypt($request->input('password'));
        $usuario->cUsuPerfil = 2;
        $usuario->save();
        return ['message' => 'Usuario creado','success' => true];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(User $usuario)
    {
        return $usuario;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        $campos = $request->all();
        $campos['password'] = bcrypt($request->input('password'));
        $usuario->update($campos);
        return ['message' => 'Usuario actualizado', 'success' => true];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        //
    }
}
