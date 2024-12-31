<?php
require '../DB/config.php';

$id = filter_input(INPUT_GET, "id");

if ($id) {
    // Pour chercher le petient
    $sql = $pdo->prepare("SELECT * FROM patient WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();
    $patient = $sql->fetch(PDO::FETCH_ASSOC);

    // Pour chercher les vaccin du patient
    $sql = $pdo->prepare("
        SELECT 
            v.date_vaccination as date_vaccination,
            vac.nom as nom_vaccin,
            vac.fabricant,
            vac.fournisseur
        FROM vaccination v
        JOIN vaccin vac ON v.id_vaccin = vac.id 
        WHERE v.id_patient = :id_patient
    ");
    $sql->bindValue(':id_patient', $id);
    $sql->execute();
    $vaccinations = $sql->fetchAll(PDO::FETCH_ASSOC);
} else {
    echo "<script>
        alert('Patient non trouvé!!!');
        window.location.href = '../index.php';
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulter Patient</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header>
        <nav>
            <h1>Consulter Patient</h1>
            <button class="btn btn-retour"><a href="../index.php">Retour</a></button>
        </nav>
    </header>

    <main>
        <?php if ($patient): ?>
            <div class="info_patient">
                <h2>Informations du Patient</h2>
                <p><strong>ID:</strong> <?= $patient['id'] ?></p>
                <p><strong>Nom:</strong> <?= $patient['nom'] ?></p>
                <p><strong>Age:</strong> <?= $patient['age'] ?></p>
                <p><strong>Adresse:</strong> <?= $patient['adresse'] ?></p>
                <p><strong>Date de naissance:</strong> <?= date("d-m-Y", strtotime($patient['date_naissance'])); ?></p>
            </div>

            <div class="liste_vaccinations responsive-table">
                <table class="table table-striped">
                    <tr>
                        <td colspan="4">
                            <h2>Historique des Vaccinations</h2>
                        </td>
                    </tr>
                    <tr>
                        <th>Date de vaccination</th>
                        <th>Nom du vaccin</th>
                        <th>Fabricant</th>
                        <th>Fournisseur</th>
                    </tr>
                    <?php if ($vaccinations): ?>
                        <?php foreach ($vaccinations as $vaccination): ?>
                            <tr>
                                <td><?= date("d-m-Y", strtotime($vaccination['date_vaccination'])) ?></td>
                                <td><?= $vaccination['nom_vaccin'] ?></td>
                                <td><?= $vaccination['fabricant'] ?></td>
                                <td><?= $vaccination['fournisseur'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">Aucune vaccination enregistrée</td>
                        </tr>
                    <?php endif; ?>
                </table>
            </div>
        <?php endif; ?>
    </main>
</body>

</html>