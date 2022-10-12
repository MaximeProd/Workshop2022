<?php
$directory = $_SERVER["DOCUMENT_ROOT"];
if(gethostname() == 'DESKTOP-NS2VGVV')
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
}

$_SESSION['admin'] = False;
$admin = null;
$pageAdmin = '';
if (isset($_SESSION['admin'])){
    $admin = $_SESSION['admin'];
    if ($admin == 1){
    $pageAdmin = '<li><a href="GérerMembres.php">Gérer les salariés</a></li>';
    }
}

echo '
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Hotel Neptune</title>
    <link rel="stylesheet" href="../css/index.css">
    <link href="https://fonts.googleapis.com/css?family=Acme|Sniglet&display=swap" rel="stylesheet">
    <!--
    font-family: "Sniglet", cursive; →Titre
    font-family: "Acme", sans-serif; →Texte
  -->
  </head>
  <body>
    <header>
      <div class="haut">
        <img src="images/neptune.png">
        <h1>Ergonobro</h1>
      </div>
    </header>
     <main>
      <div class="liste">
        <li><a href="EspacePersonnel.php">EspacePersonnel</a></li>
        '.$pageAdmin.'
        <li><a href="'.$lien.'">'.$Compte.'</a></li>
      </div>
      
    ';
afficherErreur();

?>
