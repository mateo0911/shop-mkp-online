<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\SvcUsuario;
class UsuarioController
{
    function cargarUsuario(SvcUsuario $svcUsuario)
    {
        $listaUsuarios = $svcUsuario->getListaUsuarios();
        $templateView = [];
        $templateView["listaUsuarios"] = $listaUsuarios;
        return view("app.usuarios", $templateView);
    }

    function getUsuarioById(Request $request, SvcUsuario $svcUsuario)
    {
        $idUsuario = $request->get("id_usuario") ?? "";
        if (!empty($idUsuario)) {
            $usuario = $svcUsuario->getUsuarioById($idUsuario);
            $listaUsuario = $svcUsuario->getListaUsuarios();
            $templateView = [];
            $templateView["usuario"] = $usuario;
            $templateView["listaUsuarios"] = $listaUsuario;
        }

        return view("app.usuarios", $templateView);
    }
}
