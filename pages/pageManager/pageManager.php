<?php
include ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR ."config.php";

require_once HEAD_FILE;
$bdd = getDataBase();
$manager = getFirst($bdd,'salarie', Array("IdSalarie" => $_SESSION['idClient']));
$salaries = getListe($bdd, "salarie", Array("IdEquipe" => $manager->IdEquipe));

?>

<head>
    <link rel="stylesheet" href="pageManager.css">
</head>

<h1>Bienvenue <?= $manager->PrenomSalarie . " " . $manager->NomSalarie; ?> </h1>

<div class="pageManager">
    <div class="liste-salaries">
        <h2>Liste de votre équipe :</h2>

        <ul class="liste-salarie">
            <?php
            foreach ($salaries as $s){
                echo '<li class="salarie">' . $s->PrenomSalarie . ' ' . $s->NomSalarie;

                $possessions = getSalariePossession($bdd, $s->IdSalarie);

                foreach ($possessions as $possession){
                    $color = 'black';
                    $shouldDisplayButton = true;

                    switch ($possession->Qualite){
                        case "1":
                            $color = "red";
                            break;
                        case "2":
                            $color = "#bf5c00";
                            break;
                        case "3":
                            $color = "#a9bf00";
                            break;
                        case "4":
                            $color = "#00bf30";
                            break;
                        default:
                            $shouldDisplayButton = false;
                            break;
                    }


                    echo '<ul>' .
                        '<div class="materiel" >
                            <li style="color: ' . $color . ';" >' . $possession->NomType . '</li>';

                    if($shouldDisplayButton == true){
                        switch($possession->IdType){
                            case "1":
                                $lien = "clavierCommande/clavierCommande.php?id_salarie=";
                                break;
                            case "2":
                                $lien = "sourisCommande/sourisCommande.php?id_salarie=";
                                break;
                            case "3":
                                $lien = "chaiseCommande/chaiseCommande.php?id_salarie=";
                                break;
                            case "4":
                                $lien = "casqueCommande/casqueCommande.php?id_salarie=";
                                break;
                        }
                        echo    '<button><a href="' . $lien . $s->IdSalarie .'">Faire une commande</a></button>';
                    }

                    echo '    </div>
                        </ul>';
                }


                echo '</li>';
            }
            ?>
        </ul>
    </div>

    <div class="liste-formations">

        <h2>Vos formations :</h2>
        <ul>
            <?php
            $formations = getFutureFormation($bdd, date('d-m-y h:i:s'), $manager->IdEquipe, false);
            foreach ($formations as $formation){
                $dateFormation = new DateTime($formation->DateFormation);
                echo "<li> ". $formation->SujetFormation . " - le " . $dateFormation->format('d/m/Y') ." à " . $dateFormation->format('H:i');
            }

            ?>
        </ul>

        <h2>Liste des formations disponibles :</h2>
        <ul>
            <?php
            $formations = getFutureFormation($bdd, date('d-m-y h:i:s'), $manager->IdEquipe, true);
            foreach ($formations as $formation){
                $dateFormation = new DateTime($formation->DateFormation);
                echo "<li> ". $formation->SujetFormation . " - le " . $dateFormation->format('d/m/Y') ." à " . $dateFormation->format('H:i') .
                    "<button><a href='addFormation.php?idEquipe=" . $manager->IdEquipe . "&idFormation=" . $formation->IdFormation . "'>S'inscrire</a> </button></li>";

            }
            ?>
        </ul>

    </div>
</div>

<?php
require_once "../paterns/Foot.php";
