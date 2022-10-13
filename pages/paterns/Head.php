<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . '..\..' .'\config.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . '\Fonctions.php';
session_start();

$Compte = 'Se connecter/Inscription';
$lien = "LoginRegister.php";

$admin = null;
$pageAdmin = '';

if (isset($_SESSION['idClient'])){
    $idClient = $_SESSION['idClient'];
    $Compte = 'Mon Compte';
    $lien = "/Workshop2022/pages/MonCompte.php";
    $bdd = getDatabase();



    if (isset($_SESSION['admin']))
        $admin = $_SESSION['admin'];

    if(checkfirstConnection($bdd,$idClient)){
        $pageAdmin = '
            <a class= "salarié" href="/Workshop2022/pages/PageSalarie.php">Formulaire</a>
            ';
    }
    else if ($admin == "1") {
        $pageAdmin = '        
        <a                  href="/Workshop2022/pages/PageSalarie.php">EspacePersonnel</a>
        <a class= "manager" href="/Workshop2022/pages/pageManager/pageManager.php">Gérer les salariés</a>';
    }
    else {
        $pageAdmin = '
            <a href="/Workshop2022/pages/PageSalarie.php">EspacePersonnel</a>
            ';
    }
}

echo '
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ergonobro</title>
    <link rel="stylesheet" href="/Workshop2022/css/index.css">
    <link rel="stylesheet" href="/Workshop2022/css/Header.css">
    <link href="https://fonts.googleapis.com/css?family=Acme|Sniglet&display=swap" rel="stylesheet">
    <!--
    font-family: "Sniglet", cursive; →Titre
    font-family: "Acme", sans-serif; →Texte
  -->
  </head>
  <body>
    <div class="header">
    <i class=\'fas fa-air-freshener\' style=\'font-size:48px;color:red\'></i>
    <a href="#default" class="logo"><img src="/Workshop2022/image/Ergonobro.png" width="25px" height="25px" >Ergonobro</a>
    <div class="header-right">
        <a class="active" href="#home">Accueil</a>

        '.$pageAdmin.'
        <a  class="active" href="'.$lien.'">'.$Compte.'</a>
    </div>
</div>
     <main>

      
    ';
afficherErreur();

?>
