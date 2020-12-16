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