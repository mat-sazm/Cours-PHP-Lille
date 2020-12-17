<?php
session_start();

// Creer 3 pages 
//  -Page A
//  -Page B
//  -Page C

// Ajouter un formulaire pour recup le nom de l'utilisateur sur la page A
// Afficher le nom de l'utilisateur sur les pages A, B et C

$name_b = null;

if ($_SERVER['REQUEST_METHOD'] === "POST")
{
    $name_b = $_POST['name_a'] ?? null;

    $_SESSION['name_d'] = $name_b;


    header("location: page-a.php");
    exit;

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Page A</h1>

    <hr>

    <?php include "nav.php"; ?>

    <hr>

    <pre><?= time() ?></pre>

    <form method="post">
        <label for="name_c">Nom : </label>
        <input type="text" name="name_a" id="name_c" value="<?= $name_b ?>">

        <br>

        <button type="submit">Send</button>
    </form>

    <hr>

    <h2>Valeur de la session</h2>

    <pre><?= $_SESSION['name_d'] ?></pre>

</body>
</html>

