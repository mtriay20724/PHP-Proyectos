<?php
declare(strict_types=1);

namespace Requests;

use DateTime;

final class FormularioRequest{

    private array $datos = [];

    private array $errores = [];

    /** @param array<string, mixed> $entrada el array contacto[...] recibido */
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
            'nombre' => $texto($entrada['nombre'] ?? ''),
            'apellidos' => $texto($entrada['apellidos'] ?? ''),
            'correo' => trim($entrada['correo'] ?? ''),
            'telefono' => $texto($entrada['telefono'] ?? ''),
            'situacion' => $texto($entrada['situacion'] ?? ''),
            'lenguajes' => is_array($entrada['lenguajes'] ?? null) ? array_map($texto, $entrada['lenguajes']) : [],
            'url' => $texto($entrada['url'] ?? '')
        ];

    }

    private function validar(): void
    {
        $d = $this->datos;
        // --- Nombre (obligatorio, 2-50 caracteres) ---
        if ($d['nombre'] === ''){
            $this->errores['nombre'] = "El nombre es obligatorio.";
        } elseif (mb_strlen($d['nombre']) < 2) {
            $this->errores['nombre'] = "El nombre debe tener al menos 2 caracteres.";
        } elseif (mb_strlen($d['nombre']) > 50) {
            $this->errores['nombre'] = "El nombre no puede superar los 50 caracteres.";
        } elseif (!preg_match('/^[\pL\s\-\'\.]+$/u', $d['nombre'])) {
            $this->errores['nombre'] = "El nombre solo puede contener letras, espacios, guiones y puntos.";
        }
        // --- Apellidos (opcional, 2-100 caracteres si se indica) ---
        if ($d['apellidos'] !== '') {
            if (mb_strlen($d['apellidos']) < 2) {
                $this->errores['apellidos'] = "Los apellidos deben tener al menos 2 caracteres.";
            } elseif (mb_strlen($d['apellidos']) > 100) {
                $this->errores['apellidos'] = "Los apellidos no pueden superar los 100 caracteres.";
            } elseif (!preg_match('/^[\pL\s\-\'\.]+$/u', $d['apellidos'])) {
                $this->errores['apellidos'] = "Los apellidos solo pueden contener letras, espacios, guiones y puntos.";
            }
        }
        // --- Correo (obligatorio, formato válido, máx. 255 caracteres) ---
        if ($d['correo'] === '') {
            $this->errores['correo'] = "El correo es obligatorio.";
        } elseif (mb_strlen($d['correo']) > 255) {
            $this->errores['correo'] = "El correo no puede superar los 255 caracteres.";
        } elseif (!filter_var($d['correo'], FILTER_VALIDATE_EMAIL)) {
            $this->errores['correo'] = "El formato del correo no es válido.";
        }
        // --- Teléfono (opcional, 9-15 dígitos, puede incluir +, espacios o guiones) ---
        if ($d['telefono'] !== '' && !preg_match('/^\+?[0-9\s\-]{9,15}$/', $d['telefono'])) {
            $this->errores['telefono'] = "El teléfono debe tener entre 9 y 15 dígitos (puede incluir +, espacios o guiones).";
        }
        // --- Situación ---
        $situacionesValidas = ["Sin empleo","Media jornada","Tiempo completo"];
        if (!in_array($d['situacion'], $situacionesValidas)) {
            $this->errores['situacion'] = "Situación laboral no válida.";
        }
        // --- Lenguajes ---
        $lenguajesValidos = ["Python","JavaScript","Java","PHP","C++"];
        if (!is_array($d['lenguajes'])) {
            $this->errores['lenguajes'] = "Formato de lenguajes no válido.";
        } else{
            foreach ($d['lenguajes'] as $lenguaje){
                if (!in_array($lenguaje, $lenguajesValidos)) {
                    $this->errores["lenguajes"] = "Se ha recibido un lenguaje no válido.";
                }
            }
        }
        // --- URL ---
        if ($d["url"] === "" || !filter_var($d["url"], FILTER_VALIDATE_URL)) {
            $this->errores["url"] = "El URL es obligatorio.";
        }
    }
}