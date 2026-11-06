<?php require __DIR__ . '/partials/header.php'; ?>

<section class="tarjeta error">
    <h2><?= htmlspecialchars($titulo ?? 'Error', ENT_QUOTES, 'UTF-8') ?></h2>
    <p><?= htmlspecialchars($mensaje ?? 'Ha ocurrido un error.', ENT_QUOTES, 'UTF-8') ?></p>
    <p class="codigo">Código HTTP: <?= (int) http_response_code() ?></p>
</section>

<h3>Nueva búsqueda</h3>
<?php require __DIR__ . '/partials/formulario.php'; ?>

<?php require __DIR__ . '/partials/footer.php'; ?>
