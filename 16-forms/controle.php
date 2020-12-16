<?php

// Creation d'un formulaire d'inscription utilisateur

// - Firstname
// - Lastname
// - Birthday (3 select : day, month, year)
// - Email
// - Password
// - Password Confirmation

// On force l'affichage des messages d'erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Déclaration de la liste des mois
$month_text = ["Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Décembre"];


$firstname = null;
$lastname = null;
$birthday = null;
$email = null;
$plain_password = null;
$confirm_password = null;

// Controle du formulaire
if ( $_SERVER['REQUEST_METHOD'] === "POST" )
{
    // Recup des données
    // --

    // Recup du Firstname
    $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : null;

    // Recup du Lastname
    $lastname = $_POST['lastname'] ?? null;

    // Recup de la date anniversaire
    $birth_day = $_POST['birthday']['day'] ?? null;
    $birth_month = $_POST['birthday']['month'] ?? null;
    $birth_year = $_POST['birthday']['year'] ?? null;

    // Recup de l'email
    $email = $_POST['email'] ?? null;

    // Recup de MDP
    $plain_password = $_POST['password'] ?? null;
    $confirm_password = $_POST['confirmation'] ?? null;



    // Controle des données
    // --

    // Firstname : Chaine de caractères obligatoire
    // if (strlen($firstname) == 0)
    if (!preg_match("/^[a-z-]+$/i", $firstname))
    {
        echo "Erreur sur le champ Firstname<br>";
    }

    // Lastname : Chaine de caractères obligatoire (2 caractère minimum)
    if (!preg_match("/^[a-z-]{2,}$/i", $lastname))
    {
        echo "Erreur sur le champ Lastname<br>";
    }

    // Birthday : doit etre une date valide dans le passé + Min 21 ans

    // Email : Syntaxe email et valeur obligatoire
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        echo "Erreur sur le champ Email<br>";
    }

    // Password : min 4 caractères, 1 alpha + 1 numerique
    if (!strlen($plain_password) >= 4)
    {
        echo "Erreur sur le champ Mot de passe<br>";
    }

    // Password Confirmation : doit etre identique à password
    if ($confirm_password != $plain_password)
    {
        echo "Les mots de passe ne correspondent pas<br>";
    }

    // Agree Terms : Obligatoire

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP Formulaires</title>
</head>
<body>
    
    <h1>TP Formulaires</h1>

    <pre style="background-color: #C0C0C0; padding: 15px; color: #000000">Method HTTP : <?= $_SERVER['REQUEST_METHOD'] ?>



    <?php
    if ( $_SERVER['REQUEST_METHOD'] === "POST" )
    {
        echo "Traite les données et affiche du form";
    }
    else
    {
        echo "Affiche uniquement le form";
    }
    ?>

$_POST :
<?php print_r($_POST) ?>
</pre>


    <hr>


    <form method="post" novalidate>

        <!-- Firstname -->
        <div>
            <label for="firstname">Firstname</label>
            <input type="text" name="firstname" id="firstname">
        </div>


        <!-- Lastname -->
        <div>
            <label for="lastname">Lastname</label>
            <input type="text" name="lastname" id="lastname">
        </div>


        <!-- Birthday -->
        <div>
            <label for="birthday">Birthday</label>

            <select name="birthday[day]" id="birthday">
                <option value="">Jour</option>
                <?php for ($i=1; $i<=31; $i++): ?>
                <option value="<?= $i ?>"><?= $i ?></option>
                <?php endfor; ?>
            </select>

            <select name="birthday[month]">
                <option value="">Mois</option>
                <?php foreach ($month_text as $key => $value): ?>
                <option value="<?= ($key+1) ?>"><?= $value ?></option>
                <?php endforeach; ?>
            </select>

            <select name="birthday[year]">
                <option value="">Année</option>
                <?php for ($i=date("Y"); $i>=date("Y")-100; $i--): ?>
                <option value="<?= $i ?>"><?= $i ?></option>
                <?php endfor; ?>
            </select>
        </div>


        <!-- Email -->
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </div>


        <!-- Password -->
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>


        <!-- Password Confirmation -->
        <div>
            <label for="confirmation">Password Confirmation</label>
            <input type="password" name="confirmation" id="confirmation">
        </div>


        <!-- Agree terms -->
        <div>
            <label>
                <input type="checkbox" name="agreeTerms">
                I agree with terms.
            </label>
        </div>


        <button type="submit">Register</button>

    </form>

</body>
</html>