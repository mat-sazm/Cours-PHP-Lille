<?php
// Si le formulaire es envoyé
if ($_SERVER['REQUEST_METHOD'] === "POST")
{
    // $isValid = true;
    $errors = [];

    // 1. Retrieve for data
    // --

    $firstname          = $_POST['firstname'] ?? null;
    $lastname           = $_POST['lastname'] ?? null;
    $birth_day          = $_POST['birth']['day'] ?? 0;
    $birth_month        = $_POST['birth']['month'] ?? 0;
    $birth_year         = $_POST['birth']['year'] ?? 0;
    $email              = $_POST['email'] ?? null;
    $plain_password     = $_POST['password'] ?? null;
    $confirm_password   = $_POST['password_confirmation'] ?? null;
    $agreeTerms         = isset($_POST['agreeTerms']) ? true : false;

    // Calcul de l'age
    $d1 = new DateTime( "$birth_year-$birth_month-$birth_day 00:00:00" );
    $d2 = new DateTime( date("Y-m-d H:i:s") );
    $diff = $d2->diff($d1);
    $age = $diff->y;


    // 2. Check form data
    // -- 

    // Firstname
    if (!preg_match("/^[a-z-]+$/i", $firstname))
    {
        // $isValid = false;
        $errors['fristname'] = "Le prénom est invalide";
    }

    // lastname
    if (!preg_match("/^[a-z-]+$/i", $lastname))
    {
        $errors['lastname'] = "Le Nom est invalide";
    }

    // Validité de la date
    if (!checkdate($birth_month, $birth_day, $birth_year))
    {
        $errors['birthday'] = "Date invalide";
    }
    else if ($age < 13)
    {
        $errors['birthday'] = "Trop jeune !";
    }

    // Email : Syntaxe email et valeur obligatoire
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $errors['email'] = "Email invalide";
    }

    // Password : min 4 caractères, 1 alpha + 1 numerique
    // if (strlen($plain_password) < 4)
    if (!preg_match("/^(?=.*[A-Za-z])(?=.*\\d)[A-Za-z\\d^a-zA-Z0-9].{4,}$/i", $plain_password)) 
    {
        $errors['password'] = "Mot de passe invalide";
    }

    // Password Confirmation : doit etre identique à password
    if ($confirm_password != $plain_password)
    {
        $errors['confirmation'] = "Les mots de passe ne correspondent pas";
    }

    
    // 3. Save data in DB
    // --

    // if ($isValid)
    if (empty($errors))
    {
        echo "Sava data";
        exit;
    }
    else 
    {
        echo "<pre>";
        print_r( $errors );
        echo "</pre>";
        exit;
    }
    
    // 4. Redirect user
    // --


}