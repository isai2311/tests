<?php
namespace App\Http\Traits;
trait ValidacionTrait {

    function folConsecutivo($valor){
       return preg_match("/^([0-9]{4}\-[0-9]{1,14})$/", $valor);
    }

    function fechaNac($valor){
      return preg_match("/^([0-9]{8})$/", $valor);
    }

    function soloNumeros($valor){
      return preg_match("/^([0-9]+)$/", $valor);
    }

    function soloLetrasNum($texto){
      return preg_match("/^([A-Z0-9]+)$/", $texto);
    }

    function soloDecimales($texto){
      return  preg_match("/^([0-9]{1,14}).([0-9]{2})$/", $texto);
    }

    function soloLetrasMay($texto){
      return preg_match("/^([A-ZÑ]+)$/", $texto);
    }

    function cambiarMay($texto){
      return strtoupper($texto);
    }

    function longitudExacta($cadena, $longitud){
      if(strlen($cadena) != $longitud)
        $estatus = 0;
      else
        $estatus = 1;
      return $estatus;
    }

    function soloCodigoPostal($texto){
      return preg_match("/^([0-9]{5})$/", $texto);
    }

    function soloLetrasNomb($texto){
      return preg_match("/^([A-ZÑ '.]{1,60})$/", $texto);
    }

    function identificaPais($texto){
      return preg_match("/^([A-Z]{2})$/", $texto);
    }

    function soloLetrasResidencia($texto, $limite){
      return preg_match("/^([A-ZÑ0-9\-,.:\/ ]{1,$limite})$/", $texto);
    }

    function longitudVariable($cadena, $longitud){
      if(strlen($cadena) > $longitud)
        $estatus = 0;
      else
        $estatus = 1;

      return $estatus;
    }

    function soloNumerosGuion($texto){
      return preg_match("/^([0-9\-]+)$/", $texto);
    }

    function convierteEspeciales($cadena){
      return str_replace( array('§', '¶', 'Æ', '~'), array(',', '°', '&quot;', "&#039;"), $cadena);
    }

    function longitudRango($cadena, $min, $max){
      $estatus = 0;
      if(strlen($cadena) >= $min && strlen($cadena) <= $max)
        $estatus = 1;
      return $estatus;
    }

    function quitarEspacios($cadena)
    {
        return preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $cadena);
    }

    function eliminarAcentos($string){
        $string = trim($string);

        $string = str_replace(
            array("á", "à", "ä", "â", "ª", "Á", "À", "Â", "Ä"),
            array("a", "a", "a", "a", "a", "A", "A", "A", "A"),
            $string
        );

        $string = str_replace(
            array("é", "è", "ë", "ê", "É", "È", "Ê", "Ë"),
            array("e", "e", "e", "e", "E", "E", "E", "E"),
            $string
        );

        $string = str_replace(
            array("í", "ì", "ï", "î", "Í", "Ì", "Ï", "Î"),
            array("i", "i", "i", "i", "I", "I", "I", "I"),
            $string
        );

        $string = str_replace(
            array("ó", "ò", "ö", "ô", "Ó", "Ò", "Ö", "Ô"),
            array("o", "o", "o", "o", "O", "O", "O", "O"),
            $string
        );

        $string = str_replace(
            array("ú", "ù", "ü", "û", "Ú", "Ù", "Û", "Ü"),
            array("u", "u", "u", "u", "U", "U", "U", "U"),
            $string
        );

        $string = str_replace(
            array("ñ", "Ñ", "ç", "Ç"),
            array("n", "N", "c", "C",),
            $string
        );

        return $string;
    }
}
