<?php
include_once "../config/config.php";
include_once "../config/db_connect.php";

// Requete HTTP en methode POST = Traitement du formumaire
if ($_SERVER['REQUEST_METHOD'] === "POST")
{
    // Objectif : Recup de l'id, screenname, email et MDP de l'utilisateur et stocker en $_SESSION
    // -------------------------------------------------------------------------

    // 1. Recup des données du formulaire
    // -- 
    // Objectif : Recup une valeur (peut importe la valeur) ou null

    // login (email)
    $login = $_POST['login'] ?? null;

    // Password
    $plain_password = $_POST['password'] ?? null;



    // 2. Controlle des données
    // --

    // Aucun controlle à effectuer
    // - Login = une chaine ou NULL
    // - Password = une chaine ou NULL



    // 3. Recupe de l'utilisateur dans la BDD
    // -- 

    $sql = "SELECT id, screenname, email, password FROM user WHERE email=:email";
    $query = $pdo->prepare($sql);

    $query->bindParam(":email", $login, PDO::PARAM_STR);
    $query->execute();

    $user = $query->fetch(PDO::FETCH_OBJ);

    // Si l'utilisateur existe en BDD
    if ($user)
    {
        // 4. Verification du MDP
        // --

        if (password_verify($plain_password, $user->password))
        {
            // 5. Procédure d'identification
            // --

            // Supprime le MDP de l'objet user
            unset($user->password);

            // Indetification de l'utilisateur
            $_SESSION['user'] = $user;

            $_SESSION['flash'] = [
                'type' => "success",
                'message' => "Bonjour $user->screenname"
            ];

            // 6. Incremente le compteur de connexion
            // --

            $sql = "UPDATE user SET login_counter=login_counter+1 WHERE id=$user->id";
            $query = $pdo->prepare($sql);

            $query->bindParam(":id", $user->id, PDO::PARAM_INT);
            $query->execute();
        }

        // Le mot de passe ne correspond pas
        else {
            $_SESSION['flash'] = [
                'type' => "danger",
                // 'message' => "Mot de passe incorrect"
                'message' => "Login ou mot de passe incorrect"
            ];
        }

    }

    // Utilisateur non trouvé dans la BDD
    else 
    {
        $_SESSION['flash'] = [
            'type' => "danger",
            // 'message' => "Login incorrect"
            'message' => "Login ou mot de passe incorrect"
        ];
    }
}

// Requete HTTP PAS en methode POST (donc en GET) = INTERDIT = redirection vers la page d'accueil
// else 
// {
//     header("location: /index.php");
//     exit;
// }

header("location: /index.php");
exit;