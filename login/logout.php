<?php
// Pour mettre fin à la session de l'utilisateur et rediriger vers la page de login.

session_start();
session_unset();
session_destroy();

header("Location: login.php"); // rediriger vers la page de login
exit();


// 	session_unset() supprime toutes les variables de session.
// 	session_destroy() met fin à la session.