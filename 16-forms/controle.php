<?php
session_start();

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
// $_SESSION['errors'] = "Yop...";
// unset($_SESSION['errors']);
// session_destroy();


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
    $_SESSION["data"] = [];


    // 1. Recup des données
    // --

    // Recup du Firstname
    $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : null;
    $_SESSION['data']['firstname'] = $firstname;

    // Recup du Lastname
    $lastname = $_POST['lastname'] ?? null;
    $_SESSION['data']['lastname'] = $lastname;

    // Recup de la date anniversaire
    $birth_day = $_POST['birthday']['day'] ?? 0;
    $birth_month = $_POST['birthday']['month'] ?? 0;
    $birth_year = $_POST['birthday']['year'] ?? 0;
    $_SESSION['data']['birth_day'] = $birth_day;
    $_SESSION['data']['birth_month'] = $birth_month;
    $_SESSION['data']['birth_year'] = $birth_year;

    // Calucul de l'age
    $d1 = new DateTime( "$birth_year-$birth_month-$birth_day 00:00:00" );
    $d2 = new DateTime( date("Y-m-d H:i:s") );
    $diff = $d2->diff($d1);
    $age = $diff->y;

    // $birthday = "$birth_year-$birth_month-$birth_day";

    // Recup de l'email
    $email = $_POST['email'] ?? null;
    $_SESSION['data']['email'] = $email;

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
        $errors['lastname'] = "Erreur sur le champ Lastname";
    }

    // Birthday : doit etre une date valide dans le passé + Min 21 ans

    // Validité de la date
    if (!checkdate($birth_month, $birth_day, $birth_year))
    {
        $isValid = false;
        $errors['birthday'] = "Date invalide";
    }
    else if ($age < 13)
    {
        $isValid = false;
        $errors['birthday'] = "Trop jeune !";
    }


    // Email : Syntaxe email et valeur obligatoire
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $isValid = false;
        $errors['email'] = "Email invalide";
    }

    // Password : min 4 caractères, 1 alpha + 1 numerique
    if (strlen($plain_password) < 4)
    {
        $isValid = false;
        $errors['password'] = "Mot de passe invalide";
    }

    // Password Confirmation : doit etre identique à password
    if ($confirm_password != $plain_password)
    {
        $isValid = false;
        $errors['confirmation'] = "Les mots de passe ne correspondent pas";
    }

    // Agree Terms : Obligatoire
    if (!$isAgreeTerms)
    {
        $isValid = false;
        $errors['agreeTerms'] = "Vous devez accepter les CGU";
    }



    // 3. Enregistre les données en BDD
    // --
    if ($isValid)
    {
        echo "ENREGISTRE EN BDD";

        // $encoded_password;

        exit;
    }

    $_SESSION['errors'] = $errors;

    // Redirige l'utilisateur pour eviter un nouvel envois du formulaire 
    // au rafraichissement de la page
    header("location: ".$_SERVER['HTTP_REFERER']);
    exit;
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

$_SESSION['errors'] :
<?php print_r($_SESSION['errors']) ?>

$_POST :
<?php print_r($_POST) ?>
</pre>

    <hr>

    <form method="post" novalidate>

        <!-- Firstname -->
        <div>
            <label for="firstname">Firstname</label>
            <input 
                type="text" 
                name="firstname" 
                id="firstname" 
                value="<?= isset($_SESSION['data']['firstname']) ? $_SESSION['data']['firstname'] : null ?>"
            >
            <?php 
            // Afficher les erreurs de la session
            if (isset($_SESSION['errors']['firstname'])): ?>
                <p class="has-error"><?= $_SESSION['errors']['firstname'] ?></p>
            <?php endif; ?>
        </div>


        <!-- Lastname -->
        <div>
            <label for="lastname">Lastname</label>
            <input type="text" name="lastname" id="lastname" value="<?= isset($_SESSION['data']['lastname']) ? $_SESSION['data']['lastname'] : null ?>">
            <?php if (isset($_SESSION['errors']['lastname'])): ?>
                <p class="has-error"><?= $_SESSION['errors']['lastname'] ?></p>
            <?php endif; ?>
        </div>


        <!-- Birthday -->
        <div>
            <label for="birthday">Birthday</label>

            <select name="birthday[day]" id="birthday">
                <option value="0">Jour</option>
                <?php for ($i=1; $i<=31; $i++): ?>
                <option value="<?= $i ?>" 
                    <?= isset($_SESSION['data']['birth_day']) ? ( $_SESSION['data']['birth_day'] == $i ? "selected" : null ) : null ?>
                >
                    <?= $i ?>
                </option>
                <?php endfor; ?>
            </select>

            <select name="birthday[month]">
                <option value="0">Mois</option>
                <?php foreach ($month_text as $key => $value): ?>
                <option value="<?= ($key+1) ?>" <?php
                    if (isset($_SESSION['data']['birth_month']))
                    {
                        if ($_SESSION['data']['birth_month'] == $key+1)
                        {
                            echo "selected";
                        }
                    }
                ?>><?= $value ?></option>
                <?php endforeach; ?>
            </select>

            <select name="birthday[year]">
                <option value="0">Année</option>
                <?php for ($i=date("Y"); $i>=date("Y")-100; $i--): ?>
                <option value="<?= $i ?>" <?php
                    if (isset($_SESSION['data']['birth_year']) && $_SESSION['data']['birth_year'] == $i)
                    // if ($_SESSION['data']['birth_year'] == $i && isset($_SESSION['data']['birth_year']) )
                    {
                        echo "selected";
                    }
                ?>><?= $i ?></option>
                <?php endfor; ?>
            </select>

            <?php if (isset($_SESSION['errors']['birthday'])): ?>
                <p class="has-error"><?= $_SESSION['errors']['birthday'] ?></p>
            <?php endif; ?>
        </div>


        <!-- Email -->
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= isset($_SESSION['data']['email']) ? $_SESSION['data']['email'] : null ?>">
            <?php if (isset($_SESSION['errors']['email'])): ?>
                <p class="has-error"><?= $_SESSION['errors']['email'] ?></p>
            <?php endif; ?>
        </div>


        <!-- Password -->
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <?php if (isset($_SESSION['errors']['password'])): ?>
                <p class="has-error"><?= $_SESSION['errors']['password'] ?></p>
            <?php endif; ?>
        </div>


        <!-- Password Confirmation -->
        <div>
            <label for="confirmation">Password Confirmation</label>
            <input type="password" name="confirmation" id="confirmation">
            <?php if (isset($_SESSION['errors']['confirmation'])): ?>
                <p class="has-error"><?= $_SESSION['errors']['confirmation'] ?></p>
            <?php endif; ?>
        </div>


        <!-- Agree terms -->
        <div>
            <label>
                <input type="checkbox" name="agreeTerms">
                I agree with terms.
            </label>
            <?php if (isset($_SESSION['errors']['agreeTerms'])): ?>
                <p class="has-error"><?= $_SESSION['errors']['agreeTerms'] ?></p>
            <?php endif; ?>
        </div>


        <button type="submit">Register</button>

    </form>

</body>
</html>
<?php
// Reset des erreurs de session
unset($_SESSION['data']);
unset($_SESSION['errors']);