<?php
session_start();

// Vérifiez si la session est bien démarrée
if (session_status() == PHP_SESSION_NONE) {
    // Si la session n'est pas démarrée, redirigez l'utilisateur vers une autre page
    header('Location: index.php');
    exit;
}

unset($_SESSION['login']);
session_destroy();

header('Location: index.php');
exit;
?>
