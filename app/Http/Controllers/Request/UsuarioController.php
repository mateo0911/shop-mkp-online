<?php

namespace App\Http\Controllers\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    function Crear(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "usuario_nick"   => "required",
            "usuario_nombre" => "required",
            "documento"   => "required",
            "clave"   => "required",
            "email"   => "required",
        ]);

        if ($validator->fails()) {
            $this->agregarError($validator->errors()->jsonSerialize());
        } else {

        }
    }
}
