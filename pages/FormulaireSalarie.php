<?php
require_once "paterns/Head.php";

//getListe($bdd, );

$record['picture_id'] = "1";
$poss1 = getFirst($bdd, 'salariepossession', ["IdType"=>3, "IdSalarie"=>$_SESSION['idClient']],'*');
$poss2 = getFirst($bdd, 'salariepossession', ["IdType"=>4, "IdSalarie"=>$_SESSION['idClient']],'*');
$poss3 = getFirst($bdd, 'salariepossession', ["IdType"=>1, "IdSalarie"=>$_SESSION['idClient']],'*');
$poss4 = getFirst($bdd, 'salariepossession', ["IdType"=>2, "IdSalarie"=>$_SESSION['idClient']],'*');


echo '
<html lang="fr">
<link rel="stylesheet" href="../css/FormulaireSalarie.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {box-sizing: border-box;}

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #c0edf0;
            background-repeat: no-repeat;
            background-attachment: fixed;

        }
        .header {
            overflow: hidden;
            background: linear-gradient(to bottom right, cyan, black);
            padding: 20px 10px;
        }

        .header a {
            float: left;
            color: white;
            text-align: center;
            padding: 12px;
            text-decoration: none;
            font-size: 18px;
            line-height: 25px;
            border-radius: 4px;
        }

        .header a.logo {
            font-size: 25px;
            font-weight: bold;
            color: white;
        }

        .header a:hover {
            background-color: white;
            color: dodgerblue;
        }

        .header a.active {
            background-color: dodgerblue;
            color: white;
        }

        .header-right {
            float: right;
            color: white;

        }

        @media screen and (max-width: 500px) {
            .header a {
                float: none;
                display: block;
                text-align: left;
            }

            .header-right {
                float: none;
                color: white;
            }
        }

    </style>
</head>
<body>

<body>
<br>
<br>
<br>
<center>
<form method="post" id="mainform"  action="formulaireManager/FormulaireSave.php">
    <div id="chaise">
        <fieldset>
            <legend class="chaise">A quoi votre chaise ressemble-t-elle?</legend>
            <label><input type="radio" name="3" value="1" '.(($poss1->Qualite == 1)?"checked=\"checked\"":"").'><img src="/Workshop2022/image/chaise/1.png" data-picture_id="'.$record['picture_id'].'" width="200" height="180" onclick="getSelection() " ></label>
            <label><input type="radio" name="3" value="2" '.(($poss1->Qualite == 2)?"checked=\"checked\"":"").'><img src="/Workshop2022/image/chaise/2.png" data-picture_id="'.$record['picture_id'].'" width="200" height="180"></label>
            <label><input type="radio" name="3" value="3" '.(($poss1->Qualite == 3)?"checked=\"checked\"":"").'><img src="/Workshop2022/image/chaise/3.png" data-picture_id="'.$record['picture_id'].'" width="200" height="180"></label>
            <label><input type="radio" name="3" value="4" '.(($poss1->Qualite == 4)?"checked=\"checked\"":"").'><img src="/Workshop2022/image/chaise/4.png" data-picture_id="'.$record['picture_id'].' "width="200" height="180"></label>
            <label><input type="radio" name="3" value="5" '.(($poss1->Qualite == 5)?"checked=\"checked\"":"").'><img src="/Workshop2022/image/chaise/5.png" data-picture_id="'.$record['picture_id'].'" width="200" height="180"></label>
        </fieldset>
    </div>
    <div  id="casque">
        <fieldset>
            <legend class="casque">A quoi votre casque ressemble-t-il?</legend>
            <label><input type="radio" name="4" value="1" '.(($poss2->Qualite == 1)?"checked=\"checked\"":"").'><img src="/Workshop2022/image/casque/1.png"  width="200" height="180" onclick="getSelection() " </label>
            <label><input type="radio" name="4" value="2" '.(($poss2->Qualite == 2)?"checked=\"checked\"":"").'><img src="/Workshop2022/image/casque/2.png"  width="200" height="180"></label>
            <label><input type="radio" name="4" value="3" '.(($poss2->Qualite == 3)?"checked=\"checked\"":"").'><img src="/Workshop2022/image/casque/3.png"  width="200" height="180"></label>
            <label><input type="radio" name="4" value="4" '.(($poss2->Qualite == 4)?"checked=\"checked\"":"").'><img src="/Workshop2022/image/casque/4.png"  width="200" height="180"></label>
            <label><input type="radio" name="4" value="5" '.(($poss2->Qualite == 5)?"checked=\"checked\"":"").'><img src="/Workshop2022/image/casque/5.png"  width="200" height="180"></label>
        </fieldset>
    </div>
    <div  id="clavier">
        <fieldset>
            <legend class="clavier">A quoi votre clavier ressemble-t-il?</legend>
            <label><input type="radio" name="1" value="1" '.(($poss3->Qualite == 1)?"checked=\"checked\"":"").'><img src="/Workshop2022/image/clavier/1.png"  width="200" height="130" onclick=onmousemove() </label>
            <label><input type="radio" name="1" value="2" '.(($poss3->Qualite == 2)?"checked=\"checked\"":"").'><img src="/Workshop2022/image/clavier/2.png"  width="200" height="130"></label>
            <label><input type="radio" name="1" value="3" '.(($poss3->Qualite == 3)?"checked=\"checked\"":"").'><img src="/Workshop2022/image/clavier/3.png"  width="200" height="130"></label>
            <label><input type="radio" name="1" value="4" '.(($poss3->Qualite == 4)?"checked=\"checked\"":"").'><img src="/Workshop2022/image/clavier/4.png"  width="200" height="130"></label>
            <label><input type="radio" name="1" value="5" '.(($poss3->Qualite == 5)?"checked=\"checked\"":"").'><img src="/Workshop2022/image/clavier/5.png"  width="200" height="130"></label>
        </fieldset>
    </div>
    <div  id="souris">
        <fieldset>
            <legend class="souris">A quoi votre souris ressemble-t-elle?</legend>
            <label><input type="radio" name="2" value="1" '.(($poss4->Qualite == 1)?"checked=\"checked\"":"").'><img src="/Workshop2022/image/souris/1.png"  width="200" height="180" onclick="getSelection() " </label>
            <label><input type="radio" name="2" value="2" '.(($poss4->Qualite == 2)?"checked=\"checked\"":"").'><img src="/Workshop2022/image/souris/2.png"  width="200" height="180"></label>
            <label><input type="radio" name="2" value="3" '.(($poss4->Qualite == 3)?"checked=\"checked\"":"").'><img src="/Workshop2022/image/souris/3.png"  width="200" height="180"></label>
            <label><input type="radio" name="2" value="4" '.(($poss4->Qualite == 4)?"checked=\"checked\"":"").'><img src="/Workshop2022/image/souris/4.png"  width="200" height="180"></label>
            <label><input type="radio" name="2" value="5" '.(($poss4->Qualite == 5)?"checked=\"checked\"":"").'><img src="/Workshop2022/image/souris/5.png"  width="200" height="180"></label>
        </fieldset>
    </div>
    <input class="send" type="submit" >Envoyez vos informations</input>
</form>



</body>
';