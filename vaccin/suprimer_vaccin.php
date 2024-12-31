<?php
require '../DB/config.php';

$id = filter_input(INPUT_GET, 'id');

if ($id) {
    $sql = $pdo->prepare("DELETE FROM vaccin WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if ($sql->execute()) {
        echo "<script>
            alert('Vaccin exclu avec succès!');
            window.location.href = '../index.php';
            </script>";
    } else {
        echo "<script>
            alert('Erreur lors de la suppression du vaccin!');
            window.location.href = '../index.php';
        </script>";
    }
} else {
    echo "<script>
        alert('ID du vaccin non spécifié!');
        window.location.href = '../index.php';
    </script>";
}
