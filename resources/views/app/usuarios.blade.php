<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TECHONLINE</title>
</head>
<body>
<form id="form-usuarios">
    <input type="hidden" name="id_usuario" id="id_usuario" val="{{$usuario["id_usuario"] ?? ""}}">
    <label for="">Usuario</label>
    <input type="text" name="usuario_nick" id="usuario_nick" value="{{$usuario["usuario"] ?? ""}}">
    <label for="">Nombre Usuario</label>
    <input type="text" name="usuario_nombre" id="usuario_nombre" value="{{$usuario["nombre"] ?? ""}}">
    <label for="">Numero Documento</label>
    <input type="text" name="num_doc" id="num_doc" value="{{$usuario["documento"] ?? ""}}">
    <label for="">Clave</label>
    <input type="password" name="clave" id="clave" value="">
    <label for="">Email</label>
    <input type="text" name="email" id="email" value="{{$usuario["email"] ?? ""}}">
    <label for="">Estado</label>
    <select name="estado" id="estado">
        <option value="">Seleccione Una Opcion</option>
        <option value="1">Activo</option>
        <option value="0">Inactivo</option>
    </select>

    <?php if (!empty($usuario["id_usuario"])) { ?>
        <button type="button" id="guardar_usuario">Crear</button>
    <?php } else { ?>
        <button type="button" id="actualizar_usuario"></button>
    <?php } ?>

</form>

<br>
<br>

<table>
    <thead>
    <tr>
        <th>Detallar</th>
        <th>Usuario</th>
        <th>Nombre Usuario</th>
        <th>Documento</th>
        <th>Email</th>
        <th>Estado</th>
    </tr>
    </thead>
    <tbody>
    @foreach($listaUsuarios as $lista)
        <tr>
            <td>
                <a href="{{URL::asset('usuario/getUsuario?id_usuario=') . $lista['id_usuario']}}">
                    <button type="button">DETALLAR</button>
                </a>
            </td>
            <td>{{$lista["usuario"]}}</td>
            <td>{{$lista["nombre"]}}</td>
            <td>{{$lista["documento"]}}</td>
            <td>{{$lista["email"]}}</td>
            <td>{{($lista["estado"] == 1 ? "Activo" : "Inactivo")}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables/jquery.dataTables.min.js"></script>

<script>
    jQuery("#guardar_usuario").on("click", () => {
        var formData = new FormData(jQuery("#form-usuarios")[0])
        axios.post("usuario/guardar", formData).then(function (resp) {
            if (resp.data.error == "0") {
                alert("Usuario Registrado con exito")
            } else {
                alert(resp.data.mensaje);
            }
        })
    });

    jQuery("#actualizar_usuario").on("click", () => {
        var formData = new FormData(jQuery("#form-usuarios")[0]);
        axios.post("usuario/actualizar", formData).then(function (resp) {

        });
    });
</script>
</body>
</html>
