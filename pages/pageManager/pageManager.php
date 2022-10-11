<?php
require_once '../Fonctions.php';
$bdd = getDataBase();
$manager = getSalarie($bdd);
$salaries = getSalaries($bdd);

?>

<head>
    <link rel="stylesheet" href="pageManager.css">
</head>

<h1>Bienvenue <?= $manager->PrenomSalarie . " " . $manager->NomSalarie; ?> </h1>

<h2>Liste de votre équipe :</h2>

<ul class="liste-salarie">
    <?php
    foreach ($salaries as $s){
        echo '<li class="salarie">' . $s->PrenomSalarie . ' ' . $s->NomSalarie;

        $possessions = getSalariePossession($bdd, $s->IdSalarie);

        foreach ($possessions as $possession){
            $shouldDisplayButton = false;
            $color = 'black';

            switch ($possession->Qualite){
                case "1":
                    $color = "red";
                    $shouldDisplayButton = true;
                    break;
                case "2":
                    $color = "#bf5c00";
                    $shouldDisplayButton = true;
                    break;
                case "3":
                    $color = "#a9bf00";
                    $shouldDisplayButton = true;
                    break;
                case "4":
                    $color = "#00bf30";
                    $shouldDisplayButton = true;
                    break;
            }


            echo '<ul>' .
                    '<div class="materiel" >
                        <li style="color: ' . $color . ';" >' . $possession->NomType . '</li>';

            if($shouldDisplayButton == true){
                echo    '<button>Faire une commande</button>';
            }

            echo '    </div>
                    </ul>';
        }


        echo '</li>';
    }
    ?>
</ul>