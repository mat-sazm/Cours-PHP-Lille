<?php 
// Déclaration des données
$title = "TP sur les tableaux";

$heros = [
    // Heros 1
    [
        'name' => "Batman",
        'firstname' => "Bruce",
        'lastname' => "Wayne",
        'city' => "Gotham",
    ],

    // Heros 2
    [
        'name' => "Superman",
        'firstname' => "Clark",
        'lastname' => "Kent",
        'city' => "New York",
    ],

    // Heros 3
    [
        'name' => "Ironman",
        'firstname' => "Tony",
        'lastname' => "Stark",
        'city' => "Los Angeles",
    ]
];
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

    <h2>Instuctions</h2>

    <pre>
1. Remplacer le "Titre de la page" et le titre du Document par la chaine "TP sur les tableaux" stocké dans la variable $title.
2. Créer un tableau "heros" et ajouter les héros suivant:
    
    Héros 1
    name: Batman
    firstname: Bruce
    lastname: Wayne
    city: Gotham

    Héros 2
    name: Superman
    firstname: Clark
    lastname: Kent
    city: New York

    Héros 3
    name: Ironman
    firstname: Tony
    lastname: Stark 
    city: Los Angeles

3. pour chaque héros afficher la phrase :
    "XXX XXX dit: Je suis XXX, je protège XXX et ses habitants !"
    </pre>

    
    <h2>Affichage</h2>

    <pre><?php print_r($heros) ?></pre>

    <p>Héros 1 : <?= $heros[0]['firstname'] ?> <?= $heros[0]['lastname'] ?> dit: Je suis <?= $heros[0]['name'] ?>, je protège <?= $heros[0]['city'] ?> et ses habitants !</p>
    <p>Héros 2 : <?= $heros[1]['firstname'] ?> <?= $heros[1]['lastname'] ?> dit: Je suis <?= $heros[1]['name'] ?>, je protège <?= $heros[1]['city'] ?> et ses habitants !</p>
    <p>Héros 3 : <?= $heros[2]['firstname'] ?> <?= $heros[2]['lastname'] ?> dit: Je suis <?= $heros[2]['name'] ?>, je protège <?= $heros[2]['city'] ?> et ses habitants !</p>
    
    <h3>Avec la boucle FOR</h3>
    <?php for ($i = 0; $i < count($heros); $i++): ?>
        <p>Héros <?= ($i + 1) ?> : <?= $heros[$i]['firstname'] ?> <?= $heros[$i]['lastname'] ?> dit: Je suis <?= $heros[$i]['name'] ?>, je protège <?= $heros[$i]['city'] ?> et ses habitants !</p>
    <?php endfor; ?>

    <h3>Avec la boucle FOREACH</h3>
    <?php foreach ($heros as $key => $hero): ?>
        <p>Héros <?= ($key + 1) ?> : <?= $hero['firstname'] ?> <?= $hero['lastname'] ?> dit: Je suis <?= $hero['name'] ?>, je protège <?= $hero['city'] ?> et ses habitants !</p>
    <?php endforeach; ?>

</body>
</html>