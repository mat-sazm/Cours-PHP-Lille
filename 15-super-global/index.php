<?php
session_start();

// On force l'affichage des messages d'erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$title = "15 - Supers Globales";

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

    <p>Syntaxe <code>$_NOM</code></p>
    <p>l'utilisateur créé la variable <code>$_TEST</code> n'est pas une super globale</p>

    <h2>$_SERVER</h2>
    <p>Contient les informations du serveur qui execute le script</p>
    <pre><?php print_r( $_SERVER ) ?></pre>

    <h2>$_REQUEST</h2>
    <p>Contient les informations de la requête</p>
    <pre><?php print_r( $_REQUEST ) ?></pre>

    <h2>$_GET</h2>
    <p>Contient les informations transmise en clair dans l'URL de la requête</p>
    <pre><?php print_r( $_GET ) ?></pre>

    <h2>$_POST</h2>
    <p>Contient les informations transmise dans l'entête HTTP de la requête</p>
    <pre><?php print_r( $_POST ) ?></pre>
    
    <h2>$_COOKIE</h2>
    <p>Contient les informations des cookies du domaine qui execute le script</p>
    <pre><?php print_r( $_COOKIE ) ?></pre>

    <h2>$_FILES</h2>
    <p>Contient les informations des fichiers uploadé (téléversé)</p>
    <pre><?php print_r( $_FILES ) ?></pre>
    
    <h2>$_SESSION</h2>
    <p>Contient les informations d'une session PHP</p>
    <pre><?php print_r( $_SESSION ) ?></pre>

    <hr>
    <a href="/">Retour</a>
</body>
</html>