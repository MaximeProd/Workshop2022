<?php
session_start();
require '../Fonctions.php';

$bdd = getDatabase();
$listPost = $_POST;

if(isset($bdd)){
    $_SESSION["erreur"] = null;
    if (isset($listPost['mdp']) AND isset($listPost['email'])){
        $password = htmlspecialchars($_POST['mdp']);
        $liste = getSalarie($bdd, $listPost['email']);
        var_dump($liste);
        if(!empty($liste)){
            if(count($liste)==1 && $password == $liste[0]->Mdp){
                $idClient = $liste[0]->IdSalarie;
                $_SESSION['idClient'] = $idClient;
                $_SESSION['admin'] = $liste[0]->EstManager;
            } elseif (count($liste) > 1){
                $_SESSION['idClient'] = null;
                //Erreur : Il existe plusieurs client avec la même adresse mail!! Grosse erreur d'identification!
                $_SESSION["erreur"] = 1;
            } else {
                //Erreur fréquente : le mot de passe ou l'email ne correspond pas
                $_SESSION["erreur"] = 2;
            }
        } else {
            //Erreur aussi fréquente : L'email n'est pas reconnu
            $_SESSION["erreur"] = 3;
        }
    }
} else {
    $_SESSION["erreur"] = 7;
}

if (isset($_SESSION['idClient'])){
    header('Location: ../Index.php');
} else {
    header('Location: ../LoginRegister.php');
}
//TODO AJOUTER UNE PAGE COMPTE



