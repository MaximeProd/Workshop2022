<?php
require 'paterns/Head.php';
//Partie code
//Gestion des erreurs

//Affichage de la connexion et de l'inscription
// Solution de sortie -> Vers Login.php ou Register.php
echo '</div>
      <div class="LoginRegister">
        <link rel="stylesheet" href="../css/LoginRegister.css">
        <form class="Login" action="loginRegister/Login.php" method="post">
          <p>Déja inscrit?</p>
          <input type="email"    name="email" value="" placeholder="email"        required="required">
          <input type="password" name="mdp"   value="" placeholder="Mot de passe" required="required">
          <input id="Connexion" type="submit" name="" value="Connexion">
        </form>
        <hr>
      </div>';
require 'paterns/Foot.php';
?>