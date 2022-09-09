<?php

namespace App\Http\Traits;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

trait ApiResponser
{

  private function successResponse($data, $code){
    return response()->json($data, $code);
  }

  protected function errorResponse($message, $code){
    return response()->json(['error' => $message, 'code' => $code, 'success' => false], $code);
  }

  protected function showAll(Collection $collection, $code = 200){
    return $this->successResponse(['data' => $collection, 'success' => true], $code);
  }

  protected function showOne(Model $instance, $code = 200){
    return $this->successResponse(['data' => $instance, 'success' => true], $code);
  }
  protected function Mostrar( $instance, $code = 200){
    return $this->successResponse(['data' => $instance, 'success' => true], $code);
  }
  protected function mostrarMensaje( $mensaje, $code = 200){
    return $this->successResponse(['message' => $mensaje, 'success' => true], $code);
  }
}
