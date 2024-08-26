<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public $respuesta = ["error" => "1", "mensaje" => "", "data" => []];
    function agregarError($mensaje) {
        $this->respuesta["mensaje"] = $mensaje;
    }

    function responderSinError()
    {
        $this->respuesta["error"] = "0";
    }

    public function setData($valor, $nombreVar = "")
    {
        if (is_array($valor) && $nombreVar == "") {
            foreach ($valor as $key => $value) {
                $this->respuesta["data"][$key] = $value;
            }
        } else {
            if ($nombreVar == "") {
                $this->respuesta["data"] = $valor;
            } else {
                $this->respuesta["data"][$nombreVar] = $valor;
            }
        }
    }
    function devolverRespuesta()
    {
        return response()->json($this->respuesta);
    }
}
