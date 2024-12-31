<?php
require '../DB/config.php';

$id = filter_input(INPUT_GET, 'id');

if ($id) {
    $sql = $pdo->prepare("DELETE FROM patient WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if ($sql->execute()) {
        echo "<script>
            alert('Patient exclu avec succès!');
            window.location.href = '../index.php';
            </script>";
    } else {
        echo "<script>
            alert('Erreur lors de la suppression du patient!');
            window.location.href = '../index.php';
        </script>";
    }
} else {
    echo "<script>
        alert('ID du patient non spécifié!');
        window.location.href = '../index.php';
    </script>";
}