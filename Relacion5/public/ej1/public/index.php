<?php
declare(strict_types=1);
use Controllers\FrontController;

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../spl_autoload_register.php';

FrontController::main();