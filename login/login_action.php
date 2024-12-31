<?php
// Démarrage de la session
session_start();

// Vérifier si le formulaire a été envoyé
if (isset($_POST["submit"])) {
    // Alors on traite les donnés envoyé
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === "admin" && $password === "1234") {
        // Regénerer l'ID de session pour empêcher la fixation de session
        session_regenerate_id(true);

        // Création de varialbles de session
        $_SESSION["logged_in"] = true;
        $_SESSION["username"] = $username;
        echo "Redirecionando...";

        // Redirection vers la page d'accueil utilisateur
        header("Location: ../index.php");
        exit();
    } else {
        // Redirection vers la page index.html
        echo "<script>
        alert('Utilisateur ou Mot de passe incorrect!!!');
        window.location.href = 'login.php';
        </script>";
        exit();
    }
}
