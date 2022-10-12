
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

function getPath(){
    $directory = $_SERVER["DOCUMENT_ROOT"];
    if(gethostname() == 'DESKTOP-NS2VGVV')
        return $directory;
    else
        return $directory."/Workshop2022/";
}

function redirectFormulaire(PDO $bdd, $idClient){
    if(checkfirstConnection($bdd,$idClient)){
        header('Location:'. getPath().'/pages/FormualaireSalarie.php');
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

function getFirst(PDO $bdd, $table ,Array $args = [], $search = False) {
    $query = "SELECT * FROM {$table} WHERE 1 ";

    //Etape 1 : On génère la requête sql avec les arguments demandés :
    foreach ($args as $key => $arg) {
        $query = "{$query} AND {$key} LIKE :p_{$key} ";
    }
    $query = "{$query} LIMIT 1";

    //Affectation des paramètres (Pour rappel les paramètres (p_arg) sont une sécuritée)
    $statement = $bdd->prepare($query);
    foreach ($args as $key => $arg) {

        if ($search) {
            $arg = $arg . '%';
        }
        $para = ':p_'.$key;
        $statement->bindValue($para, $arg);
    }

    //On réalise la requète et on renvoie le résultat
    $liste = null;
    if ($statement->execute()) {
        $liste = $statement->fetch(PDO::FETCH_OBJ);
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

function getSalarie(PDO $bdd, $Email){
    return getListe($bdd,'salarie',Array("email" => $Email),Array());
}

function getSalariePossession(PDO $bdd, $idSalarie, Array $args = []) {
    $query = "SELECT * FROM salarie, salariepossession, type_materiel 
         WHERE salariepossession.IdSalarie = salarie.IdSalarie 
           and salariepossession.IdType = type_materiel.IdType
           and salarie.IdSalarie = :idSalarie
         ORDER BY salariepossession.Qualite;";

    $statement = $bdd->prepare($query);
    $statement->bindParam(':idSalarie', $idSalarie);

    $liste = null;
    if ($statement->execute()) {
        $liste = $statement->fetchAll(PDO::FETCH_OBJ);
        //On finie par fermer la ressource
        $statement->closeCursor();
    }
    return $liste;
}

function getFutureFormation(PDO $bdd, $dateAjd, $idEquipe, $getOnlyNotInscrit){
    $query = "SELECT * FROM formation where IdFormation";

    if($getOnlyNotInscrit)
        $query = $query . " not in ";
    else
        $query = $query . " in ";

    $query = $query . "(select IdFormation from equipeparticipation where IdEquipe = :idEquipe) 
        and DateFormation > :dateAjd
         ORDER BY DateFormation";

    $statement = $bdd->prepare($query);
    $statement->bindParam(':dateAjd', $dateAjd);
    $statement->bindParam(':idEquipe', $idEquipe);

    $liste = null;
    if ($statement->execute()) {
        $liste = $statement->fetchAll(PDO::FETCH_OBJ);
        //On finie par fermer la ressource
        $statement->closeCursor();
    }
    return $liste;
}
