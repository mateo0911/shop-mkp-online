<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketPlaceIntermedioProducto extends Model
{
    use HasFactory;

    protected $table = "marketplace_intermedio_producto";

    protected $primaryKey = "id_mkp_intermedio_producto";


    const CREATED_AT = null;
    const UPDATED_AT = null;
    protected $fillable = [
        "id_mkp_intermedio_producto",
        "id_producto",
        "link_mkp",
        "nombre_market",
        "estado"
    ];
}
