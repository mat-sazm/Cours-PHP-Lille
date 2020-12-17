<?php
session_start();

// unset($_SESSION['name_d']);

session_destroy();

header("location: page-a.php");
exit;
