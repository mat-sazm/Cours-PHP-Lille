<?php
$title = "01 - Commentaires";
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

    <h2>Commentaire sur une ligne</h2>
    <p>raccourcis clavier VSCode<br>Mac : <code>cmd + shif + /</code><br>Win : <code>ctrl + /</code></p>

    <!-- Commentaire HTML -->

    <?php
    // Ceci est un commentaires sur une ligne
    // Ne pas mettre de données sensible : (ex:  MDP: 123456)
    ?>

    <h2>Commentaire Multilignes</h2>

    <?php 
    /* ceci 
    est 
    un
    commentaire
    multilignes */
    ?>

    <h2>Commentaire de documentaion</h2>

    <?php
    /**
     * Ceci est un commentaire de documentation
     */

    /**
     * Faire une addition
     *
     * @param integer $a
     * @param integer $b
     * @return integer
     */
    function addition(int $a, int $b=0): int
    {
        return $a + $b;
    }
    ?>

    <a href="/">Retour</a>
</body>
</html>