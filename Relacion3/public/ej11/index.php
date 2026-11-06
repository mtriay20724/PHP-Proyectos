<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
    <body>


        <?php
            $palos = ["oros", "bastos", "espadas", "copas"];

            function crearBarajaCompleta(&$palos){
                $baraja = [];
                foreach ($palos as $palo){
                    for($numero = 1; $numero <=12; $numero++){
                        $baraja[] = ['numero' => $numero, 'palo' => $palo];
                    }
                }
                return $baraja;
            }


            function crearBaraja(&$palos){
                $baraja = [];
                foreach ($palos as $palo){
                    for($numero = 1; $numero <=12; $numero++){
                        if($numero !== 8 && $numero !== 9) {
                            $baraja[] = ['numero' => $numero, 'palo' => $palo];
                        }
                    }
                }
                return $baraja;
            }

            function barajarBaraja(&$baraja){
                shuffle($baraja);

            }

            function sacarCarta(&$baraja){
                if(empty($baraja)){
                    return "Ya no quedan cartas en el mazo";
                }else{
                    return $carta = array_pop($baraja);
                }
            }

            function mostrarCarta(&$carta){
                $num = $carta['numero'];
                $palos = $carta['palo'];

                $figuras = [1 => "AS", 10 => "Sota", 11 => "Caballo", 12 => "Rey"];

                if(isset($figuras[$num])){
                    $nombre = $figuras[$num];
                }else{
                    $nombre = $num;
                }
                echo ("<img src = ../imagenes/" . $palos. "_" . $num . ".jpg>");
                echo "<p>" . $nombre . " del " . $palos . "</p>";
            }

            $barajaCompleta = crearBarajaCompleta($palos);
            $barajas = crearBaraja($palos);

            barajarBaraja($barajas);
            $carta = sacarCarta($barajas);
            mostrarCarta($carta);
        ?>

    </body>
</html>
