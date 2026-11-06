<?php
declare(strict_types=1);

namespace Controllers;
use Lib\Pages;
use Requests\FormularioRequest;
use Models\Usuario;

class FormularioController{
    private Pages $pages;

    public function __construct(){
        $this->pages = new Pages();
    }

    public function index(): void{
        $this->pages->render("contacto/formulario");
    }

    public function enviarPaginaBienvenido(): void{
        $this->pages->render("contacto/bienvenido");
        exit;
    }

    public function procesar(): void{
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            header("Location: index.php?controller=formulario&action=index");
            exit;
        }

        $usuarioValido = [
            "usuario"=>"usuario",
            "contraseña"=>password_hash("1234", PASSWORD_BCRYPT)
        ];

        if ($_POST["usuario"]["usuario"] === $usuarioValido["usuario"] && password_verify($_POST["usuario"]["contraseña"],$usuarioValido["contraseña"])){
            $this->enviarPaginaBienvenido();
        }
        else{
            header("Location: index.php?controller=formulario&action=index");
            exit;
        }
    }
}