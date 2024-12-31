<?php
require '../DB/config.php';

// Pour recevoir les donnees envoyer par la methode POST
$id = filter_input(INPUT_POST, "id");
$nom = filter_input(INPUT_POST, "nom");
$age = filter_input(INPUT_POST, "age");
$adresse = filter_input(INPUT_POST, "adresse");
$date_naissance = filter_input(INPUT_POST, "date_naissance");

if ($id && $nom && $age && $adresse && $date_naissance) {
    $sql = $pdo->prepare("UPDATE patient SET nom = :nom, age = :age, adresse = :adresse, date_naissance = :date_naissance WHERE id = :id");
    $sql->bindValue(':nom', $nom);
    $sql->bindValue(':age', $age);
    $sql->bindValue(':adresse', $adresse);
    $sql->bindValue(':date_naissance', $date_naissance);
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
