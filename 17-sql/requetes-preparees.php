<?php

// On force l'affichage des messages d'erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$title = "17 - SQL avec PDO (requêtes préparées)";
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
    

    // Deinition DSN
    $db_dsn = $db_type .":";
    $db_dsn.= "host=". $db_host .";";
    $db_dsn.= "dbname=". $db_schema .";";
    $db_dsn.= "port=". $db_port .";";
    $db_dsn.= "charset=". $db_charset .";";
    

    // Instance de connexion
    try {
        $pdo = new PDO($db_dsn, $db_user, $db_pass);
    } catch(PDOException $e) {
        echo "Echec de connexion : ". $e->getMessage();
        die();
    }

    ?>


    <h3>Requête non préparée</h3>

    <pre>
$sql = "SELECT `firstname`, `lastname`, `nickname` FROM `person` WHERE `id`=3";
$query = $pdo->query($sql);
$result = $query->fetch(PDO::FETCH_OBJ);
</pre>

    <h4>Resultat</h4>
    <?php
    $sql = "SELECT `firstname`, `lastname`, `nickname` FROM `person` WHERE `id`=3";
    $query = $pdo->query($sql);
    $result = $query->fetch(PDO::FETCH_OBJ);
    ?>

    <pre><?php print_r($result) ?></pre>

    <h4>recup une propriété de l'object <code>$result</code></h4>
    <pre>echo $result->nickname; // <?= $result->nickname ?></pre>


    <hr>
    <hr>
    <hr>

    <h3>Requête préparée avec <code>bindValue()</code></h3>

    <pre>
$id = 3;
$sql = "SELECT `firstname`, `lastname`, `nickname` FROM `person` WHERE `id`= ?";
$query = $pdo->prepare($sql);

$query->bindValue(1, $id);
$query->execute();

$result = $query->fetch(PDO::FETCH_OBJ);
</pre>

    <h4>Resultat</h4>
    <?php
    $id = 3;
    // $id = $_GET['id'] ?? null;
    $sql = "SELECT `firstname`, `lastname`, `nickname` FROM `person` WHERE `id`= ?";
    // $sql = "SELECT `firstname`, `lastname`, `nickname` FROM `person` WHERE `id`= ? AND `firstname`= ?";
    $query = $pdo->prepare($sql);

    $query->bindValue(1, $id);
    // $query->bindValue(2, "George");
    $query->execute();

    $result = $query->fetch(PDO::FETCH_OBJ);
    ?>

    <pre><?php print_r($result) ?></pre>


    <hr>
    <a href="/">Retour</a>
</body>
</html>