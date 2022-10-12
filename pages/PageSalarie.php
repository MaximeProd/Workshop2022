<?php
require_once "paterns/Head.php";
?>
<html lang="fr">
<link rel="stylesheet" href="../css/PageSalarie.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

<body>
<div class="name"
    <h1>Nom Prenom</h1>
</div>
    <form method="post" id="chaise">
        <fieldset>
            <legend class="title-mat">Votre matériel actuel : </legend>
            <label><img src="/image/chaise/1.png"  width="200" height="180" onclick="getSelection() " ></label>
            <button id="modif" onclick="changeImage();">Modifier</button>
        </fieldset>
    </form>
</body>
</html>