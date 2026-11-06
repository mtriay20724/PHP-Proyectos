<?php
declare(strict_types=1);

namespace Controllers;
use Lib\Pages;
use Models\Candidato;
use Requests\FormularioRequest;

class FormularioController{
    private Pages $pages;

    public function __construct(){
        $this->pages = new Pages();
    }

    public function index(){
        $this->pages->render("formulario/formulario",[
            "candidato" => new Candidato(),
            "errores" => []
        ]);
    }

    public function enviarPaginaRecibido(){
        $this->pages->render("formulario/recibido");
    }

    public function procesar(){
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            header("Location: index.php?controller=formulario&action=index");
            return;
        }

        $entrada = $_POST["formulario"];
        $request = new FormularioRequest(is_array($entrada) ? $entrada : []);

        if (!$request->esValido()){
            $this->pages->render("formulario/formulario", [
                "candidato" => Candidato::fromArray($request->datos()),
                "errores" => $request->errores(),
            ]);
            exit;
        }
        if ($request->esValido()){
            $this->enviarPaginaRecibido();
        }

        /*
        $candidato = Candidato::fromArray($request->datos());
        $this->pages->render("formulario/formulario");
        */
    }
}
