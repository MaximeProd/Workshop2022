<?php
echo $co = "
<form class=\"Register\" action=\"loginRegister/Register.php\" method=\"post\">
          <p>Créer un nouveau compte</p>
          <input value=\"'.$savePostRegister[\"email\"].'\"      type=\"email\" name=\"email\"           placeholder=\"Email\"          maxlength=\"250\"                              required=\"required\">
          <input value=\"'.$savePostRegister[\"mdp\"].'\"        type=\"password\" name=\"mdp\"          placeholder=\"Mot de passe\"            maxlength=\"16\"     minlength=\"4\"    required=\"required\">
          <input value=\"'.$savePostRegister[\"confirmMdp\"].'\" type=\"password\" name=\"confirmMdp\"   placeholder=\"Confirmer mot de passe\"  maxlength=\"16\"     minlength=\"4\"    required=\"required\">
          <input value=\"'.$savePostRegister[\"nom\"].'\"        type=\"text\" name=\"nom\"              placeholder=\"Nom\"            maxlength=\"100\" minlength=\"3\"                required=\"required\">
          <input value=\"'.$savePostRegister[\"prenom\"].'\"     type=\"text\" name=\"prenom\"           placeholder=\"Prénom\"         maxlength=\"70\"  minlength=\"3\"                required=\"required\">
          <p>Civilité</p>
          <div class=\"civilite\"><label for=\"Monsieur\">Monsieur</label>
          <input value=\"Monsieur\" checked                    type=\"radio\" name=\"civilite\">
          <label for=\"Madame\">Madame</label>
          <input value=\"Madame\"                              type=\"radio\"         name=\"civilite\"></div>
          <input value=\"'.$savePostRegister[\"adresse\"].'\"    type=\"text\" name=\"adresse\"          placeholder=\"Adresse\"        maxlength=\"200\">
          <input value=\"'.$savePostRegister[\"ville\"].'\"      type=\"text\" name=\"ville\"            placeholder=\"Ville\"          maxlength=\"200\">
          <input value=\"'.$savePostRegister[\"codePostal\"].'\" type=\"text\" name=\"codePostal\"       placeholder=\"Code postal\"    maxlength=\"10\">
          <input id=\"Enregistrer\" type=\"submit\" name=\"\" value=\"S\'enregistrer\">
        </form>

";