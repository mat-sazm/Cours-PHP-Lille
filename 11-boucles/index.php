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

    <p>Une boucle permet de répéter une serie d'instructions.</p>

    <h2>Boucle WHILE</h2>

    <pre>while (condition) { /* code a executer */ } </pre>

    <?php
    $i = 0;
    // $i = 100;

    while ($i < 10)
    {
        echo "i = ". $i . "<br>";
        $i++;
    }
    ?>

    <hr>


    <h2>Boucle DO WHILE</h2>

    <pre>do {/* Code a executer */} while (condition) </pre>

    <?php
    $j = 0;
    // $j = 100;

    do {
        echo "j = $j<br>";
        $j++;
    } while ($j < 10)
    ?>


    <hr>

    <h2>Boucle FOR</h2>

    <pre>for (initialisation; condition; incrementation) { /* Code à executer */ } </pre>

    <?php
    for ($k = 0; $k < 10; $k++)
    {
        echo "k = $k<br>";
    }
    ?>


    <hr>

    <h2>Boucle FOREACH</h2>

    <?php
    // $fruits = array(
    //     /* 0 */ "Pommes", 
    //     /* 1 */ "Poires", 
    //     /* 2 */ "Bananes", 
    //     /* 3 */ "Fraises"
    // );

    $fruits = array(
        /* 10 */ 10 => "Pommes", 
        /* 11 */ "Poires", 
        /* 12 */ "Bananes", 
        /* 13 */ "Fraises"
    );
    ?>

    <pre><?php print_r($fruits) ?></pre>

    <pre>foreach ($array as $key => $value) { /* Code à executer */ }</pre>
    <pre>foreach ($array as $value) { /* Code à executer */ }</pre>

    <div>
    <?php 
    foreach ($fruits as $key => $fruit)
    {
        echo "Fruit : $fruit ($key) <br>"; 
    }
    ?>
    </div>

    <hr>

    <div>
    <?php foreach ($fruits as $key => $fruit): ?>
        Fruit : <?= $fruit ?> (<?= $key ?>)<br>
    <?php endforeach; ?>
    </div>

    <hr>

    <div>
    <?php 
    foreach ($fruits as $fruit)
    {
        echo "Fruit : $fruit <br>"; 
    }
    ?>
    </div>

    <hr>

    <div>
    <?php foreach ($fruits as $fruit): ?>
        Fruit : <?= $fruit ?><br>
    <?php endforeach; ?>
    </div>

    <hr>

    <?php 
    for ($a = 0; $a < count($fruits); $a++)
    {
        echo "Fruit : $fruits[$a] ($a)<br>"; 
    }
    ?>

    <hr>

    <a href="/">Retour</a>
</body>
</html>
