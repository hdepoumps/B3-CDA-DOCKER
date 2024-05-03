<?php
$host = "db";
$username = "root";
$password = "root";
$db = "gestion_produits";

// Paramètres de la boucle d'attente
$maxAttempts = 10; // Nombre maximum de tentatives
$waitTime = 5; // Temps d'attente entre chaque tentative en secondes

// Boucle d'attente pour la connexion à la base de données
for ($i = 0; $i < $maxAttempts; $i++) {
    $link = @mysqli_connect($host, $username, $password, $db);
    if ($link) {
        // Si la connexion réussit, sortir de la boucle
        break;
    }
    // Si la connexion échoue, attendre avant la prochaine tentative
    sleep($waitTime);
}

if (!$link) {
    // Si après toutes les tentatives, la connexion échoue, afficher un message d'erreur
    die("Erreur de connexion à la base de données après $maxAttempts tentatives.");
}

mysqli_set_charset($link, "utf8mb4");
?>
