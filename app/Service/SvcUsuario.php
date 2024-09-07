<?php

namespace App\Service;

use Illuminate\Support\Facades\Log;
use App\Models\Usuario;
use Exception;

class SvcUsuario
{
    function Registrar($Info)
    {
        try {
            Usuario::create($Info);
            return true;
        } catch (Exception $e) {
            Log::channel("database")->info($e);
            return false;
        }
    }

    function getUsuarioByEmail($email)
    {
        try {
            $usuarioEncontrado = Usuario::select(
                "id_usuario",
                "usuario",
                "nombre",
                "documento",
                "clave",
                "email",
            )
                ->where("email", $email)
                ->where("estado", 1)
                ->get()
                ->first();

            return $usuarioEncontrado?->toArray() ?? [];
        } catch (Exception $e) {
            Log::channel("database")->info($e);
            return [];
        }
    }

    function getUsuarioById($id)
    {
        try {
            $usuarioEncontrado = Usuario::select(
                "id_usuario",
                "usuario",
                "nombre",
                "documento",
                "clave",
                "email",
            )
                ->where("id_usuario", $id)
                ->get()
                ->first();

            return $usuarioEncontrado?->toArray() ?? [];
        } catch (Exception $e) {
            Log::channel("database")->info($e);
            return [];
        }
    }

    function getListaUsuarios()
    {
        try {
            $listaUsuario = Usuario::all();
            return $listaUsuario;
        } catch (Exception $e) {
            Log::channel("database")->info($e);
            return [];
        }
    }
}
