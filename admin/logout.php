<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Détruire la session
session_unset();
session_destroy();

// Rediriger vers la page de connexion
header("Location: iogin.php");
exit();
?>
