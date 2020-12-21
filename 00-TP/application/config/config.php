<?php 

// On force l'affichage des messages d'erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Chemin des fichiers du partials
const HEADER_PATH = "partials/header.php";
const FOOTER_PATH = "partials/footer.php";
const LOGIN_MODAL_PATH = "partials/login-modal.php";
const SECURITY_REGISTER = "security/register.php";


// Month definition
$month_text = ["Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Décembre"];

// Current date
$current_year = date("Y");


// Database Config
// --

$db_host = "";


include_once "config/db_connect.php";