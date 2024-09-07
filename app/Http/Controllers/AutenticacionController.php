<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Service\SvcUsuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AutenticacionController extends Controller
{
    function validarLogin(Request $request, SvcUsuario $svcUsuario)
    {
        $validador = Validator::make($request->all(), [
            "email" => "required",
            "clave"   => "required"
        ]);

        if ($validador->fails()) {
            $this->agregarError($validador->errors()->jsonSerialize());
        } else {
            $datosFormulario = $request->all();
            $usuarioEncontrado = $svcUsuario->getUsuarioByEmail($datosFormulario["email"]);

            if (!empty($usuarioEncontrado)) {
                if (Hash::check($datosFormulario["clave"], $usuarioEncontrado["clave"])) {
                    session(["id_usuario" => $usuarioEncontrado["id_usuario"]]);
                    session(["usuario" => $usuarioEncontrado["usuario"]]);
                    session(["nombre_usuario" => $usuarioEncontrado["nombre"]]);
                    session(["email" => $usuarioEncontrado["email"]]);
                    session(['app_sesion' => 'xLXAiX0fFTjLKEiJam7X57']);
                    $this->responderSinError();
                } else {
                    $this->agregarError("Usuario o clave equivocadas");
                }
            } else {
                $this->agregarError("Usuario o clave equivocadas");
            }
        }
        return $this->devolverRespuesta();
    }

    function logout()
    {
        session_unset();
        Session::flush();
        return redirect('/');
    }
}
