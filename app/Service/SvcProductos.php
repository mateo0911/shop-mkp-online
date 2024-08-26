<?php

namespace App\Service;

use App\Models\Productos;
use App\Models\MarketPlaceIntermedioProducto;
use Illuminate\Support\Facades\Log;
use Exception;

class SvcProductos
{
    function getProducts()
    {
        try {
            $listaProductos = Productos::select(
                "p.id_producto",
                "p.sku",
                "p.nombre_producto",
                "p.descripcion",
                "p.categoria",
                "p.imagen_producto",
                "p.estado",
                "mip.id_mkp_intermedio_producto",
                "mip.link_mkp",
                "mip.nombre_market"
            )
                ->from("productos AS p")
                ->join("marketplace_intermedio_producto AS mip", "p.id_producto", "=", "mip.id_producto")
                ->where("p.estado", 1)
                ->get();

            return $listaProductos?->toArray();
        } catch (Exception $e) {
            Log::channel("database")->info($e);
        }
    }

    function getLinksMarketByProduct($id)
    {
        try {
            $listaLinks = MarketPlaceIntermedioProducto::select(
                "id_mkp_intermedio_producto",
                "id_producto",
                "link_mkp",
                "nombre_market",
                "precio_producto_market",
                "estado"
            )
                ->where("id_producto", $id)
                ->get();
            return $listaLinks?->toArray();
        } catch (Exception $e) {
            Log::channel("database")->info($e);
        }
    }

}
