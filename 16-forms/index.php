<?php

// On force l'affichage des messages d'erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$title = "16 - Formulaires";

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

    <p>On utilise la balise <code>&lt;form&gt;</code> pour déclarer un formulaire</p>
    <p>Un formulaire permet d'interagir avec l'utilisateur</p>

    <p>l'attribut <code>method</code> défini la méthode de requête HTTP. valeur possible <code>GET</code> ou <code>POST</code></p>
    <p>l'attribut <code>action</code> défini l'adresse du script qui va traiter les données.</p>

    <hr>

    <form method="GET">

        <label for="nickname">Votre Pseudo</label>
        <input type="text" name="nickname" id="nickname">

        <br>

        <button type="submit">Envois</button>
        <button type="reset">Annuler</button>

    </form>
    
    <hr>
    <a href="/">Retour</a>
</body>
</html>