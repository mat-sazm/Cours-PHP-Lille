<?php

// On force l'affichage des messages d'erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



// Lister les tracks de l'album id=2 et le titre de l'album

// Database Connection
// --


// Infos Minimum
$db_host = "127.0.0.1"; // 127.0.0.1 ou localhost ou l'adresse fournit par votre hébergeur
$db_user = "osw3";      // "root"
$db_pass = "myosw3sql"; // ""
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

// La bdd ne se connecte pas si :
// Host = mauvaise adresse
// USER = non référencé sur SQL
// MDP = pas celui de l'utilisateur
// PORT = incorrect
// Schema = innexistant / faute de frappe
// serveur innaccessible ou trop lent


// /////////////////////////////////////////////////////////////////////////////


// Identification de l'albuml ID=2
$id = 12;
$sql = "SELECT
    t1.title as album_title,
    t3.title as track_title

FROM
    `release` as t1
    INNER JOIN release_track_relation as t2 ON t2.release_id=t1.id
    INNER JOIN track as t3 ON t3.id=t2.track_id

WHERE
    t1.id=:id
";
$query = $pdo->prepare($sql);

$query->bindParam(':id', $id, PDO::PARAM_INT);
$query->execute();

$results = $query->fetchAll(PDO::FETCH_OBJ);

$album_title = $results[0]->album_title
?>

<h2><?= $album_title ?></h2>

<ul>
<?php foreach ($results as $track): ?>
    <li><?= $track->track_title?></li>
<?php endforeach; ?>
</ul>

<hr>


<pre><?php print_r($results) ?></pre>
