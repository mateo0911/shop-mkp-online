<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form id="form-login">
    <label for="">Email</label>
    <input type="text" name="email" id="email">
    <label for="">Clave</label>
    <input type="password" name="clave" id="clave">
    <button type="button" id="iniciar_sesion">Iniciar</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables/jquery.dataTables.min.js"></script>
<script>
    axios.defaults.baseURL = "{{URL::asset('')}}"
    jQuery("#iniciar_sesion").on("click", () => {
        axios.post("autentica", {
            "email" : jQuery("#email").val(),
            "clave" : jQuery("#clave").val()
        }).then((resp) => {
            if (resp.data.error == "0") {
                {{--window.location.href = "{{URL::asset("")}}";--}}
                alert("inicio correcto");
            } else {
                alert(resp.data.mensaje);
            }
        });
    });
</script>
</body>
</html>
