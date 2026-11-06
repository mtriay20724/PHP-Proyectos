<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>9. Validación 2</title>
</head>
<body>
<?php
function e(?string $texto): string{
    return htmlspecialchars($texto ?? "", ENT_QUOTES, "UTF-8");
}
?>
    <form method="post" action="index.php?controller=formulario&action=procesar">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="formulario[nombre]" value="<?=e($candidato->nombre)?>" required>
        <?php if (isset($errores["nombre"])): ?>
            <span class="error" style="color: red;"><?= e($errores["nombre"]) ?></span>
        <?php endif; ?>

        <label for="apellidos">Apellidos</label>
        <input type="text" id="apellidos" name="formulario[apellidos]" value="<?=e($candidato->apellidos)?>" required>
        <?php if (isset($errores["apellidos"])): ?>
            <span class="error" style="color: red;"><?= e($errores["apellidos"]) ?></span>
        <?php endif; ?>

        <label for="correo">Correo electrónico</label>
        <input type="email" id="correo" name="formulario[correo]" value="<?=e($candidato->correo)?>" required>
        <?php if(isset($errores["correo"])): ?>
            <span class="error" style="color: red;"><?= e($errores["correo"]) ?></span>
        <?php endif; ?>
        <label for="telefono">Teléfono</label>
        <input type="tel" id="telefono" name="formulario[telefono]" value="<?=e($candidato->telefono)?>">
        <?php if(isset($errores["telefono"])): ?>
            <span class="error" style="color: red;"><?= e($errores["telefono"]) ?></span>
        <?php endif; ?>

        <p>Situación laboral actual</p>
        <input type="radio" id="desempleado" name="formulario[situacion]" value="Sin empleo" required>
        <label for="desempleado">Sin empleo</label><br>

        <input type="radio" id="media" name="formulario[situacion]" value="Media jornada">
        <label for="media">Media jornada</label><br>

        <input type="radio" id="completo" name="formulario[situacion]" value="Tiempo completo">
        <label for="completo">Tiempo completo</label><br><br>
        <?php if (isset($errores["situacion"])): ?>
            <span class="error" style="color: red;"><?= e($errores["situacion"]) ?></span>
        <?php endif; ?>

        <p>Lenguajes de programación que domina</p>
        <input type="checkbox" id="python" name="formulario[lenguajes][]" value="Python">
        <label for="python">Python</label>

        <input type="checkbox" id="php" name="formulario[lenguajes][]" value="PHP">
        <label for="php">PHP</label>

        <input type="checkbox" id="javascript" name="formulario[lenguajes[]]" value="JavaScript">
        <label for="javascript">JavaScript</label>

        <input type="checkbox" id="java" name="formulario[lenguajes][]" value="Java">
        <label for="java">Java</label>

        <input type="checkbox" id="cpp" name="formulario[lenguajes][]" value="C++">
        <label for="cpp">C++</label>
        <?php if (isset($errores["lenguajes"])): ?>
            <span class="error" style="color: red;"><?= e($errores["lenguajes"]) ?></span>
        <?php endif; ?>

        <label for="url">URL de trabajos anteriores</label>
        <input type="url" id="url" name="formulario[url]" value="<?=e($candidato->url)?>" required>
        <?php if (isset($errores["url"])): ?>
            <span class="error" style="color: red;"><?= e($errores["url"]) ?></span>
        <?php endif; ?>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
