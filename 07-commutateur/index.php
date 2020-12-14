<?php
$title = "07 - Commutateur";
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
        $color = "red";

        if ($color == "green") 
        {
            echo "C'est vert";
        }
        else if ($color == "blue")
        {
            echo "C'est bleu";
        }
        else if ($color == "red")
        {
            echo "C'est rouge";
        }
        else 
        {
            echo "C'est pas défini !";
        }
        ?>
    </section>

    <hr>

    <section>
        <h2>Le commutateur</h2>

        <pre>
        switch (condition)
        {
            case "A": 
                // Code si condition == "A"
                break;

            case "B": 
                // Code si condition == "B"
                break;
            
            default:
                // Code alternatif
        }
        </pre>

        <?php
        switch ($color)
        {
            case "green":
                echo "C'est vert";
                break;

            case "blue":
                echo "C'est bleu";
                break;

            case "red":
                echo "C'est rouge";
                break;

            default:
                echo "C'est pas défini !";
        }
        ?>
    </section>

    <hr>

    <a href="/">Retour</a>
</body>
</html>