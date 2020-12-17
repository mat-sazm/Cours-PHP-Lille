<?php

// On force l'affichage des messages d'erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header( "refresh:5;url=https://google.fr" );


echo "Hello World";
// header("location: https://google.fr");
exit;