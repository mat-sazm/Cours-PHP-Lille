<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Application</title>

    <!-- CSS only -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

</head>
<body>

    <!-- Entete du site -->
    <header class="main-header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <div class="container">

                <!-- Title / Logo -->
                <a class="navbar-brand" href="index.php">App Demo</a>

                <!-- Burger Btn -->
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Nav menu -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="releases.php">Albums</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>


                        <?php if (isset($_SESSION['user'])): ?>
                            
                        <!-- Menu user si utilisateur identifié -->
                        <li class="nav-item">
                            <a class="nav-link" href="profil.php"><?= $_SESSION['user']->screenname ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="security/logout.php">Déconnexion</a>
                        </li>

                        <?php else: ?>

                        <!-- Menu Inscription si utilisateur non identifié -->
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Inscription</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="modal" data-target="#loginModal">Connexion</a>
                        </li>

                        <?php endif ?>

                    </ul>
                </div>

            </div><!-- End .container -->
        </nav>
        <!-- End Nav -->
    </header>
    <!-- Fin Entete du site -->

    <!-- Flash Message -->
    <?php if (isset($_SESSION['flash'])): ?>
    <div class="container">
        <div class="alert alert-<?= $_SESSION['flash']['type'] ?>">
            <?= $_SESSION['flash']['message'] ?>
        </div>
    </div>
    <?php unset($_SESSION['flash']) ?>
    <?php endif ?>
    <!-- End Flash Message -->

    <!-- contenu du site -->
    <div class="main-content">
        <div class="container">
            