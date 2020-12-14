<?php
$title = "04 - Types de données";
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


    <h2>Chaine de caractère (string)</h2>
    <?php 
    var_dump("Ceci est une chaine");
    ?>

    <h2>Nombre entier (integer)</h2>
    <?php 
    var_dump(42);
    ?>

    <h2>Nombre décimal (decimal / double)</h2>
    <?php 
    var_dump(42.5);
    ?>

    <h2>Booléen (bool)</h2>
    <?php 
    var_dump(true);
    var_dump(false);
    ?>

    <h2>Tableau (array)</h2>
    <?php 
    var_dump( array() );
    var_dump( [] );
    ?>

    <h2>Objet (object)</h2>
    <?php 
    var_dump( (object) array() );
    ?>

    <h2>Fonction (function)</h2>
    <?php 
    var_dump( function(){} );
    ?>

    <h2>NULL</h2>
    NULL : <?php var_dump( NULL );?><br>
    "" : <?php var_dump( "" );?><br>
    false : <?php var_dump( false );?><br>
    0 : <?php var_dump( 0 );?><br>

    <hr>

    <a href="/">Retour</a>
</body>
</html>