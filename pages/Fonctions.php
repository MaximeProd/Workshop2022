
<?php
//Session :
//https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/4239476-session-cookies
//Array :
//https://www.php.net/manual/fr/control-structures.foreach.php
function getDataBase() {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=Workshop2022;charset=utf8',
            'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    } catch (Exception $exception) {
        $bdd = null;
    }
    return $bdd;
}

function afficherErreur($erreur = null){
    if (!empty($erreur)){
        $_SESSION["erreur"]=$erreur;
    }
    if (isset($_SESSION["erreur"])){
        $valueErreur = $_SESSION["erreur"];
        if ($valueErreur  == 1){
            $erreur = 'Veuillez contacter l\'administrateur dès les plus bref délai!!';
        } elseif ($valueErreur  == 2) {
            $erreur = 'Mot de passe ou email incorrect';
        } elseif ($valueErreur  == 3) {
            $erreur = 'Email incorrect';
        }
        unset($_SESSION["erreur"]);
    }
    if (isset($erreur)){
        echo '
          <div class="erreur">
            <p>' . $erreur . '</p>
          </div>
          ';
    }
}

function getSalarieWithIdManager(PDO $bdd, $idManager) {
    $query = "SELECT * FROM `salarie` WHERE IdEquipe = (Select IdEquipe FROM `salarie` where IdSalarie = {$idManager} LIMIT 1)";

    $statement = $bdd->prepare($query);

    $liste = null;
    if ($statement->execute()) {
        $liste = $statement->fetchALL(PDO::FETCH_OBJ);
        //On finie par fermer la ressource
        $statement->closeCursor();
    }
    return $liste;
}
function checkfirstConnection(PDO $bdd, $idClient) {
    $query = "Select * From salariepossession Where IdSalarie = {$idClient}";

    $statement = $bdd->prepare($query);

    $liste = null;
    if ($statement->execute()) {
        $liste = $statement->fetchALL(PDO::FETCH_OBJ);
        //On finie par fermer la ressource
        $statement->closeCursor();
    }
    if (isset($liste) and $liste > 0) {
        return false;
    }else{
        return true;
    }
}

function getListe(PDO $bdd,$askListe,Array $args = [], $search = False) {
    //Pour utiliser cette fonction il faut lui envoyer :
    //La bdd
    //Le(s) table au quel on veux accéder
    //Une liste des condtions à récupérer tel que :
    // array(arg1 => value1, arg2 => value 2, etc)
    //Avec un exemple :
    // array( 'idClient' => 15, 'prenom' => 'Maxime')

    $query = "SELECT * FROM {$askListe} WHERE 1 ";

    //Etape 1 : On génère la requête sql avec les arguments demandés :
    foreach ($args as $key => $arg) {
        $query = "{$query} AND {$key} LIKE :p_{$key} ";
    }
    //Affectation des paramètres (Pour rappel les paramètres (p_arg) sont une sécuritée)

    $statement = $bdd->prepare($query);
    foreach ($args as $key => $arg) {

        if ($search) {
            var_dump($search);
            $arg = $arg . '%';
        }
        $para = ':p_'.$key;
        $statement->bindValue($para, $arg);
    }

    //On réalise la requète et on renvoie le résultat
    $liste = null;
    if ($statement->execute()) {
        $liste = $statement->fetchALL(PDO::FETCH_OBJ);
        //On finie par fermer la ressource
        $statement->closeCursor();
    }
    return $liste;
}

function getPost($askGet){
    if (isset($_POST[$askGet])) {
        return htmlspecialchars($_POST[$askGet]);
    } else {
        return '';
    }
}

function displayChambre($chambres)
{
    if ($chambres) {
        foreach ($chambres as $chambre) {
            // Afficher
            echo '
        <div class="chambre">
          <img src="images/neptune.png">
          <div class="division">
            <h2>Chambre ' . $chambre->numero . '</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non  </p>
            <form action="PageReservation.php" method="POST">
                <input type="hidden" name="numChambre" value="'.$chambre->numero.'">
                <input type="submit" value="Voir les réservations"/>
            </form>
          </div>
        </div>
        ';
        }
    }
    else {
            echo "<p>Aucun résulat</p>";
        }
}

function getSalarie(PDO $bdd, $Email){
    return getListe($bdd,'salarie',Array("email" => $Email),Array());
}