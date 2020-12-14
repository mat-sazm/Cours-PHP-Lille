<?php
$title = "05 - Opérateurs";
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

    <h2>Opérateur d'affectation</h2>
    <p>
        Symbole <code>=</code><br>
        <pre>$a = "ma chaine";</pre>
    </p>


    <section>
        <h2>Opérateurs arithmétiques</h2>
    
    
        <p>
            Addition<br>
            Symbole <code>+</code><br>
            <pre>$a + $b;</pre>
        </p>
    
        <p>
            Soustracion<br>
            Symbole <code>-</code><br>
            <pre>$a - $b;</pre>
        </p>
    
        <p>
            Multiplication<br>
            Symbole <code>*</code><br>
            <pre>$a * $b;</pre>
        </p>
    
        <p>
            Division<br>
            Symbole <code>/</code><br>
            <pre>$a / $b;</pre>
        </p>
    
        <p>
            Modulo<br>
            Symbole <code>%</code><br>
            <pre>$a % $b;</pre>
        </p>
    
        <p>
            Exponentiel<br>
            Symbole <code>**</code><br>
            <pre>$a ** $b;</pre>
        </p>
    
        <p>
            Identité<br>
            Symbole <code>+</code><br>
            <pre>+$a;</pre>
    
            <?php $a = "42"; ?>
            <pre><?php var_dump($a) ?></pre>
            <pre><?php var_dump( intval($a) ) ?></pre>
            <pre><?php var_dump(+$a) ?></pre>
        </p>
    
        <p>
            Negation<br>
            Symbole <code>-</code><br>
            <pre>-$a;</pre>
    
            <?php $a = 42; ?>
            <pre><?php var_dump($a) ?></pre>
            <pre><?php var_dump(-$a) ?></pre>
        </p>
    </section>

    <section>

        <h2>Opérateurs de chaine</h2>
        <p>
            Concatenation<br>
            Symbole <code>.</code><br>
            <pre>$a . $b</pre>

            <?php 
            $a = "abc";
            $b = "def";
            ?>
            <?php var_dump($a); ?><br>
            <?php var_dump($b); ?><br>
            <?php var_dump($a . $b); ?><br>
        </p>

        <p>
            Symbole <code>.=</code><br>
            <pre>$a = "abc";
        $a .= "def";
            </pre>

            <?php 
            $a = "abc";
            $a.= "def";
            ?>
            <?php var_dump($a); ?><br>
        </p>


    </section>

    
    <hr>

    <a href="/">Retour</a>
</body>
</html>