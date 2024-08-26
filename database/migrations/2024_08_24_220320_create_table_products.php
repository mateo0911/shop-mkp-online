<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        \DB::unprepared("CREATE TABLE `productos`
            (`id_producto` INT NOT NULL AUTO_INCREMENT
            , `sku` varchar(100) NULL
            , `nombre_producto` varchar(200) NOT NULL
            , `descripcion` VARCHAR(500) NULL
            , `precio` double (12,2) NOT NULL
            , `precio_oferta` double (12,2) NULL
            , `categoria` VARCHAR(100) NOT NULL
            , `imagen_producto` VARCHAR(500) NOT NULL
            , `estado` VARCHAR(1) NOT NULL
            , PRIMARY KEY (`id_producto`)) ENGINE = InnoDB;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        \DB::unprepared("DROP TABLE productos");
    }
};
