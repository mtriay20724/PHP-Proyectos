<?php
    namespace Models;
class Alumno{
    protected string $nombre;
    protected string $apellidos;
    protected float $nota;

    protected int $anyoNacimiento;

    /**
     * @param string $nombre
     */
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @param string $apellidos
     */
    public function setApellidos(string $apellidos): void
    {
        $this->apellidos = $apellidos;
    }

    /**
     * @param float $nota
     */
    public function setNota(float $nota): void
    {
        $this->nota = $nota;
    }

    /**
     * @param int $anyoNacimiento
     */
    public function setAnyoNacimiento(int $anyoNacimiento): void
    {
        $this->anyoNacimiento = $anyoNacimiento;
    }

    /**
     * @return float
     */
    public function getNota(): float
    {
        return $this->nota;
    }



    function getNombreCompleto(){
        return $this->nombre . " " . $this->apellidos;
    }

    function getEdad(){
        $anio = date('Y');
        return "Tienes ". (int)$anio - $this->anyoNacimiento;
    }
}
