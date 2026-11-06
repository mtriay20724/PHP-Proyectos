<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMULARIO BÁSICO</title>
</head>
<body>

    <form action="index.php?controller=formulario&action=procesar" method="post">
        <h1>Iniciar sesión</h1>
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario[usuario]" required>

        <label for="contraseña">Contraseña:</label>
        <input type="password" id="contraseña" name="usuario[contraseña]" required>

        <input type="submit" value="Entrar">
    </form>

</body>
</html>