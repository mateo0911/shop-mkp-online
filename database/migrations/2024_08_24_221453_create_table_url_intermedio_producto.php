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
        \DB::unprepared("CREATE TABLE `marketplace_intermedio_producto`
            (`id_mkp_intermedio_producto` INT NOT NULL AUTO_INCREMENT
            , `id_producto` INT(11) NULL
            , `link_mkp` VARCHAR(1000) NOT NULL
            , `nombre_market` VARCHAR(100) NOT NULL
            , `precio_producto_market` DOUBLE (12,2) NOT NULL
            , `estado` VARCHAR(1) NOT NULL
            , PRIMARY KEY (`id_mkp_intermedio_producto`)) ENGINE = InnoDB;");

        \DB::unprepared("ALTER TABLE marketplace_intermedio_producto ADD FOREIGN KEY (`id_producto`) REFERENCES productos(id_producto)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        \DB::unprepared("DROP TABLE marketplace_intermedio_producto");
    }
};
