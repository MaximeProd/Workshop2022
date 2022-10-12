<?php
session_start();
require '../Fonctions.php';

$bdd = getDataBase();

if (isset($bdd)){
    $insert = Array();
    //Partie vérification qu'il n'y est pas d'erreur dans l'enregistrement
    if (isset($_POST)){
        //$insert
        insertListe($bdd,'salarie',$_POST);
    }

} else {
    $_SESSION["erreur"] = 7;
    header('Location: ../FormulaireSalarie.php');
}

