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
            if($poss == false){
                $args = array("IdType"=>$key, "IdSalarie"=>$_SESSION['idClient'],"Qualite"=>$value);
                insertLineQuestionnaire($bdd,$key,$_SESSION['idClient'],$value);
            }
            else
                updateLine($bdd,$key,$_SESSION['idClient'],$value);
        }
    }
    var_dump(checkfirstConnection($bdd,$_SESSION["idClient"]));
    if(checkfirstConnection($bdd,$_SESSION["idClient"]))
        header('Location: ../FormulaireSalarie.php');
    else{
        header('Location: ../PageSalarie.php');
        $_SESSION["erreur"] = "Veuillez saisir toutes les informations demandées";
    }


} else {
    $_SESSION["erreur"] = 7;
    header('Location: ../FormulaireSalarie.php');
}

