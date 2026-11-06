<?php
    $array = [];

    for($i = 0; $i <= 8; $i++) {
        $array[] = random_int(0, 1);
    }

    for($i = 0; $i <= 8; $i++) {
        if($array[$i] == 1){
            $array2[$i] = 0;
        }else{
            $array2[$i] = 1;
        }

    }

    foreach ($array as $elementos){
        echo $elementos . " ";
    }
    echo "<br>";
    echo "<br>";
    echo "<br>";

    foreach ($array2 as $elementos2){
        echo $elementos2 . " ";
    }

?>
