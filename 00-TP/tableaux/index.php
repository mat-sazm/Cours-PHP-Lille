<?php

// Bob: 12 (123456), Francis: 53 (AZER), Bruce: 80 (azert), Clark: 28 (12HGFD)

// -> liste des personnages en PHP
// -> Créer le Hash du mot de passe
// -> Classer les personnages en ordre décroissant de l'age



// Que dois-je faire ?
// --
// 
// -> TOUT en PHP... il s'agit d'une application
// 
// 1 - Créer un tableau (une liste)... un tableau Multidementionnel qui recevra es données de plusieurs personnages
//   - Chaque personnage se decompose en :  nom
//                                          age
//                                          mot de passe
//                                          mot de passe crypté
// 
// 
// 2 - Crypter le mot de passe... depuis une chaine originale, obtenir un hash de cryptage
// 
// 
// 3 - Appliquer le tri sur le tableau... (Rappel... il s'agit d'un tableau multidimentionnel)


// Quels sont mes outils ?
// --
// 
// - Un Ordi
// - Apache / PHP (XAMPP)
// - IDE / Editeur de texte
// - Mon cerveau, pour bien comprendre la demande
// - Ma logique, pour commencer une stratégie... meme si je me plante, y'a pas mort d'homme.. je reviens en arriere et change de stratégie...
// - Internet / Google / Livre PHP
// - Mes connaissances
// - Je ne suis pas devin, je ne connais pas tout!!.. mais j'ai Google et StackOverflow :-D
// - Les Jokers : var_dump() et print_r()



// Comment vais-je faire ?
// --
// 
// ETAPE PAR ETAPE... je ne peu pas trier un tableau qui n'existe pas !
// 
// 1. Comment créer un tableau en PHP ?
// 2. Comment créer un tableau multidimentionnel en PHP ?
// 3. Prévoir le maximum d'information pour mon tableau.. meme si je ne traite pas tout de suite... le jour ou j'en ai besoin, j'ai la donnée ! 
//      - nom
//      - age
//      - mot de passe
//      - mot de passe crypté
// 4. Comment crypter un mot de passe en PHP ?
// 5. Comment ajouter une donnée à un tableau (le mot de passe crypté)... quand j'ai créer mon tableau, j'ai prévu l'espace pour le mot de passe crypté.. mais je ne possédais pas encore l'info.
// 6. Comment trier un tableau en PHP ?
// 7. Comment trier un tableau multidimentionnel en PHP ?
// 8. Comment afficher un tableau en PHP ?


// Bob: 12 (123456), Francis: 53 (AZER), Bruce: 80 (azert), Clark: 28 (12HGFD)

// 1 - Créer un tableau
$characters = [
    // 0
    [
        'name' => "Bob",
        'age' => 12,
        'pwd' => "123456",
        'hash' => null,
    ],

    // 1
    [
        'name' => "Francis",
        'age' => 53,
        'pwd' => "AZER",
        'hash' => null,
    ],

    // 2
    [
        'name' => "Bruce",
        'age' => 80,
        'pwd' => "azert",
        'hash' => null,
    ],

    // 3
    [
        'name' => "Clark",
        'age' => 28,
        'pwd' => "12HGFD",
        'hash' => null,
    ],
];


// 2 - Crypter le mot de passe... 
foreach ($characters as $key => $character)
{
    $characters[$key]['hash'] = password_hash($character['pwd'], PASSWORD_BCRYPT);
}


// 3 - Appliquer le tri sur le tableau...
$age = array_column($characters, 'age');
array_multisort($age, SORT_DESC, $characters);

echo "<pre>";
print_r($characters);
echo "</pre>";