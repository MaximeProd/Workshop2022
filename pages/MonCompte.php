<?php
require "Fonctions.php";
//Une variable $idClient est disponible à chaque page.
require 'paterns/Head.php';
//Partie code
if (!isset($_SESSION['idClient'])){
    header('Location: LoginRegister.php');
} else {
    $bdd = getDatabase();
    if (isset($bdd)) {
        $membre = getListe($bdd, "salarie", array("IdSalarie" => $idClient));

        $membre = $membre[0];

        echo '<link rel="stylesheet" href="../css/MonCompte.css">
              <div class="cadre">
              <div class="bandeau">
                <h3>Mon Compte</h3>
                <div class="formulaire">
                  <h4>Informations personnelles</h4>
                  <hr>
                  <form class="" action="loginRegister/Update.php" method="post">
                      <label for="nom">Nom</label>                 <input type="text" name="nom"        value="' . $membre->NomSalarie . '"            placeholder="Nom"            maxlength="100" minlength="3" required>
                      <label for="prenom">Prénom</label>           <input type="text" name="prenom"     value="' . $membre->PrenomSalarie . '"         placeholder="Prénom"         maxlength="70"  minlength="3" required>
                      <label for="adresse">Adresse</label>         <input type="text" name="adresse"    value="' . $membre->Adresse . '"        placeholder="Adresse"        maxlength="200">
                    <input id="Modif" type="submit" name="" value="Modifier son compte">
                  </form>
                </div>
                <div class="formulaire">
                  <h4>Modifier mot de passe</h4>
                  <hr>
                  <form class="" action="loginRegister/Updatepassword.php" method="post">
                    <label for="Mot de passe">Mot de passe</label>
                    <input type="password" name="mdp"          placeholder="Mot de passe"        maxlength="16"     minlength="4" required>
                    <label for="newMdp">Nouveau mot de passe</label>
                    <input type="password" name="newMdp"   placeholder="Confirmer mot de passe"  maxlength="16"     minlength="4" required>
                    <label for="confMdp">Comfirmer mot de passe</label>
                    <input type="password" name="confMdp" placeholder="Comfirmer mot de passe"       maxlength="16"     minlength="4" required>
                    <input id="Mdp" type="submit" name="confirmMdp" value="Modifier mot de passe">
                  </form>
                </div>
                <div class="formulaire">
                  <h4>Supprimer son compte</h4>
                  <hr>
                  <form class="" action="loginRegister/RemoveCompte.php" method="post">
                    <label for="Mot de passe">Mot de passe</label>
                    <input type="password" name="mdp" value="" placeholder="Mot de passe" required>
                    <input id="Supr" type="submit" name="" value="Supprimer">
                  </form>
                  <form class="Register" action="loginRegister/Logout.php" method="post">
                    <input id="Deco" type="submit" name="" value="Se déconnecter">
                  </form>
                </div>
              </div>
            </div>';
    }
}





require 'paterns/Foot.php';
?>