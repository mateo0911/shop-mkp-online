<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    protected $table = "productos";

    protected $primaryKey = "id_producto";


    const CREATED_AT = null;
    const UPDATED_AT = null;
    protected $fillable = [
        "id_prodcuto",
        "sku",
        "nombre_producto",
        "descripcion",
        "precio",
        "precio_oferta",
        "categoria",
        "imagen_producto",
        "estado"
    ];
}
