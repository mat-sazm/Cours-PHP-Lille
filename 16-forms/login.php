<?php
session_start();

// Formulaire 2 champs
// - email
// - password

// Controle du form
// - email

if ($_SERVER['REQUEST_METHOD'] === "POST")
{
    $isValid = true;

    // Retrieve form data
    // --

    $email = $_POST['login'] ?? null;
    $passwd = $_POST['password'] ?? null;


    // Check form data
    // --

    // check login
    if (!preg_match("/^[a-z0-9-\.]+@[a-z0-9\.]+\.[a-z]{2,10}$/i", $email))
    {
        $isValid = false;
    }



    if ($isValid)
    {
        // Retrive user in database
        // --

        // Requete de recherche de l'utilisateur en BDD
        // $user = Select id, email, password from user where email= $email

        // Si la requete est OK
        // if ($user->password == $passwd)
        // if (password_verify($passwd, $user->password))

            // Login process
            // --
            // $_SESSION['user'] = $user;

        // else
            // on affiche un message "login ou password incorrect"

        // Si la requete KO
        // on affiche un message "login ou password incorrect"

    }
    else {
        $_SESSION['error'] = "login ou password incorrect";
    }

    header("location: ".$_SERVER['HTTP_REFERER']);
    exit;

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                
                <h1>Login</h1>

                <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
                <?php endif; ?>

                <form method="post">

                    <div class="form-group">
                        <label for="login">Login</label>
                        <input type="text" class="form-control" name="login" id="login">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>

                    <button type="submit" type="submit" class="btn btn-success btn-block">sign in</button>

                </form>

            </div>
        </div>
    </div>

</body>
</html>
<?php
if (isset($_SESSION['error'])) 
{
    unset($_SESSION['error']);
}
