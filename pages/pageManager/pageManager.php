<?php
require_once '../Fonctions.php';
$bdd = getDataBase();
$salarie = getSalarie($bdd);
$salaries = getSalaries($bdd);

?>
<h1>Bienvenue <?= $salarie->PrenomSalarie . " " . $salarie->NomSalarie; ?> </h1>

<h2>Liste de votre équipe :</h2>

<ul>
    <?php
    foreach ($salaries as $s){
        echo '<li>' . $s->PrenomSalarie . ' ' . $s->NomSalarie;

        $possessions = getSalariePossession($bdd);

        foreach ($possessions as $possession){
            $shouldDisplayButton = false;
            echo '<ul>' . '<li ';
            switch ($possession->Qualite){
                case "1":
                    echo 'style="color:red;"';
                    $shouldDisplayButton = true;
                    break;
                case "2":
                    echo 'style="color:#bf5c00;"';
                    $shouldDisplayButton = true;
                    break;
                case "3":
                    echo 'style="color:#a9bf00;"';
                    $shouldDisplayButton = true;
                    break;
                case "4":
                    echo 'style="color:#00bf30;"';
                    $shouldDisplayButton = true;
                    break;
                default:
                    echo 'style="color:black;"';
                    break;
            }
            echo'>' . $possession->NomType . '</li>' . '</ul>';
            if($shouldDisplayButton == true){
                echo '<button>Faire une commande</button>';
            }
        }


        echo '</li>';
    }
    ?>
</ul>