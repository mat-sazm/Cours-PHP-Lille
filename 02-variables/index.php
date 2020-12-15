<?php

// On force l'affichage des messages d'erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$title = "02 - Variables";
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

    <p>Un espace mémoire du serveur, qui prend le type et la taille de ce qu'on lui affecte.</p>

    <h2>Déclaration d'une variable "$a"</h2>
    <?php $a; ?>

    <p>La variable prend vie lors de la déclaration, et meurt à la fin du fichier.</p>
    <p>La variable "$a" contient : </p>
    <pre><?php var_dump($a) ?></pre>

    <hr>

    <h2>Règles de nommage</h2>
    <ul>
        <li>On déclare une variable avec le symbole "$"</li>
        <li>Peut contenir des caracères Alpahbétique, Numérique et _</li>
        <li>NE PEUT PAS contenir de caractère spécial : <s>&"(èéàç'+-.;?,/\</s></li>
        <li>NE PEUT PAS commencer par un Numérique</li>
        <li>Peut être ecrite en slug <code>$ma_variable;</code>, camelcase <code>$maVariable;</code>, upper camelcase <code>$MaVariable;</code></li>
    </ul>

    <hr>

    <h2>Affectation de données</h2>
    <?php $b = "Ceci est ma variable B."; ?>
    <p>La variable "$b" contient : </p>
    <pre><?php var_dump($b) ?></pre>

    <?php $c = 42; ?>
    <p>La variable "$c" contient : </p>
    <pre><?php var_dump($c) ?></pre>

    <?php $c = "Ceci est la valeur de \$c"; ?>
    <p>La variable "$c" contient : </p>
    <pre><?php var_dump($c) ?></pre>

    <hr>

    <h2>Double et Simple quotes</h2>

    <?php $d = 42; ?>

    <?php 
    $doubleQuote = "Texte entre double quote. voir la variable $d"; 
    echo $doubleQuote;
    ?>

    <br>

    <?php 
    $simpleQuote = 'Texte entre simple quote. voir la variable $d'; 
    echo $simpleQuote;
    ?>

    <hr>

    <h2>Définir l'existance d'une variable</h2>

    <p>La variable <code>$aa</code> n'existe pas, PHP génère une Notice et retourne <code>NULL</code></p>
    <?php 
    var_dump( $aa );
    ?>

    <br>

    <p>On test l'existance de la variable <code>$bb</code></p>
    <?php

    if ( isset( $bb ) )
    {
        var_dump( $bb );
    }
    else {
        echo "La variable \$bb n'existe pas.";
    }
    ?>

    <hr>

    <h2>Détriure une variable</h2>

    <p>La variable "$d" contient : </p>
    <pre><?php var_dump($d) ?></pre>

    <?php unset($d) ?>
    <p>La variable "$d" contient : </p>
    <pre><?php var_dump($d) ?></pre>

    <hr>
    
    <a href="/">Retour</a>
</body>
</html>