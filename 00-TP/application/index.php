<?php 
include_once "config/config.php";
include_once "config/db_connect.php";
include_once HEADER_PATH
?>
<!-- ======================================================================= -->

<h1>Accueil</h1>

<pre><?php print_r ($_SESSION['user']) ?></pre>

<!-- ======================================================================= -->
<?php include_once FOOTER_PATH ?>