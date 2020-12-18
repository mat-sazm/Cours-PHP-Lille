<?php

// On force l'affichage des messages d'erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$title = "17 - SQL avec PDO";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>
<body>
    <h1><?= $title ?></h1>


    <h2>Connexion</h2>

    <h3>Définition des paramètres</h3>

    <pre>
// Infos Minimum
$db_host = "";      // Adresse du serveur de BDD
$db_user = "";      // Nom d'utilisateur de la BDD
$db_pass = "";      // Mot de passe de l'utilisateur de la BDD
$db_schema = "";    // Nom de la BDD

// Autres Infos
$db_type = "";      // Type de la BDD
$db_port = 3306;    // Port d'ecoute de la BDD
$db_charset = "";   // Jeux de caractères de la BDD
    </pre>

    <?php
    // Infos Minimum
    $db_host = "127.0.0.1"; // 127.0.0.1 ou localhost ou l'adresse fournit par votre hébergeur
    $db_user = "osw3"; // root
    $db_pass = "myosw3sql";
    $db_schema = "cours_discotheque";

    // Autres Infos
    $db_type = "mysql";
    $db_port = 3306;
    $db_charset = "utf8";
    ?>

    <hr>


    <h3>Création de la connexion</h3>

    <h4>Definition DSN</h4>

    <p>Definir la DSN (Domain Source Name)</p>

    <pre>
// ex : $db_dsn = "mysql:host=127.0.0.1;dbname=cours_discotheque;port=3306;charset=utf8";

$db_dsn = $db_type .":";
$db_dsn.= "host=". $db_host .";";
$db_dsn.= "dbname=". $db_schema .";";
$db_dsn.= "port=". $db_port .";";
$db_dsn.= "charset=". $db_charset .";";
    </pre>

    <?php
    $db_dsn = $db_type .":";
    $db_dsn.= "host=". $db_host .";";
    $db_dsn.= "dbname=". $db_schema .";";
    $db_dsn.= "port=". $db_port .";";
    $db_dsn.= "charset=". $db_charset .";";
    ?>

    <h5>Ma phrase DSN</h5>
    <pre><?= $db_dsn ?></pre>


    <hr>

    <h3>Instance de connexion</h3>

    <pre>
try {
    $pdo = new PDO($db_dsn, $db_user, $db_pass);
} catch(PDOException $e) {
    echo "Echec de connexion : ". $e->getMessage();
    die();
}
    </pre>

    <?php
    try {
        $pdo = new PDO($db_dsn, $db_user, $db_pass);
    } catch(PDOException $e) {
        echo "Echec de connexion : ". $e->getMessage();
        die();
    }
    ?>

    <hr>
    <hr>
    <hr>

    <h2>Première requête</h2>

    <h3>Définition de la requête</h3>

    <pre>
$sql = "SELECT * FROM person";
$query = $pdo->query($sql);
    </pre>

    <?php
    $sql = "SELECT * FROM person";
    $query = $pdo->query($sql);
    ?>

    <p><code>$query</code> contient le PDO Statment</p>
    <pre><?php print_r($query) ?></pre>
    

    <h3>execution de la requête</h3>

    <pre>
$results = $query->fetchAll();
$results = $query->fetchAll(PDO::FETCH_BOTH); // Retourne un tableau associatif ET numerique 
$results = $query->fetchAll(PDO::FETCH_ASSOC); // Retourne un tableau associatif 
$results = $query->fetchAll(PDO::FETCH_OBJ); // Retourne un objet
    </pre>

    <?php
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    ?>

    <!--
    <pre><?php print_r($results) ?></pre>
    -->

    <?php foreach ($results as $person): ?>
    ---------------------<br>
    <!--
    <pre><?php print_r($person) ?></pre>
    -->
    <pre><?php print_r( $person->nickname ) ?></pre>
    ======================<br>
    <?php endforeach; ?>

    <hr>
    <a href="/">Retour</a>
</body>
</html>