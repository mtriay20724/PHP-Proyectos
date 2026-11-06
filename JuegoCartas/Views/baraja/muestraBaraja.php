<?php
// $dirImg: ruta en el disco (la usa PHP para comprobar que el archivo existe)
// $dirImg: ruta en la URL (la usa el navegador para pedir la imagen)
$dirImg = __DIR__ . '/../../public/assets/img/';
$urlImg = 'assets/img/';
?>

    <h2><?= $titulo ?></h2>

<?php if (!is_dir($dirImg)): ?>

    <p>No tenemos imágenes (carpeta 'assets/img' no encontrada)</p>

<?php elseif (!isset($cartas) || count($cartas) === 0): ?>

    <p>No hay cartas para mostar.</p>

<?php else: ?>

    <p>Cartas mostradas: <?=count($cartas)?></p>

    <?php foreach ($cartas as $carta): ?>
        <?php $nombreImagen = $carta->getNombreImagen(); ?>

        <?php if (is_file($dirImg . $nombreImagen)): ?>
            <img src="<?=$urlImg . $nombreImagen ?>"
                 alt="Carta:"<?=$carta?>
                width="100"
            >
        <?php else: ?>
            <span>Sin imagen: <?= $carta ?></span>
        <?php endif; ?>

    <?php endforeach; ?>

<?php endif; ?>
<!--De momento imprimimos datos que genera nuestro propio código, por lo que no corren peligro.
Cuando mostremos datos que escribe el usuario (formularios, parámetros en la URL),
habrá que escaparlos con htmlspecialchars() para evitar que se inyecte código HTML o JavaScript.
Por ejemplo, pondremos: htmlspecialchars($urlImg)-->
