<?php
require '../DB/config.php';

$nom = filter_input(INPUT_POST, 'nom');
$fournisseur = filter_input(INPUT_POST, 'fournisseur');
$fabricant = filter_input(INPUT_POST, 'fabricant');
$prix = filter_input(INPUT_POST, 'prix');

if ($nom && $fournisseur && $fabricant && $prix) {
    $sql = $pdo->prepare("INSERT INTO vaccin (nom, fournisseur, fabricant, prix) VALUES (:nom, :fournisseur, :fabricant, :prix)");
    $sql->bindValue(':nom', $nom);
    $sql->bindValue(':fournisseur', $fournisseur);
    $sql->bindValue(':fabricant', $fabricant);
    $sql->bindValue(':prix', $prix);
    // $sql->execute();

    if ($sql->execute()) {
        echo "<script>
            alert('Enregistreé avec succès!');
            window.location.href = '../index.php';
        </script>";
    } else {
        echo "<script>
            alert('Erreur lors du enregistrement!!!');
            window.location.href = '../index.php';
        </script>";
    }
} else {
    echo "<script>
        alert('Tous les champs sont obligatoires!!!');
        window.location.href = '../index.php';
    </script>";
}
