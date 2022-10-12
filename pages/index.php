<?php
//IMPORTANT !!! La fonction appelé à chaque début "Head.php" comme ci dessous crée déjà une session
// ainsi que l'importation de la bdd et une variable contenant l'id et le niveau d'administration du client actuellement connecté
//C'est variable se nomme dans le même ordre $bdd / $ .
require 'paterns/Head.php';
unset($_SESSION["memoryPost"]);

header('Location: LoginRegister.php');


require 'paterns/Foot.php';
?>


