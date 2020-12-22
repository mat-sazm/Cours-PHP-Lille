<?php 
include_once "config/config.php";
include_once "config/db_connect.php";

// Check user session
// On redirige l'utilisateur si celui-ci n'est pas identifié
if (!isset($_SESSION['user']))
{
    header("location: /register.php");
    exit;
}

include_once HEADER_PATH;
?>
<!-- ======================================================================= -->

<h2>Profile</h2>

<h4>Qui suis-je ?</h4>
<p>je suis <?= $_SESSION['user']->screenname ?> !</p>

<!-- ======================================================================= -->
<?php include_once FOOTER_PATH ?>