<?php
require_once '../../paterns/Head.php';
?>

<head>
    <link rel="stylesheet" href="../commandes.css">
</head>

<div class="centered_alone">
    <?php

    $bdd = getDataBase();
    $claviers = getListe($bdd, "materiel_ergo", Array("IdType" => 1));

    if (isset($_GET['id_salarie'])) {
        $id_salarie = $_GET['id_salarie'];

        $bdd = getDataBase();
        $salarie = getFirst($bdd, 'salarie', Array("IdSalarie" => $id_salarie));
    }

    echo '<h2>Commande de clavier pour le salarié ' . $salarie->NomSalarie . ' ' . $salarie->PrenomSalarie . '</h2>';
    ?>

    <ul>
        <?php
        foreach ($claviers as $clavier) {
            $lien = "../../../" . $clavier->LienPhoto;
            ?>
            <li class='materiel'>
                <div class='image'>
                    <img src='<?= $lien ?>'>
                </div>
                <div class="infos">
                    <bold><?= $clavier->NomMateriel ?></bold>
                    <hr>
                    <?= $clavier->Prix ?>€
                    <div>
                        <button><a href="../addCommande.php?idMateriel=<?= $clavier->IdMateriel ?>&idTypeMateriel=<?= $clavier->IdType ?>&idSalarie=<?= $salarie->IdSalarie ?>&idEquipe=<?= $salarie->IdEquipe ?>">Choisir</a></button>
                    </div>
                </div>
            </li>
            <?php
        }
        ?>
    </ul>
</div>
