<?php

// On force l'affichage des messages d'erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$title = "18 - Password";

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

    <?php
    $str_origin = "123456";

    // Encodage du Mot de passe
    $str_encoded_1 = password_hash( $str_origin, PASSWORD_DEFAULT );
    $str_encoded_2 = password_hash( $str_origin, PASSWORD_BCRYPT );

    // Verification du mot de passe
    $str_verified_1 = password_verify( $str_origin, $str_encoded_1);
    $str_verified_2 = password_verify( "1234567", $str_encoded_2);

    ?>

<pre style="background-color: #C0C0C0; padding: 15px; color: #000000">
Chaine original : <?= $str_origin ?> 
Chaine encodé 1 : <?= $str_encoded_1 ?> 
Chaine encodé 2 : <?= $str_encoded_2 ?> 
Chaine vérifiée 2 : <?php var_dump($str_verified_1) ?>
Chaine vérifiée 2 : <?php var_dump($str_verified_2) ?> 
    </pre>

    <hr>
    <a href="/">Retour</a>
</body>
</html>