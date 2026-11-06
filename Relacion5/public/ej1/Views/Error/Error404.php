<?php

declare (strict_types=1);


use Lib\Pages;

/**
 * Muestra las páginas de error de la aplicación.
 * No se puede invocar desde la URL: el FrontController lo excluye.
 */
class ErrorController
{

    public static function show_error404(): void
    {
        http_response_code(404);

        (new Pages())->render('Error/Error404');
    }
}