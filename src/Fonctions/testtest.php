<?php
function passgen1($nbchar) {
    $chaine ="mnoTUzS5678kVvwxy9WXYZRNCDEFrslq41GtuaHIJKpOPQA23LcdefghiBMbj0";
    srand((double)microtime()*1000000);
    $pass = '';
    for($i=0; $i<$nbchar; $i++){
        $pass .= $chaine[rand()%strlen($chaine)];
    }
    return $pass;
}

function passgen2($nbChar){
    return substr(str_shuffle(
        'abcdefghijklmnopqrstuvwxyzABCEFGHIJKLMNOPQRSTUVWXYZ0123456789'),1, $nbChar); }

/*for ($i=0; $i<10; $i++){
    echo passgen1(10);
    echo"\n";
    echo passgen2(10);
    echo "\n";
}*/
//Création de la séquence aléatoire à la base du mot de passe
/*$octetsAleatoires = openssl_random_pseudo_bytes (10) ;
//Transformation de la séquence binaire en caractères alpha
$motDePasse = sodium_bin2base64($octetsAleatoires, SODIUM_BASE64_VARIANT_ORIGINAL);
echo $motDePasse;
*/
function passgen3($nbChar)
{
    $chaine = "ABCDEFGHIJKLMONOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789&é'(-è_çà)=$^*ù!:;,~#{[|`\^@]}¤€";
    srand(random_int(0, 999999999999999999));
    $pass = '';
    for ($i = 0; $i < $nbChar; $i++) {
        $pass .= $chaine[rand() % strlen($chaine)];
    }
    return $pass;
}
echo passgen3(10);