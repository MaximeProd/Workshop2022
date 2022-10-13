<?php
require_once "paterns/Head.php";
?>
<head>
    <link rel="stylesheet" href="../css/PageSalarie.css">

</head>

<body>

<?php
$bdd = getDataBase();
$salarie = getFirst($bdd,'salarie', Array("IdSalarie" => $_SESSION['idClient']));
$chaise = getFirst($bdd, "salariepossession", Array("IdSalarie" => $_SESSION['idClient'], "IdType" => 3));
$clavier = getFirst($bdd, "salariepossession", Array("IdSalarie" => $_SESSION['idClient'], "IdType" => 1));
$souris = getFirst($bdd, "salariepossession", Array("IdSalarie" => $_SESSION['idClient'], "IdType" => 2));
$casque = getFirst($bdd, "salariepossession", Array("IdSalarie" => $_SESSION['idClient'], "IdType" => 4));
?>
<div class="name"
    <h1><?= $salarie->NomSalarie ?> <?= $salarie->PrenomSalarie ?> </h1>
</div>

<div class="possessions">
    <legend class="title-mat">Votre matériel actuel : </legend>

    Clavier :
    <img class="clavier" src="../image/clavier/<?= $clavier->Qualite?>.png">

    Souris :
    <img class="souris" src="../image/souris/<?= $souris->Qualite?>.png">

    Casque :
    <img class="casque" src="../image/casque/<?= $casque->Qualite?>.png">

    Chaise :
    <img class="chaise" src="../image/chaise/<?= $chaise->Qualite?>.png">

    <button id="modif"><a href="FormulaireSalarie.php">Modifier</a></button>
</div>
<br>
<div class="commandes">
    Les commandes vous concernant à valider :
    <ul>
        <?php
        $commandes = getCommandesNonValideeBySalarie($bdd, $_SESSION['idClient']);
        foreach ($commandes as $commande) {
            echo "<li>" . $commande->NomMateriel . '     
                    <button><a href="validerCommande.php?idCommande=' .$commande->IdCommande . '">Valider</a></button>
';

        }
        ?>
    </ul>
</div>

</body>
</html>