<?php

// On force l'affichage des messages d'erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$title = "13 - Portée";
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
    $var_a = "Valeur de la variable A";
    const CONSTANT_A = "Valeur de la constante A";
    $var_d = "Valeur de la variable D";
    ?>

    <?php 
    function fnc_a() {
        global $var_c;
        $var_b = "Valeur de la varibler B";
        $var_c = "Valeur de la varibler C";
        return "Valeur de la fonction A";
    }
    function fnc_b($param_a="Valeur du param A")
    {
        global $var_d;

        echo fnc_a();
        echo $var_d;
        echo CONSTANT_A;
        return $param_a;
    }
    ?>


    <hr>


    <?= $var_c ?><br>
    <?= $var_a ?><br>
    <?= CONSTANT_A ?><br>
    <?= fnc_a() ?><br>
    <?= fnc_b() ?><br>
    <?= $var_b ?><br>
    <?= $var_c ?><br>

    <hr>
    
    <a href="/">Retour</a>
</body>
</html>