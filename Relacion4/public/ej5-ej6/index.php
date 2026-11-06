<?php
    require_once "perro.php";

    try {
        $perro1 = new Perro(12, "Perro", "Blanco", "Lluna", "Bichon Maltes");
        $caniche = new Perro(5, "Perro", "Marron", "Messi", "Caniche");

        $perro1->mostrar_Propiedades();
        echo "<br><br>";

        $ok = $perro1->setNombre("Luna");
        echo $ok ? "<br>Nombre actualizado correctamente" : "<br>Nombre no modificado";

        /*
            Nombre Largo el cual daria error

            $ok = $perro1->setNombre("Nombre que supera las 23 o más caracteres askdfjasñlkfjsakldñjl");
            echo $ok ? "<br>Nombre actualizado correctamente" : "<br>Nombre no modificado";

         */

        echo "<br><br>El bichon maltes habla: " . $perro1->speak();

        $caniche->mostrar_Propiedades();
        echo "<br><br>El caniche habla: " . $caniche->speak();
    } catch (InvalidArgumentException $e) {
        echo "Error: " . $e->getMessage();
    }
?>


