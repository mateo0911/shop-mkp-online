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
    <label for="">Usuario</label>
    <input type="text" name="usuario_nick" id="usuario_nick">
    <label for="">Nombre Usuario</label>
    <input type="text" name="usuario_nombre" id="usuario_nombre">
    <label for="">Numero Documento</label>
    <input type="text" name="num_doc" id="num_doc">
    <label for="">Clave</label>
    <input type="password" name="clave" id="clave">
    <label for="">Email</label>
    <input type="text" name="email" id="email">
    <label for="">Estado</label>
    <select name="estado" id="estado">
        <option value="">Seleccione Una Opcion</option>
        <option value="1">Activo</option>
        <option value="0">Inactivo</option>
    </select>
    <button type="button" id="guardar_usuario">Crear</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables/jquery.dataTables.min.js"></script>

<script>
    jQuery("#guardar_usuario").on("click", () => {
        axios.post("usuario/guardar", {
            "usuario_nick": jQuery("#usuario_nick").val(),
            "nombre_usuario": jQuery("#usuario_nombre").val(),
            "documento": jQuery("#num_doc").val(),
            "clave": jQuery("#clave").val(),
            "email": jQuery("#email").val(),
            "estado": jQuery("#estado").val()
        }).then(function (resp) {
            if (resp.data.error == "0") {
                alert("Usuario Registrado con exito")
            } else {
                alert(resp.data.mensaje);
            }
        })
    });
</script>
</body>
</html>
