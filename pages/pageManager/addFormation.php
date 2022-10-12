<?php

require_once '../Fonctions.php';

$query = "INSERT INTO `equipeparticipation` (`IdEquipe`, `IdFormation`) 
            VALUES (:idEquipe, :idFormation);";

$bdd=getDataBase();

$statement = $bdd->prepare($query);

$statement->bindParam(':idEquipe', $_GET['idEquipe']);
$statement->bindParam(':idFormation', $_GET['idFormation']);

if($statement->execute()){
    header('Location: pageManager.php');
}
echo "Un problème est survenu";
?>