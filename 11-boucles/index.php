<?php

// On force l'affichage des messages d'erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$title = "11 - Boucles";
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

    <h2>Boucle WHILE</h2>
    <hr>
    
    <h2>Boucle DO WHILE</h2>
    <hr>
    
    <h2>Boucle FOR</h2>
    <hr>
    
    <h2>Boucle FOREACH</h2>
    <hr>

    <a href="/">Retour</a>
</body>
</html>
