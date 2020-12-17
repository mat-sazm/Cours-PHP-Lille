<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Page B</h1>

    <hr>

    <?php include "nav.php"; ?>

    <hr>

    <h2>Valeur de la session</h2>

    <pre><?= $_SESSION['name_d'] ?></pre>

</body>
</html>

