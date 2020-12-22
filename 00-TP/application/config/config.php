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

// Infos obligatoire

// Definie le type de SGBD (mysql, postgresql, oracle)
$db_type = "mysql";

// Definie l'adresse du serveur SQL
$db_host = "127.0.0.1";

// Definie le Nom d'utilisateur de la BDD
$db_user = "osw3"; // "root"

// Definie le mot de passe de l'utilisateur de la BDD
$db_pass = "myosw3sql"; // ""

// Definie le nom de la bade de données (dbschema, dbname)
$db_schema = "cours_discotheque";


// Infos facultatives

// Definie le numéro du port de la bdd
$db_port = "3306";

// Definie le jeu de caractères utilisé pour les requêtes
$db_charset = "utf8";


include_once "config/db_connect.php";