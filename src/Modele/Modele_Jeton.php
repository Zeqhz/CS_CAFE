<?php

namespace App\Modele;

use App\Utilitaire\Singleton_ConnexionPDO;
use Cassandra\RetryPolicy\DefaultPolicy;
use PDO;

class Modele_Jeton
{
    static function  Jeton_Creation($valeur, $idUtilisateur, $codeAction)
    {
        $date = new \DateTime();
        $date->add(new \DateInterval("PT900S"));
        $datesql = $date->format("y-m-d h-i-s");

        $connexionPDO = Singleton_ConnexionPDO::getInstance();
        $requetePreparee = $connexionPDO->prepare(
            'INSERT INTO `token` (`id`, `valeur`, `codeAction`, `idUtilisateur`, `dateFin`) 
                   VALUES (NULL, :valeur, :codeAction, :idUtilisateur, :dateFin );');
        $requetePreparee->bindParam('valeur', $valeur);
        $requetePreparee->bindParam('codeAction', $codeAction);
        $requetePreparee->bindParam('idUtilisateur', $idUtilisateur);
        $requetePreparee->bindParam('dateFin', $datesql);
        $requetePreparee->execute(); //$reponse boolean sur l'état de la requête
        $idUtilisateur = $connexionPDO->lastInsertId();
        return $idUtilisateur;
    }


    static function Jeton_Rechercher_ParValeur($valeur)
    {
        $connexionPDO = Singleton_ConnexionPDO::getInstance();
        $requetePreparee = $connexionPDO->prepare('select * from `token` where valeur = :valeur');
        $requetePreparee->bindParam('valeur', $valeur);
        $requetePreparee->execute();
        $jeton = $requetePreparee->fetch(PDO::FETCH_ASSOC);
        return $jeton;
    }

    static function Jeton_Delete_ParId($idJeton)
    {
        $connexionPDO = Singleton_ConnexionPDO::getInstance();
        $requetePreparee = $connexionPDO->prepare('delete token.* from `token` where id = :id');
        $requetePreparee->bindParam('id', $idJeton);
        $reponse = $requetePreparee->execute();
        return $reponse;
    }
}