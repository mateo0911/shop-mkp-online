<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\SvcProductos;

class ProductoController extends Controller
{
    function index(SvcProductos $svcProductos)
    {
        $dataTemplate = [];
        $listaProductos = $svcProductos->getProducts();

        $dataTemplate["listaProductos"] = $listaProductos;
        return view("app.index", $dataTemplate);
    }

    function getLinksByProducts(Request $request, SvcProductos $svcProductos)
    {
        $infoProducto = $request->all();

        $idProducto = $infoProducto["idProducto"];

        $listaLinks = $svcProductos->getLinksMarketByProduct($idProducto);
    }
}

?>
