<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SACF</title>

</head>
<body>
<?php

for ($i = 0; $i < 10; $i++) {



    ?><table border="1">


        <tr>
            <th>tabla del <?=$i?></th>


        </tr>
    <?
     for ($j = 1; $j <= 10; $j++) {

         ?>
            <tr>
                <td> el <?=$i?> multiplicado por <?=$j?> = <?=$i*$j?></td>
            </tr>
    <?


     }




?> </table>
<?
}


?>
</body>
</html>


