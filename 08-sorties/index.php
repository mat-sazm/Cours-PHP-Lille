<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$title = "08 - Sorties";
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
    $a = "Ceci est une chaine";
    $b = 42;
    $c = ["Pommes", "Poires"];
    $d = true;
    $e = false;
    ?>



    <h2>echo</h2>

    <?php echo $a ?><br>
    <?= $a ?><br>
    <?= $b ?><br>
    <?= $c ?><br>
    <?= $d ?><br>
    <?= $e ?><br>


    <h2>print()</h2>

    <?php print($a) ?><br>
    <?php print($b) ?><br>
    <?php print($c) ?><br>
    <?php print($d) ?><br>
    <?php print($e) ?><br>

    <?php if(print($a)){/* ... */} ?><br>




    <h2>print_r()</h2>

    <?php print_r($a) ?><br>
    <?php print_r($b) ?><br>
    <?php print_r($c) ?><br>
    <?php print_r($d) ?><br>
    <?php print_r($e) ?><br>

    <pre><?php print_r($c) ?></pre>
    <pre><?php var_dump($c) ?></pre>


    <h2>var_dump()</h2>

    <?php var_dump($a) ?><br>
    <?php var_dump($b) ?><br>
    <?php var_dump($c) ?><br>
    <?php var_dump($d) ?><br>
    <?php var_dump($e) ?><br>

    <hr>

    <a href="/">Retour</a>
</body>
</html>