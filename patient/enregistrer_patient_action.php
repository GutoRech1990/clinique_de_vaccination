<?php
require '../DB/config.php';

$nom = filter_input(INPUT_POST, 'nom');
$age = filter_input(INPUT_POST, 'age');
$adresse = filter_input(INPUT_POST, 'adresse');
$date_naissance = filter_input(INPUT_POST, 'date_naissance');

if ($nom && $age && $adresse && $date_naissance) {
    $sql = $pdo->prepare("INSERT INTO patient (nom, age, adresse, date_naissance) VALUES (:nom, :age, :adresse, :date_naissance)");
    $sql->bindValue(':nom', $nom);
    $sql->bindValue(':age', $age);
    $sql->bindValue(':adresse', $adresse);
    $sql->bindValue(':date_naissance', $date_naissance);
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
