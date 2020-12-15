<?php
$title = "03 - Constantes";
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

    <p>Un espace mémoire du serveur, qui prend le type et la taille de ce qu'on lui affecte ET qui reste fixe de la déclaration jusqu'a la fin du programme.</p>
    

    <h2>Déclaration d'une constante</h2>

    <p>On utilise la fonction <code>define()</code> pour déclarer une constante</p>
    <p>Param 1 : Nom de la constante</p>
    <p>Param 2 : Valeur de la constante</p>
    <p>Param 3 : Boolean "case_insensitive" </p>

    <?php
    define("MA_CONSTANTE", "La valeur de la constante");
    ?>

    <hr>

    <p>On utilise le mot clé <code>const</code></p>

    <?php
    const MA_SECONDE_CONSTANTE = 42;
    ?>



    <h2>Règles de nommage</h2>
    <ul>
        <li>Peut contenir des caracères Alpahbétique, Numérique et _</li>
        <li>NE PEUT PAS contenir de caractère spécial : <s>&"(èéàç'+-.;?,/\</s></li>
        <li>NE PEUT PAS commencer par un Numérique</li>
        <li>Toujours en majuscule.</li>
    </ul>


    <h2>Appel d'une constante</h2>

    <?php var_dump( MA_CONSTANTE ) ?>
    <br>
    <?php var_dump( MA_SECONDE_CONSTANTE ) ?>

    <hr>


    <h2>Définir l'existance d'un constante</h2>

    <p>La constante <code>MA_CONSTANTE_2</code> n'esxiste pas, PHP génère un Warning et retourne le nom de la constante</p>
    <?= MA_CONSTANTE_2 ?>


    <p>Test l'existance de la constante <code>MA_CONSTANTE_3</code></p>

    <?php
    if ( defined("MA_CONSTANTE_3") )
    {
        var_dump(MA_CONSTANTE_3);
    }
    else{
        echo "La constante MA_CONSTANTE_3 n'est pas definie.";
    }
    ?>

    <hr>


    <a href="/">Retour</a>
</body>
</html>