<?php 


// Vous voulez afficher un pdf
header('Content-Type: application/pdf');

// Il sera nommé downloaded.pdf
header('Content-Disposition: attachment; filename="downloaded.pdf"');

