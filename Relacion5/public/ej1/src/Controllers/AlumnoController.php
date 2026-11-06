<?php
    require_once("modelos/Alumnos.php");

    function mostrarAlumno(){
        $alumno1 = new Alumno();
        $alumno1->setNombre("Marc");
        $alumno1->setApellidos("Triay Orfila");
        $alumno1->setNota(8);

    }
