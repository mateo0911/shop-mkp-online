<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Service\SvcUsuario;

class AutenticacionController extends Controller
{
    function validarLogin(Request $request)
    {
        $validador = Validator::make($request->all(), [
            "usuario" => "required",
            "clave"   => "required"
        ]);

        if ($validador->fails()) {
            $this->agregarError($validador->errors()->jsonSerialize());
        } else {
            $datosFormulario = $request->all();

        }
    }
}
