<?php

    /*
    function password($contrasea)
    {
        $rango =preg_match("/{6,15}/", $contrasea);
        if($rango = $rango . true){
            $almenosUnNumero = preg_match('/[0-9]+/', $contrasea);
            if($almenosUnNumero = $almenosUnNumero . true){
                $may = preg_match('/[A-Z]+/', $contrasea);
                if($may = $may .true){
                    $min = preg_match('/[a-z]+/', $contrasea);
                    if($min = $min . true){
                        $alf = preg_match('/[!@#$%^&*()_=+{};:,<.>ยง~]+/', $contrasea);
                        if($alf = $alf . true){
                            return "La contraseña <? $contrasea ?> es correcta";
                        }else{
                            return "La contraseña <? $contrasea ?> es incorrecta";
                        }
                    }
                }else{
                    return "La contraseña <? $contrasea ?> es incorrecta";
                }
            }else{
                return "La contraseña <? $contrasea ?> es incorrecta";
            }
        }else{
            return "La contraseña <? $contrasea ?> es incorrecta";
        }
    }
    echo password("a");
*/
    function password2($contrasea){
        $rango = preg_match("/^.{6,15}$/", $contrasea);
        $almenosUnNumero = preg_match('/[0-9]+/', $contrasea);
        $may = preg_match('/[A-Z]+/', $contrasea);
        $min = preg_match('/[a-z]+/', $contrasea);
        $alf = preg_match('/[!@#$%^&*()_=+{};:,<.>ยง~]+/', $contrasea);

        if($rango == true && $almenosUnNumero == true && $may == true && $min == true && $alf == true){
            return "La contraseña $contrasea es correcta";
        } else {
            return "La contraseña $contrasea es incorrecta";
        }
    }
    echo password2("12345RSa%");
?>



