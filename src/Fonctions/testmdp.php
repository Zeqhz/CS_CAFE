<?php

function CalculComplexiteMdp($mdp) :int{
    $a_minuscule = false;
    $a_majuscule = false;
    $a_chiffre = false;
    $a_special = false;

    $longueur = strlen($mdp);
    for($i=0; $i<$longueur;$i++){
        $lettre =$mdp[$i];

        if($lettre >= 'a' && $lettre <= 'z' )
        {
            $a_minuscule = true;
        }

        elseif ($lettre >= 'A' && $lettre <= 'Z' )
        {
            $a_majuscule = true;
        }

        elseif($a_chiffre >= '0' && $a_chiffre<= '9' )
        {
            $a_chiffre = true;
        }

        else
        {
            $a_special = true;
        }

        $nombrePotentiel = 0;
        if ($a_minuscule == true){
            $nombrePotentiel += 26;
        }
        if ($a_majuscule == true){
            $nombrePotentiel += 26;
        }
        if ($a_chiffre == true){
            $nombrePotentiel += 10;
        }
        if ($a_special == true){
            $nombrePotentiel += 28;
        }
    }
    return true;




}