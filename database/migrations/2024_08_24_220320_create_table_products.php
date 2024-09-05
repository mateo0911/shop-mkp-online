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
            , `id_categoria` INT(11) NOT NULL
            , `id_marca` INT(11) NOT NULL
            , `sku` varchar(100) NULL
            , `nombre_producto` varchar(200) NOT NULL
            , `descripcion` VARCHAR(500) NULL
            , `estado` VARCHAR(1) NOT NULL
            , PRIMARY KEY (`id_producto`)) ENGINE = InnoDB;");

        \DB::unprepared("CREATE TABLE `categorias`
            (`id_categoria` INT NOT NULL AUTO_INCREMENT
            , `nombre_categoria` varchar(400) NULL
            , `descripcion` varchar(500) NOT NULL
            , `estado` VARCHAR(1) NOT NULL
            , PRIMARY KEY (`id_categoria`)) ENGINE = InnoDB;");

        \DB::unprepared("CREATE TABLE `atributos`
            (`id_atributo` INT NOT NULL AUTO_INCREMENT
            , `nombre_atributo` varchar(400) NULL
            , `tipo_atributo` varchar(500) NOT NULL
            , `estado` VARCHAR(1) NOT NULL
            , PRIMARY KEY (`id_atributo`)) ENGINE = InnoDB;");

        \DB::unprepared("CREATE TABLE `productos_intermedio_atributos`
            (`id_producto_atributo` INT NOT NULL AUTO_INCREMENT
            , `id_producto` INT(11) NULL
            , `id_atributo` INT(11) NOT NULL
            , `valor` VARCHAR(400) NOT NULL
            , PRIMARY KEY (`id_producto_atributo`)) ENGINE = InnoDB;");

        \DB::unprepared("CREATE TABLE `marcas`
            (`id_marca` INT NOT NULL AUTO_INCREMENT
            , `nombre_marca` VARCHAR(200) NULL
            , `descripcion` VARCHAR(200) NOT NULL
            , `estado` VARCHAR(1) NOT NULL
            , PRIMARY KEY (`id_marca`)) ENGINE = InnoDB;");

        \DB::unprepared("CREATE TABLE `proveedores`
            (`id_proveedor` INT NOT NULL AUTO_INCREMENT
            , `nombre_proveedor` VARCHAR(200) NULL
            , `nit_proveedor` VARCHAR(50) NOT NULL
            , `estado` VARCHAR(1) NOT NULL
            , PRIMARY KEY (`id_proveedor`)) ENGINE = InnoDB;");

            \DB::unprepared("CREATE TABLE `inventario`
            (`id_inventario` INT NOT NULL AUTO_INCREMENT
            , `id_producto` INT(11) NULL
            , `cantidad` INT(30) NOT NULL
            , PRIMARY KEY (`id_inventario`)) ENGINE = InnoDB;");

        \DB::unprepared("CREATE TABLE `producto_imagen`
            (`id_producto_imagen` INT NOT NULL AUTO_INCREMENT
            , `id_producto` INT(11) NOT NULL
            , `imagen_producto` VARCHAR(1000) NOT NULL
            , PRIMARY KEY (`id_producto_imagen`)) ENGINE = InnoDB;");

        \DB::unprepared("ALTER TABLE productos_intermedio_atributos ADD FOREIGN KEY (id_producto) REFERENCES productos(id_producto)");
        \DB::unprepared("ALTER TABLE productos_intermedio_atributos ADD FOREIGN KEY (id_atributo) REFERENCES atributos(id_atributo)");
        \DB::unprepared("ALTER TABLE productos ADD FOREIGN KEY (id_categoria) REFERENCES categorias(id_categoria)");
        \DB::unprepared("ALTER TABLE productos ADD FOREIGN KEY (id_marca) REFERENCES marcas(id_marca)");
        \DB::unprepared("ALTER TABLE inventario ADD FOREIGN KEY (id_producto) REFERENCES productos(id_producto)");
        \DB::unprepared("ALTER TABLE producto_imagen ADD FOREIGN KEY (id_producto) REFERENCES productos(id_producto)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        \DB::unprepared("DROP TABLE categoria");
        \DB::unprepared("DROP TABLE productos_intermedio_atributos");
        \DB::unprepared("DROP TABLE proveedores");
        \DB::unprepared("DROP TABLE inventario");
        \DB::unprepared("DROP TABLE producto_imagen");
        \DB::unprepared("DROP TABLE productos");
        \DB::unprepared("DROP TABLE atributos");
        \DB::unprepared("DROP TABLE marcas");
    }
};
