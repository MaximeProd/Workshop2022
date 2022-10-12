<?php
require_once 'Fonctions.php';

$query = "UPDATE commande SET EstValideeParSalarie = 1 WHERE IdCommande = :idCommande";

$bdd=getDataBase();

$statement = $bdd->prepare($query);

$statement->bindParam(':idCommande', $_GET['idCommande']);

if($statement->execute()){
    header('Location: PageSalarie.php');
}
echo "Un problème est survenu";
?>