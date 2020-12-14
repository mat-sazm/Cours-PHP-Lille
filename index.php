<?php 
$user1 = "Zeev Suraski";
$user2 = "Andi Gutmans";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Découverte de PHP</title>
</head>
<body>
    
    <h1><?php echo "Hello World"; ?></h1>

    <p>PHP a été créé en 1994 par Rasmus Lerdorf</p>
    <p>PHP est issue des langage C et PERL</p>
    <p>La doc de PHP se trouve sur le site <a href="https://www.php.net/" target="_blank">https://www.php.net/</a></p>

    <hr>

    <p>PHP est repris par <?php echo $user1; ?> et <?= $user2; ?>.</p>
    <p>Aujourd'hui, PHP est édité par la société <?= substr($user1, 0, 2) ?><?= substr($user2, 1, 2) ?></p>
</body>
</html>