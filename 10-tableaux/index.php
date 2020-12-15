<?php

// On force l'affichage des messages d'erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$title = "10 - Tableaux";
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

    <h2>Creation d'un tableau</h2>

    <p>Un tableau est un collection de données.</p>
    <p>chaque ligne du tableau est séparée par une virgule</p>

    <pre>$monTableau = [];</pre>

    <?php
    $monTableau = [
        "ceci est une chaine",
        42,
        true,
        [
            "chaine d'un sous tableau"
        ]
    ];
    ?>


    <hr>


    <h2>Débug d'un tableau</h2>

    <h3>Debug avec la sortie "print_r()"</h3>
    
    <?php print_r($monTableau) ?>
    <pre><?php print_r($monTableau) ?></pre>    

    
    <h3>Debug avec la sortie "var_dump()"</h3>

    <?php var_dump($monTableau) ?>
    <pre><?php var_dump($monTableau) ?></pre>    

    <hr>

    <h2>Deux types de tableaux</h2>

    <h3>Tableaux numériques</h3>

    <pre>$fruits = ["Pommes", "Poires", "Bananes"];</pre>
    <?php 
    $fruits = [
        /* 0 */ "Pommes", 
        /* 1 */ "Poires", 
        /* 2 */ "Bananes"
    ];
    ?>
    <pre><?php print_r($fruits) ?></pre> 
    
    
    <h3>Tableaux associatifs</h3>

    <pre>$batman = ['firstname' => "Bruce", 'lastname' => "Wayne", 'age' => 81];</pre>
    <?php 
    $batman = [
        'firstname' => "Bruce", 
        'lastname' => "Wayne", 
        'age' => 81
    ];
    ?>
    <pre><?php print_r($batman) ?></pre> 

    <hr>

    <?php 
    $numAndAssoc = [
        'firstname' => "Bruce", 
        'age' => 81,
        "Ceci est une chaine",
        true,
        42
    ];
    ?>
    <pre><?php print_r($numAndAssoc) ?></pre> 


    <hr>

    <h2>Parcourir les tableaux</h2>

    <p>Pour parcourir les tableaux, on fait référence au tableau puis on utilise les crochets.</p>

    <h3>Parcourir les tableaux numériques</h3>

    <?= $fruits[0] ?><br>
    <?= $fruits[2] ?>

    <h3>Parcourir les tableaux multidimensions</h3>

    <pre><?php print_r( $monTableau[3][0] ) ?></pre>

    <h3>Parcourir les tableaux associatifs</h3>

    <?= $batman['firstname'] ?><br>
    <?= $batman['age'] ?>

    <hr>

    <a href="/">Retour</a>
</body>
</html>
