<?php
session_start();

// Active la mise en mémoire tampon de sortie
ob_start();

if (isset($_POST['US_login']) and isset($_POST['US_password'])) {
    include 'connect.php';

    error_log("An error occurred while processing the login.");

    $US_login = pg_escape_string($link, $_POST['US_login']);
    $US_password = pg_escape_string($link, $_POST['US_password']);

    // Utilisation de encode pour convertir le résultat de SHA256 en hexadécimal
    $sql = "SELECT * FROM utilisateurs WHERE US_login = '$US_login' AND US_password = encode(SHA256('$US_password'), 'hex')";
    $res = pg_query($link, $sql);
    if ($res != false) {
        if (pg_num_rows($res) > 0) {
            $utilisateur = pg_fetch_assoc($res);
            $_SESSION['login'] = $utilisateur['US_login'];
            header("Location: home.php");
            exit;
        } else {
            header("Location: home.php");
            exit;
        }
    } else {
        header("Location: BADUSER.html");
        exit;
    }
}

// Envoie la sortie tamponnée au navigateur
ob_end_flush();
?>
