<?php

namespace App\Http\Controllers\BMenu;

use App\Http\Controllers\Controller;
use App\Models\BMenu;
use App\Models\Perfiles;
use Illuminate\Http\Request;

class BMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permisos = Perfiles::find(auth()->user()->cUsuPerfil)->cPerPrivilegios;
        $arrayPermisos = explode(',', $permisos);
        $menuPadre = BMenu::Padre()->whereIn('cFolioMenu', $arrayPermisos)->orderBy('cIdMenu')->get();
        $resultado = $this->recorrido_hijos($menuPadre);
        return $resultado;
    }

    public function recorrido_hijos($menus){
      foreach ($menus as $key => $padre) {
        if($padre['cChildMenu']){
          $menuPadre = BMenu::Hijos()->where('cParentIdMenu', $padre->cIdMenu)->orderBy('cIdMenu')->get();
          $padre['hijos'] = $this->recorrido_hijos($menuPadre);
        }
      }
      return $menus;
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
     * @param  \App\Models\BMenu  $bMenu
     * @return \Illuminate\Http\Response
     */
    public function show(BMenu $bMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BMenu  $bMenu
     * @return \Illuminate\Http\Response
     */
    public function edit(BMenu $bMenu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BMenu  $bMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BMenu $bMenu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BMenu  $bMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(BMenu $bMenu)
    {
        //
    }
}
