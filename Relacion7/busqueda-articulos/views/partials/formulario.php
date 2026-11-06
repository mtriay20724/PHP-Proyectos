<form action="index.php" method="get" class="formulario">
    <input type="hidden" name="controller" value="articulo">
    <input type="hidden" name="action" value="buscar">

    <label for="id">Identificador del artículo</label>
    <div class="fila">
        <input type="text" id="id" name="id"
               value="<?= htmlspecialchars($idBuscado ?? '', ENT_QUOTES, 'UTF-8') ?>"
               placeholder="Ej: 1, 2, 3 o 99">
        <button type="submit">Buscar</button>
    </div>
</form>
