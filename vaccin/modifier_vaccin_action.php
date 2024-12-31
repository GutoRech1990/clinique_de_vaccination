<?php
require '../DB/config.php';

// Pour recevoir tous les donnes du formulaire avec la methode POST, qui viens du modifier_vaccin.php
$id = filter_input(INPUT_POST, "id");
$nom = filter_input(INPUT_POST, 'nom');
$fournisseur = filter_input(INPUT_POST, 'fournisseur');
$fabricant = filter_input(INPUT_POST, 'fabricant');
$prix = filter_input(INPUT_POST, 'prix');

if ($id && $nom && $fournisseur && $fabricant && $prix) {
    $sql = $pdo->prepare("UPDATE vaccin SET nom = :nom, fournisseur = :fournisseur, fabricant = :fabricant, prix = :prix WHERE id = :id");
    $sql->bindValue(':nom', $nom);
    $sql->bindValue(':fournisseur', $fournisseur);
    $sql->bindValue(':fabricant', $fabricant);
    $sql->bindValue(':prix', $prix);
    $sql->bindValue(':id', $id);
    $sql->execute();

    if ($sql->execute()) {
        echo "<script>
            alert('Modifié avec succès!');
            window.location.href = '../index.php';
        </script>";
    } else {
        echo "<script>
            alert('Erreur lors de la modification!!!');
            window.location.href = '../index.php';
        </script>";
    }
} else {
    echo "<script>
        alert('Tous les champs sont obligatoires!!!');
        window.location.href = '../index.php';
    </script>";
}
