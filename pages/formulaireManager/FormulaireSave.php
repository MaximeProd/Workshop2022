<?php
session_start();
require '../Fonctions.php';
var_dump($_POST);
$bdd = getDataBase();

if (isset($bdd)){
    $insert = Array();
    //Partie vérification qu'il n'y est pas d'erreur dans l'enregistrement
    if (isset($_POST)){
        foreach ($_POST as $key => $value){
            $poss = getFirst($bdd, 'salariepossession', ["IdType"=>$key, "IdSalarie"=>$_SESSION['idClient']],'*');
            if(!isset($poss)){
                $args = array("IdType"=>$key, "IdSalarie"=>$_SESSION['idClient'],"Qualite"=>$value);
                insertListe($bdd,'salariepossession',$args);
            }
            else
                updateLine($bdd,$key,$_SESSION['idClient'],$value);
        }
    }
    header('Location: ../FormulaireSalarie.php');

} else {
    $_SESSION["erreur"] = 7;
    header('Location: ../FormulaireSalarie.php');
}

