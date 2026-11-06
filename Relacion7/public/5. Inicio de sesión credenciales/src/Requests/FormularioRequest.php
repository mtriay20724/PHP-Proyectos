<?php
declare(strict_types=1);

namespace Requests;

final class FormularioRequest{
    private array $datos = [];
    private array $errores = [];

    public function __construct(array $entrada)
    {
        $this->sanear($entrada);
        $this->validar();
    }

    public function esValido(): bool
    {
        return $this->errores === [];
    }

    /** @return array<string, string> */
    public function errores(): array
    {
        return $this->errores;
    }

    /** @return array<string, mixed> los datos saneados */
    public function datos(): array
    {
        return $this->datos;
    }

    private function sanear(array $entrada): void
    {
        // El usuario puede manipular la petición: solo aceptamos textos
        $texto = static fn(mixed $v): string => is_string($v) ? trim(strip_tags($v)) : '';
        $this->datos = [
            'usuario' => $texto($entrada['usuario'] ?? ''),
            'contraseña' => $texto($entrada['contraseña'] ?? '')
        ];

    }

    private function validar(): void
    {
        $d = $this->datos;
        // --- Usuario ---
        if ($d['usuario'] === ''){
            $this->errores['usuario'] = "El usuario es obligatorio.";
        } elseif (mb_strlen($d['usuario']) < 5) {
            $this->errores['usuario'] = "El usuario debe tener al menos 5 caracteres.";
        } elseif (!preg_match('/^[\pL]+$/u', $d['usuario'])) {
            $this->errores['usuario'] = "El usuario solo puede contener letras.";
        }
        // --- Contraseña ---
        if ($d['contraseña'] !== '') {
            $may = preg_match("/[A-Z]/u",$d["contraseña"]);
            $min = preg_match("/[a-z]/u",$d["contraseña"]);
            $num = preg_match("/[\d]/u",$d["contraseña"]);
            $simbolo = preg_match("/[\-\_\#\$]/u",$d["contraseña"]);
            if ($d["contraseña"] === ""){
                $this->errores["contraseña"] = "La contraseña es obligatoria.";
            } elseif (mb_strlen($d['contraseña']) < 5) {
                $this->errores['contraseña'] = "La contraseña debe tener al menos 5 caracteres.";
            } elseif (!$may){
                $this->errores["contraseña"] = "La contraseña debe contener al menos una mayúscula.";
            } elseif (!$min){
                $this->errores["contraseña"] = "La contraseña debe contener al menos una minúscula.";
            } elseif (!$num){
                $this->errores["contraseña"] = "La contraseña debe tener al menos un número.";
            } elseif (!$simbolo){
                $this->errores["contraseña"] = "La contraseña debe tener al menos uno de estos símbolos: -, _, # o $.";
            }
        }
    }
}
