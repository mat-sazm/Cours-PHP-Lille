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

    // Generate the Birthday string
    // SQL : XXXX-XX-XX
    // $birthday = $birth_year."-".$birth_month."-".$birth_day;
    $birthday = $birth_year . "-";
    $birthday.= ($birth_month <= 9 ? "0".$birth_month : $birth_month) . "-";
    $birthday.= ($birth_day <= 9 ? "0".$birth_day : $birth_day);

    // Generate Screenname (ex: "John D.")
    $screenname = $firstname." ". strtoupper(substr($lastname, 0, 1)) .".";

    // Generate Password Hash
    $crypted_password = password_hash($plain_password, PASSWORD_BCRYPT);


    // 2. Check form data
    // -- 

    // Firstname
    if (!preg_match("/^[a-z-]+$/i", $firstname))
    {
        // $isValid = false;
        $errors['firstname'] = "Le prénom est invalide";
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

    // Password Confirmation : doit etre identique à password
    if (!$agreeTerms)
    {
        $errors['agreeTerms'] = "Vous devez accepter les CGU";
    }

    
    // 3. Save data in DB
    // --

    // if ($isValid)
    if (empty($errors))
    {
        // Definition de la requete SQL
        $sql = "INSERT INTO user 
            (`firstname`,`lastname`,`screenname`,`birthday`,`email`,`password`) 
        VALUES 
            (:firstname, :lastname, :screenname, :birthday, :email, :password)
        ";

        // Preparation de la requete pour PDO
        $query = $pdo->prepare($sql);

        // Definition des paramètres de requete
        $query->bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $query->bindParam(':lastname', $lastname, PDO::PARAM_STR);
        $query->bindParam(':screenname', $screenname, PDO::PARAM_STR);
        $query->bindParam(':birthday', $birthday);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':password', $crypted_password, PDO::PARAM_STR);

        // Execution de la requête
        $query->execute();

        $id = $pdo->lastInsertId();

        var_dump( $id );


        // -----------------------


        echo "Sava data";
        exit;
    }
    
    // 4. Redirect user
    // --

}
