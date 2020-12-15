<?php

// On force l'affichage des messages d'erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$title = "13 - Inclusion";
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

    <p><code>include</code> pour inclure un fichier dans le programme</p>
    <p><code>include_once</code> pour inclure UNE SEULE FOIS un fichier dans le programme</p>

    <p><code>require</code> pour inclure un fichier VITAL dans le programme</p>
    <p><code>require_once</code> pour inclure UNE SEULE FOIS un fichier VITAL dans le programme</p>

    <h2>Inclusion de Page A</h2>

    <?php include "page-a.php" ?>



    <h2>Inclusion de Page B</h2>

    <?php include "page-b.php" ?>



    <hr>

    <h2>Inclusion de Page C</h2>

    <?php include "page-c.php" ?>
    <?php include "page-c.php" ?>



    <h2>Inclusion de Page D</h2>

    <?php include_once "page-d.php" ?>
    <?php include_once "page-d.php" ?>

    <hr>


    <h2>Inclusion de Page E</h2>

    <?php include "page-e.php" ?>
    <hr>


    <h2>Inclusion de Config</h2>

    <?php require "config.php" ?>
    <?php require_once "config.php" ?>
    
    <a href="/">Retour</a>
</body>
</html>