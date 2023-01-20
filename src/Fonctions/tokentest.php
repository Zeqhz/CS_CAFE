<?php
include_once "vendor/autoload.php";
$utilisateur = App\Modele\Modele_Salarie::Salarie_Select_byMail("userZoomBox@userZoomBox.com");
$octetsAleatoires = openssl_random_pseudo_bytes (256) ;
$valeurjeton = sodium_bin2base64($octetsAleatoires, SODIUM_BASE64_VARIANT_ORIGINAL);
$idjetonCree = App\Modele\Modele_Jeton::Jeton_Creation($valeurjeton,$utilisateur["id"],1);
$jetonRecherche = App\Modele\Modele_Jeton::Jeton_Rechercher_ParValeur($valeurjeton);
if ($idjetonCree == $jetonRecherche["id"]){
    // on a retrouvé le jeton par rapport à la valeur
    // on check si l'utilisateur est le même
    if ($jetonRecherche["idUtilisateur"]==$utilisateur["id"]){

    } else {
        echo "pbm ! ";
    }
    if ($jetonRecherche["codeAction"] == 1){
        // Le code action est bon
        App\Modele\Modele_Jeton::Jeton_Delete_parID($idjetonCree);
       $jetonrechercheapres = \App\Modele\Modele_Jeton::Jeton_Rechercher_ParValeur($valeurjeton);
       if ($jetonrechercheapres == false){
           // pas retrouvé c le resultat attendu
           echo "";
       } else {
           echo "erreur";
       }
    } else {
        echo "pbm !";
    }
}