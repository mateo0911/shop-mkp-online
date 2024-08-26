<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechStore - Tu tienda en línea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2ecc71;
            --accent-color: #e74c3c;
            --text-color: #34495e;
            --light-bg: #ecf0f1;
        }

        body {
            font-family: 'Roboto', sans-serif;
            color: var(--text-color);
        }

        .navbar {
            background-color: var(--primary-color);
        }

        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://via.placeholder.com/1920x600');
            background-size: cover;
            color: white;
            padding: 100px 0;
            margin-bottom: 2rem;
        }

        .card {
            transition: transform 0.3s;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-success {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .filter-section {
            background-color: var(--light-bg);
            border-radius: 10px;
            padding: 20px;
        }
    </style>
</head>
<body>
<!-- Navbar
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#">TechStore</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Productos</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Ofertas</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contacto</a></li>
            </ul>
        </div>
    </div>
</nav> -->

<!-- Hero Section
<div class="hero-section text-center">
    <div class="container">
        <h1 class="display-4">Bienvenido a TechStore</h1>
        <p class="lead">Descubre los mejores productos tecnológicos al mejor precio</p>
    </div>
</div> -->

<div class="container" style="margin-top: 50px;">
    <div class="row">
        <!-- Columna de filtros -->
        <div class="col-md-3 mb-4">
            <div class="filter-section">
                <h2 class="h4 mb-4">Buscqueda Mas Especifica</h2>
                <form id="filter-form">
                    <!-- Filtro de categorías -->
                    <div class="mb-4">
                        <h3 class="h5 mb-3"><i class="fas fa-tags me-2"></i>Categorías</h3>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="categories[]" value="electronica" id="cat-electronica">
                            <label class="form-check-label" for="cat-electronica">Electrónica</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="categories[]" value="computadoras" id="cat-computadoras">
                            <label class="form-check-label" for="cat-computadoras">Computadoras</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="categories[]" value="audio" id="cat-audio">
                            <label class="form-check-label" for="cat-audio">Audio</label>
                        </div>
                    </div>
                    <!-- Filtro de precio -->
                    <div class="mb-4">
                        <h3 class="h6 mb-3"><i class="fas fa-dollar-sign me-2"></i>Precio</h3>
                        <div class="row">
                            <div class="col">
                                <input type="number" name="min_price" placeholder="Min" class="form-control">
                            </div>
                            <div class="col">
                                <input type="number" name="max_price" placeholder="Max" class="form-control">
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary w-100"><i class="fas fa-filter me-2"></i>Aplicar filtros</button>
                </form>
            </div>
        </div>
        <!-- Columna de productos -->
        <div class="col-md-9">
            <div id="products-container" class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($listaProductos as $producto)
                    <div class="col fade-enter">
                        <div class="card h-100">
                            <input type="hidden" id="idProducto" value="{{$producto["id_producto"]}}">
                            <img src="{{$producto["imagen_producto"]}}" class="card-img-top" alt="{{$producto["nombre_producto"]}}">
                            <div class="card-body">
                                <h5 class="card-title">{{$producto["nombre_producto"]}}</h5>
                                <p class="card-text">{{$producto["descripcion"]}}</p>
                                <p class="card-text"><strong class="text-primary">{{$producto["precio"]}}</strong></p>
                            </div>
                            <div class="card-footer bg-white border-top-0">
                                <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-info-circle me-1"></i>Ver detalles</a>
                                <button type="button" class="btn btn-success btn-sm " style="text-transform: uppercase;"><i class="fas fa-cart-plus me-1"></i>Comprar</button>
                                <a href="#" class="btn btn-success btn-sm botonModalProducto" data-codigo="{{$producto["id_producto"]}}" style="text-transform: uppercase"><i class="fas fa-cart-plus me-1"></i>Comprar</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <!--<div id="pagination-container" class="mt-4">
                <nav>
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <span class="page-link">Anterior</span>
                        </li>
                        <li class="page-item active"><span class="page-link">1</span></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Siguiente</a>
                        </li>
                    </ul>
                </nav>
            </div> -->
        </div>
    </div>
</div>

<div class="modal fade" id="modalMKP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal con Botones</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-center mb-4">Selecciona una opción:</p>
                <div class="d-flex justify-content-center flex-wrap gap-2">
                    <button type="button" class="btn btn-primary">Opción 1</button>
                    <button type="button" class="btn btn-success">Opción 2</button>
                    <button type="button" class="btn btn-info">Opción 3</button>
                    <button type="button" class="btn btn-warning">Opción 4</button>
                    <button type="button" class="btn btn-danger">Opción 5</button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-white mt-5 py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>TechStore</h5>
                <p>Tu tienda en línea de confianza para productos tecnológicos.</p>
            </div>
            <div class="col-md-4">
                <h5>Enlaces rápidos</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white">Sobre nosotros</a></li>
                    <li><a href="#" class="text-white">Términos y condiciones</a></li>
                    <li><a href="#" class="text-white">Política de privacidad</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Contáctanos</h5>
                <p><i class="fas fa-envelope me-2"></i>info@techstore.com</p>
                <p><i class="fas fa-phone me-2"></i>(123) 456-7890</p>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>

<script>
    jQuery(".botonModalProducto").on("click", function () {
        let idProducto = jQuery(this).data("codigo");
        axios.post("getLinkMarket",
            {
                "idProducto" : idProducto
            }
        ).then(function (resp) {

        });
        jQuery("#modalMKP").modal("show");
    });
</script>
</body>
</html>
