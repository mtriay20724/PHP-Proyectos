<?php require __DIR__ . '/partials/header.php'; ?>

<section class="tarjeta">
    <h2><?= htmlspecialchars($articulo['nombre'], ENT_QUOTES, 'UTF-8') ?></h2>
    <dl>
        <dt>ID</dt>
        <dd><?= htmlspecialchars((string)$articulo['id'], ENT_QUOTES, 'UTF-8') ?></dd>

        <dt>Descripción</dt>
        <dd><?= htmlspecialchars($articulo['descripcion'], ENT_QUOTES, 'UTF-8') ?></dd>

        <dt>Precio</dt>
        <dd><?= htmlspecialchars(number_format($articulo['precio'], 2, ',', '.'), ENT_QUOTES, 'UTF-8') ?> €</dd>
    </dl>
</section>

<h3>Nueva búsqueda</h3>
<?php require __DIR__ . '/partials/formulario.php'; ?>

<?php require __DIR__ . '/partials/footer.php'; ?>
