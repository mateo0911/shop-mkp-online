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

    function validarUsuario($usuario, $clave)
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
                ->where("usuario", $usuario)
                ->where("clave", $clave)
                ->where("estado", 1)
                ->get()
                ->first();

            return $usuarioEncontrado?->toArray() ?? [];
        } catch (Exception $e) {
            Log::channel("database")->info($e);
            return [];
        }

    }
}
