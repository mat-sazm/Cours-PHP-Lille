<?php
session_start();

// On force l'affichage des messages d'erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$title = "20 - Session";

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

    <p>Démarre une session avec <code>session_start()</code></p>

    <pre><?php print_r( $_SESSION ) ?></pre>

    <?php
    // $_SESSION['user'] = [
    //     'firstname' => "Bruce",
    //     'lastname' => "WAYNE"
    // ];
    ?>

    <hr>
    <a href="/">Retour</a>
</body>
</html>