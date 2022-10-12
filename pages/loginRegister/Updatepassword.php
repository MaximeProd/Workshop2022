<?php
session_start();
require '../Fonctions.php';
$bdd = getDataBase();
if (isset ($bdd)) {
    $password = htmlspecialchars($_POST['mdp']);
    $liste = getListe($bdd,'membres',Array("id" => $_SESSION['idClient']),Array(),'mdp');
    if (password_verify($password, $liste[0]->mdp)) {
        if ($_POST['newMdp'] == $_POST['confMdp']){
            $encryptMdp = $_POST['newMdp'];
            updateListe($bdd,'salarie',Array("Mdp" => $encryptMdp),"IdSalarie=".$_SESSION["idClient"]);
            $_SESSION["erreur"] = "Mot de passe modifié avec succés";
            header('Location: ../MonCompte.php');
        }
        else{
            $_SESSION["erreur"] = 4;
            header('Location: ../MonCompte.php');
        }
    } else {
        $_SESSION["erreur"] = "Mot de passe incorrect";
        header('Location: ../MonCompte.php');
    }
} else {
    $_SESSION["erreur"] = 7;
    header('Location: ../index.php');
}

