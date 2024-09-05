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
        }
    }
}
