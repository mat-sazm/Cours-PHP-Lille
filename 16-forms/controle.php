<?php


// On force l'affichage des messages d'erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Creation d'un formulaire d'inscription utilisateur

// - Firstname
// - Lastname
// - Birthday (3 select : day, month, year)
// - Email
// - Password
// - Password Confirmation

// Déclaration de la liste des mois
$month_text = ["Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Décembre"];

// Définition du tableau d'erreurs
$errors = [];


$firstname = null;
$lastname = null;
$birthday = null;
$birth_year = 0;
$birth_month = 0;
$birth_day = 0;
$age = 0;
$email = null;
$plain_password = null;
$confirm_password = null;
$isAgreeTerms = false;

// Controle du formulaire
if ( $_SERVER['REQUEST_METHOD'] === "POST" )
{
    $isValid = true;


    // 1. Recup des données
    // --

    // Recup du Firstname
    $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : null;

    // Recup du Lastname
    $lastname = $_POST['lastname'] ?? null;

    // Recup de la date anniversaire
    $birth_day = $_POST['birthday']['day'] ?? 0;
    $birth_month = $_POST['birthday']['month'] ?? 0;
    $birth_year = $_POST['birthday']['year'] ?? 0;

    // Calucul de l'age
    $d1 = new DateTime( "$birth_year-$birth_month-$birth_day 00:00:00" );
    $d2 = new DateTime( date("Y-m-d H:i:s") );
    $diff = $d2->diff($d1);
    $age = $diff->y;

    // $birthday = "$birth_year-$birth_month-$birth_day";

    // Recup de l'email
    $email = $_POST['email'] ?? null;

    // Recup de MDP
    $plain_password = $_POST['password'] ?? null;
    $encoded_password = password_hash( $plain_password, PASSWORD_BCRYPT );
    $confirm_password = $_POST['confirmation'] ?? null;

    // Recup de Agree Terms
    $isAgreeTerms = isset($_POST['agreeTerms']) ? true : false;





    // 2. Controle des données
    // --

    // Firstname : Chaine de caractères obligatoire
    // if (strlen($firstname) == 0)
    if (!preg_match("/^[a-z-]+$/i", $firstname))
    {
        $isValid = false;
        $errors['firstname'] = "Erreur sur le champ Firstname";
    }

    // Lastname : Chaine de caractères obligatoire (2 caractère minimum)
    if (!preg_match("/^[a-z-]{2,}$/i", $lastname))
    {
        $isValid = false;
        echo "Erreur sur le champ Lastname<br>";
    }

    // Birthday : doit etre une date valide dans le passé + Min 21 ans

    // Validité de la date
    if (!checkdate($birth_month, $birth_day, $birth_year))
    {
        $isValid = false;
        echo "Date invalide<br>";
    }
    else if ($age < 13)
    {
        $isValid = false;
        echo "Trop jeune !<br>";
    }


    // Email : Syntaxe email et valeur obligatoire
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $isValid = false;
        echo "Erreur sur le champ Email<br>";
    }

    // Password : min 4 caractères, 1 alpha + 1 numerique
    if (strlen($plain_password) < 4)
    {
        $isValid = false;
        echo "Erreur sur le champ Mot de passe<br>";
    }

    // Password Confirmation : doit etre identique à password
    if ($confirm_password != $plain_password)
    {
        $isValid = false;
        echo "Les mots de passe ne correspondent pas<br>";
    }

    // Agree Terms : Obligatoire
    if (!$isAgreeTerms)
    {
        $isValid = false;
        echo "Vous devez accepter les CGU<br>";
    }



    // 3. Enregistre les données en BDD
    // --
    if ($isValid)
    {
        echo "ENREGISTRE EN BDD";

        // $encoded_password;

        exit;
    }
    // else
    // {
    //     echo "ERREUR SUR LE FORM";
    // }

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


$errors :
<?php print_r($errors) ?>

$_POST :
<?php print_r($_POST) ?>
</pre>

    <hr>

    <form method="post" novalidate>

        <!-- Firstname -->
        <div>
            <label for="firstname">Firstname</label>
            <input type="text" name="firstname" id="firstname" value="<?= $firstname ?>">
            <?php if (isset($errors['firstname'])): ?>
                <p class="has-error"><?= $errors['firstname'] ?></p>
            <?php endif; ?>
        </div>


        <!-- Lastname -->
        <div>
            <label for="lastname">Lastname</label>
            <input type="text" name="lastname" id="lastname" value="<?= $lastname ?>">
        </div>


        <!-- Birthday -->
        <div>
            <label for="birthday">Birthday</label>

            <select name="birthday[day]" id="birthday">
                <option value="0">Jour</option>
                <?php for ($i=1; $i<=31; $i++): ?>
                <option value="<?= $i ?>" <?= $birth_day == $i ? "selected" : null ?>>
                    <?= $i ?>
                </option>
                <?php endfor; ?>
            </select>

            <select name="birthday[month]">
                <option value="0">Mois</option>
                <?php foreach ($month_text as $key => $value): ?>
                <option value="<?= ($key+1) ?>" <?= $birth_month == $key+1 ? "selected" : null ?>><?= $value ?></option>
                <?php endforeach; ?>
            </select>

            <select name="birthday[year]">
                <option value="0">Année</option>
                <?php for ($i=date("Y"); $i>=date("Y")-100; $i--): ?>
                <option value="<?= $i ?>" <?= $birth_year == $i ? "selected" : null ?>><?= $i ?></option>
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