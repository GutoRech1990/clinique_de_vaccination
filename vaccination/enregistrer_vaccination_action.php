<?php
require '../DB/config.php';

$id_patient = filter_input(INPUT_POST, 'id_patient', FILTER_VALIDATE_INT);
$id_vaccin = filter_input(INPUT_POST, 'id_vaccin', FILTER_VALIDATE_INT);
$date_vaccination = filter_input(INPUT_POST, 'date_vaccination');

if ($id_patient && $id_vaccin && $date_vaccination) {
    // Vérifier si la vaccination n'existe pas déjà
    $check_sql = $pdo->prepare("SELECT id FROM vaccination WHERE id_patient = :id_patient AND id_vaccin = :id_vaccin");
    $check_sql->bindValue(':id_patient', $id_patient);
    $check_sql->bindValue(':id_vaccin', $id_vaccin);
    $check_sql->execute();

    if ($check_sql->rowCount() > 0) {
        echo "<script>
            alert('Ce patient a déjà reçu ce vaccin!');
            window.location.href = '../index.php';
        </script>";
        exit;
    }

    // Insérer la nouvelle vaccination
    $sql = $pdo->prepare("INSERT INTO vaccination (id_patient, id_vaccin, date_vaccination) VALUES (:id_patient, :id_vaccin, :date_vaccination)");
    $sql->bindValue(':id_patient', $id_patient);
    $sql->bindValue(':id_vaccin', $id_vaccin);
    $sql->bindValue(':date_vaccination', $date_vaccination);

    if ($sql->execute()) {
        echo "<script>
            alert('Vaccination enregistrée avec succès!');
            window.location.href = '../index.php';
        </script>";
    } else {
        echo "<script>
            alert('Erreur lors de l'enregistrement de la vaccination!');
            window.location.href = '../index.php';
        </script>";
    }
} else {
    echo "<script>
        alert('Tous les champs sont obligatoires!');
        window.location.href = 'enregistrer_vaccination.php';
    </script>";
}
