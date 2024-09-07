<?php

namespace App\Http\Controllers\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\SvcUsuario;

class UsuarioController extends Controller
{
    function Crear(Request $request, SvcUsuario $svcUsuario)
    {
        $validator = Validator::make($request->all(), [
            "usuario_nick"   => "required",
            "nombre_usuario" => "required",
            "documento"   => "required",
            "clave"   => "required",
            "email"   => "required",
        ]);

        if ($validator->fails()) {
            $this->agregarError($validator->errors()->jsonSerialize());
        } else {
            $datosFormulario = $request->all();
            $datosRegistrar = [];

            $datosRegistrar["usuario"] = $datosFormulario["usuario_nick"];
            $datosRegistrar["nombre"] = $datosFormulario["nombre_usuario"];
            $datosRegistrar["documento"] = $datosFormulario["documento"];
            $datosRegistrar["clave"] = Hash::make($datosFormulario["clave"]);
            $datosRegistrar["email"] = $datosFormulario["email"];
            $datosRegistrar["estado"] = $datosFormulario["estado"];

            $usuarioRegistrado = $svcUsuario->Registrar($datosRegistrar);

            if ($usuarioRegistrado) {
                $this->responderSinError();
            } else {
                $this->agregarError("Ocurrio un error al crear el usuario");
            }
        }

        return $this->devolverRespuesta();
    }

    function modificarUsuario(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "usuario_nick"   => "required",
            "nombre_usuario" => "required",
            "documento"   => "required",
            "email"   => "required",
        ]);

        if ($validator->fails()) {
            $this->agregarError($validator->errors()->jsonSerialize());
        } else {
            $datosFormulario = $request->all();

            if (!empty($datosFormulario["clave"])) {
                $claveNueva = Hash::make($datosFormulario["clave"]);
                $datosRegistrar["clave"] = $claveNueva;
            }
        }
    }
}
