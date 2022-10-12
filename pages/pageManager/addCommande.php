<?php

require_once '../Fonctions.php';

$query = "INSERT INTO `commande` (`EstValideeParSalarie`, `IdMateriel`, `IdSalarie`, `IdEquipe`) 
            VALUES ('0', :idMateriel, :idSalarie, :idEquipe);";

$bdd=getDataBase();

$statement = $bdd->prepare($query);

$statement->bindParam(':idMateriel', $_GET['idMateriel']);
$statement->bindParam(':idSalarie', $_GET['idSalarie']);
$statement->bindParam(':idEquipe', $_GET['idEquipe']);

if($statement->execute()){
    // mise a jour de la qualité
    $updateQuery = "UPDATE salariepossession SET Qualite = 5 WHERE IdSalarie = :idSalarie AND IdType = :idTypeMateriel";

    $updateStatement = $bdd->prepare($updateQuery);
    $updateStatement->bindParam(':idSalarie', $_GET['idSalarie']);
    $updateStatement->bindParam(':idTypeMateriel', $_GET['idTypeMateriel']);

    if($updateStatement->execute()){
        header('Location: pageManager.php');
    }
}
echo "Un problème est survenu";
?>