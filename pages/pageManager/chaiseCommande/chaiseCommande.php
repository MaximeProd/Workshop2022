<?php
require_once '../../paterns/Head.php';
?>

<head>
    <link rel="stylesheet" href="../commandes.css">
</head>

<div class="centered_alone">
    <?php

    $bdd = getDataBase();
    $chaises = getListe($bdd, "materiel_ergo", Array("IdType" => 3));

    if (isset($_GET['id_salarie'])) {
        $id_salarie = $_GET['id_salarie'];

        $bdd = getDataBase();
        $salarie = getFirst($bdd, 'salarie', Array("IdSalarie" => $id_salarie));
    }

    echo '<h2>Commande de chaise pour le salarié ' . $salarie->NomSalarie . ' ' . $salarie->PrenomSalarie . '</h2>';
    ?>

    <ul>
        <?php
        foreach ($chaises as $chaise) {
            $lien = "../../../" . $chaise->LienPhoto;
            ?>
            <li class='materiel'>
                <div class='image'>
                    <img src='<?= $lien ?>'>
                </div>
                <div class="infos">
                    <bold><?= $chaise->NomMateriel ?></bold>
                    <hr>
                    <?= $chaise->Prix ?>€
                    <div>
                        <button><a href="../addCommande.php?idMateriel=<?= $chaise->IdMateriel ?>&idTypeMateriel=<?= $chaise->IdType ?>&idSalarie=<?= $salarie->IdSalarie ?>&idEquipe=<?= $salarie->IdEquipe ?>">Choisir</a></button>
                    </div>
                </div>
            </li>
        <?php
        }
        ?>
    </ul>
</div>
