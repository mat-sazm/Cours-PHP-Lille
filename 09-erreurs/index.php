<?php

// On force l'affichage des messages d'erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$title = "09 - Niveaux d'erreurs";
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

    <h2>Notice</h2>

    <p>Informe d'une erreur non problematique et continu l'execution du code.</p>
    <?php var_dump($fruit_a) ?>

    <p>Masque un message avec <code>@</code></p>
    <?php var_dump(@$fruit_b) ?>

    <hr>

    <h2>Warning</h2>
    <p>Un Warning informe que quelque chose ne peux pas fonctionner correctement, sans que cela ne gêne la vie de l'application.</p>
    <?php foreach ($fruits as $fruit) {} ?>


    <hr>

    <h2>Fatal</h2>
    <p>Impossible de continuer l'application</p>
    <?php echo coucou(); ?>

    <hr>

    <a href="/">Retour</a>
</body>
</html>