<?php
$title = "06 - Conditions";
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


    <section>
        <h2>Structure IF</h2>

        <p>Execute un code SI la condition se réalise.</p>

        <pre>
        if (condition)
        {
            // Code a executer
        }
        </pre>

        <?php
        $a = 12; 
        if ($a > 30) 
        {
            echo "\$a est superieure à 30";
        }
        ?>
    </section>

    <section>
        <h2>Structure IF ... ELSE </h2>

        <p>Execute un code SI la condition se réalise SINON on execute un code alternatif.</p>

        <pre>
        if (condition)
        {
            // Code a executer si la condition se réalise
        }
        else 
        {
            // Code Alternatif
        }
        </pre>

        <?php
        $a = 30; 
        if ($a > 30) 
        {
            echo "\$a est superieure à 30";
        }
        else 
        {
            echo "\$a est inferieur ou églae à 30";
        }
        ?>

    </section>

    <section>
        <h2>Structure IF ... ELSE IF ... ELSE </h2>

        <pre>
        if (condition 1)
        {
            // Code à executer si condition 1 est VRAI
        }
        else if (condition 2)
        {
            // Code à executer si condition 2 est VRAI
        }
        else if (condition 3)
        {
            // Code à executer si condition 3 est VRAI
        }
        else 
        {
            // Code Alternatif si aucune condition ne se realise
        }
        </pre>

        <?php 
        $age = 22;

        if ($age >= 21) 
        {
            echo "Adulte aux Etats Unis, au Canada et en europe";
        }
        else if ($age >= 18)
        {
            echo "Adulte en europe";
        }
        else if ($age >= 12)
        {
            echo "t'es un ado !";
        }
        else 
        {
            echo "Vas voir maman !";
        }
        ?>
    </section>
    <hr>

    <a href="/">Retour</a>
</body>
</html>