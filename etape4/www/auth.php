<?php
if (isset($_POST['US_login']) and isset($_POST['US_password'])) {
    session_start();
    include 'connect.php';

    $US_login = pg_escape_string($link, $_POST['US_login']);
    $US_password = pg_escape_string($link, $_POST['US_password']);

    // Utilisation de la fonction digest pour le hachage SHA256 dans PostgreSQL
    $sql = "SELECT * FROM utilisateurs WHERE US_login = '$US_login' AND US_password = encode(digest('$US_password', 'sha256'), 'hex')";
    $res = pg_query($link, $sql);
    if ($res) {
        if (pg_num_rows($res) > 0) {
            // Utilisateur trouvé dans la base
            $utilisateur = pg_fetch_assoc($res);
            $_SESSION['login'] = $utilisateur['US_login'];
            header("Location: home.php");
            exit; // Ajoutez exit après header pour éviter les avertissements
        } else {
            header("Location: index.php");
            exit; // Ajoutez exit après header pour éviter les avertissements
        }
    } else {
        header("Location: BADUSER.html");
        exit; // Ajoutez exit après header pour éviter les avertissements
    }
}
?>
