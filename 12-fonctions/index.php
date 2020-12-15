<?php

// On force l'affichage des messages d'erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$title = "12 - Fonctions";
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

    <p>Une fonction stocke une série d'instructions.</p>
    <p>Une fonction est une procédure nommée.</p>


    <h2>Déclarer une fonction</h2>
    <pre>function nomDeLafnc() { /* code à executer */ }</pre>

    <?php
    function maPremiereFonction()
    {
        echo "Instruction 1<br>";
        echo "Instruction 2<br>";
        echo "Instruction 3<br>";
        echo "Instruction 4<br>";
    }
    ?>


    <h2>Appel d'une fonction</h2>

    <p>On utilise une fonction en faisant appel à son nom suivi de parenthese</p>

    <pre>nomDeLafnc();</pre>

    ==========================<br>
    <?php maPremiereFonction() ?>
    **************************<br>



    <hr>

    <h2>Fonction avec paramètre(s) en entrée</h2>
    <pre>function nomDeLafnc($param, $param, ...) { /* code à executer */ }</pre>

    <?php
    function maSecondeFonction($param1, $param2)
    {
        echo "Instruction 1 : $param1 -- $param2<br>";
        echo "Instruction 2 : $param1 -- $param2<br>";
        echo "Instruction 3 : $param1 -- $param2<br>";
        echo "Instruction 4 : $param2 -- $param1<br>";
    }
    ?>

    ==========================<br>
    <?php //maSecondeFonction( "Valeur de Param1", "Valeur de Param2" ) ?>
    <?php maSecondeFonction( "Valeur de Param2", "Valeur de Param1" ) ?>
    **************************<br>

    <h3>exemples</h3>
    <?php
    function addition($truc, $bidule)
    {
        $somme = $truc+$bidule;
        echo "$truc + $bidule = $somme<br>";
    }
    ?>

    <?php
    addition(5, 10);
    addition(145, 54);
    ?>


    <hr>

    <h2>Sortie de fonction</h2>

    <pre>function nomDeLaFnc( $param1, $param2 ) { /* code à executer */ return $xxx; }</pre>

    <?php
    function substraction($a, $b)
    {
        return $a - $b;
    }
    function multiply($a, $b)
    {
        return $a * $b;
    }

    ?>

    <?php 
    
    $sub = substraction(50, 20);
    $multi = multiply($sub, 2);

    echo $sub."<br>";
    echo $multi."<br>";
    
    ?>


    <hr>

    <h2>Paramètre facultatif</h2>

    <pre>function nomDeLaFnc( $param1_obligatoire, $param2_facultatif=null ) { /* code à executer */ }</pre>

    <?php
    function myAwasomeFnc($a, $b="B par défaut")
    {
        return "\$a vaut $a et \$b vaut $b";
    }
    ?>

    <?= myAwasomeFnc("AAA", "BBB") ?><br>
    <?= myAwasomeFnc("AAA") ?><br>

    <hr>


    <h2>Typage des fonctions</h2>

    <pre>function nomDeLaFnc():type { /* code à executer */ }</pre>

    <?php
    // Cette fonction retourne une chaine de caractères
    function myFnc_1(): string
    {
        // Intructions...
        return "Chaine...";
    }

    // Cette fonction retourne un entier
    function myFnc_2(): int
    {
        // Intructions...
        return 42;
    }

    // Cette fonction retourne un Booleen
    function myFnc_3(): bool
    {
        // Intructions...
        return true;
    }

    // Cette fonction retourne un tableau
    function myFnc_4(): array
    {
        // Intructions...
        return [];
    }

    // Cette fonction retourne un object
    function myFnc_5(): object
    {
        // Intructions...
        return (object) [];
    }
    ?>

    <hr>


    <h2>Typage des paramètres</h2>

    <pre>function nomDeLaFnc( string $param = "default" ) { /* code à executer */ }</pre>
    <pre>function nomDeLaFnc( string? $param = null ) { /* code à executer */ }</pre>

    <?php
    function myFnc_6( string $number ): int
    {
        return +$number;
    }
    myFnc_6( "42" );

    ?>


    <hr>

    <h2>Documenté une fonction</h2>


    <?php

    /**
     * Undocumented function
     *
     * @param string $number chaine du nombre a mettre en entré
     * @return integer
     */
    function myFnc_7( string $number ): int
    {
        return +$number;
    }
    ?>


    <hr>

    <h2>Definition de l'existance d'une fonction</h2>


    <?php
    if ( !function_exists("myFnc_7") )
    {
        function myFnc_7( string $number ): int
        {
            return +$number;
        }
    }
    ?>


    <hr>

    <a href="/">Retour</a>
</body>
</html>