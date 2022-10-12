<?php
$directory = $_SERVER["DOCUMENT_ROOT"];
if(gethostname() == 'DESKTOP-NS2VGVV' or gethostname() == 'DESKTOP-CQRJMIK')
    require_once $directory . '/pages/Fonctions.php';
else
    require_once $directory . '/Workshop2022/pages/Fonctions.php';
session_start();

$Compte = 'Se connecter/Inscription';
$lien = "LoginRegister.php";
if (isset($_SESSION['idClient'])){
    $idClient = $_SESSION['idClient'];
    $Compte = 'Mon Compte';
    $lien = "MonCompte.php";
    $bdd = getDatabase();
    redirectFormulaire($bdd, $idClient);
}

$admin = null;
$pageAdmin = '';
if (isset($_SESSION['admin'])){
    $admin = $_SESSION['admin'];
    if ($admin == "1"){
    $pageAdmin = '<a class= "manager" href="#contact">Gérer les salariés</a>';
    }
}

echo '
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ergonobro</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/header.css">
    <link href="https://fonts.googleapis.com/css?family=Acme|Sniglet&display=swap" rel="stylesheet">
    <!--
    font-family: "Sniglet", cursive; →Titre
    font-family: "Acme", sans-serif; →Texte
  -->
  </head>
  <body>
    <div class="header">
    <i class=\'fas fa-air-freshener\' style=\'font-size:48px;color:red\'></i>
    <a href="#default" class="logo"><img src="images/neptune.png" width="25px" height="25px" >Ergonobro</a>
    <div class="header-right">
        <a class="active" href="#home">Accueil</a>
        <a class= "salarié" href="#about">Page Salarié</a>
        <a class= "salarié" href="#about">Formation</a>
        <a href="EspacePersonnel.php">EspacePersonnel</a>
        '.$pageAdmin.'
        <a  class="active" href="'.$lien.'">'.$Compte.'</a>
    </div>
</div>
     <main>

      
    ';
afficherErreur();

?>
