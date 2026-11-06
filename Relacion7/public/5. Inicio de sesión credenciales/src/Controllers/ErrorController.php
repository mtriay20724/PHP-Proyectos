<?php
declare(strict_types=1);

namespace Controllers;

use Lib\Pages;


/**
 * Muestra las páginas de error de la aplicación.
 * No se puede invocar desde la URL: el frontControler lo excluye.
 */
class ErrorController{
    /**
     * Error 404: el controlador o la acción solicitados no existen.
     */
    public static function show_error404(): void{
        http_response_code(404);

        (new Pages())->render('error/error404');
    }
}
