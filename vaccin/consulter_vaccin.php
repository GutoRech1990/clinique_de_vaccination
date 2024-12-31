<?php
require '../DB/config.php';

$id = filter_input(INPUT_GET, "id");

if ($id) {
    // Buscar dados da vacina
    $sql = $pdo->prepare("SELECT * FROM vaccin WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();
    $vaccin = $sql->fetch(PDO::FETCH_ASSOC);

    // Buscar pacientes que tomaram esta vacina
    $sql = $pdo->prepare("
        SELECT 
            p.id as patient_id,
            p.nom as patient_nom,
            p.age,
            p.date_naissance,
            v.date_vaccination
        FROM vaccination v
        JOIN patient p ON v.id_patient = p.id 
        WHERE v.id_vaccin = :id_vaccin
        ORDER BY v.date_vaccination DESC
    ");
    $sql->bindValue(':id_vaccin', $id);
    $sql->execute();
    $patients = $sql->fetchAll(PDO::FETCH_ASSOC);
} else {
    echo "<script>
        alert('Vaccin non trouvé!!!');
        window.location.href = '../index.php';
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulter Vaccin</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header>
        <nav>
            <h1>Consulter Vaccin</h1>
            <button class="btn btn-retour"><a href="../index.php">Retour</a></button>
        </nav>
    </header>

    <main>
        <?php if ($vaccin): ?>
            <div class="info_vaccin">
                <h2>Informations du Vaccin</h2>
                <p><strong>ID:</strong> <?= $vaccin['id'] ?></p>
                <p><strong>Nom:</strong> <?= $vaccin['nom'] ?></p>
                <p><strong>Fabricant:</strong> <?= $vaccin['fabricant'] ?></p>
                <p><strong>Fournisseur:</strong> <?= $vaccin['fournisseur'] ?></p>
                <p><strong>Prix:</strong> <?= $vaccin['prix'] ?></p>
            </div>

            <div class="liste_patients responsive-table">
                <table class="table table-striped">
                    <tr>
                        <td colspan="5">
                            <h2>Liste des Patients Vaccinés</h2>
                        </td>
                    </tr>
                    <tr>
                        <th>ID Patient</th>
                        <th>Nom</th>
                        <th>Age</th>
                        <th>Date de naissance</th>
                        <th>Date de vaccination</th>
                    </tr>
                    <?php if ($patients): ?>
                        <?php foreach ($patients as $patient): ?>
                            <tr>
                                <td><?= $patient['patient_id'] ?></td>
                                <td><?= $patient['patient_nom'] ?></td>
                                <td><?= $patient['age'] ?></td>
                                <td><?= date("d-m-Y", strtotime($patient['date_naissance'])) ?></td>
                                <td><?= date("d-m-Y", strtotime($patient['date_vaccination'])) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">Aucun patient n'a reçu ce vaccin</td>
                        </tr>
                    <?php endif; ?>
                </table>
            </div>
        <?php endif; ?>
    </main>
</body>

</html>