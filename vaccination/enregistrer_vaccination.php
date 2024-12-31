<?php
require '../DB/config.php';

// Récupérer la liste des patients
$sql = $pdo->query("SELECT * FROM patient ORDER BY nom");
$patients = $sql->fetchAll(PDO::FETCH_ASSOC);

// Récupérer la liste des vaccins
$sql = $pdo->query("SELECT * FROM vaccin ORDER BY nom");
$vaccins = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrer Vaccination</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
    main {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    select {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    </style>
</head>

<body>
    <header>
        <nav>
            <h1>Contrôle des vaccins</h1>
        </nav>
        <div class="buttons_enregistrer">
            <button class="btn btn-retour"><a href="../index.php">Retour</a></button>
        </div>
    </header>
    <main>
        <div class="formulaire">
            <h1>Enregistrer Vaccination</h1>
            <form action="enregistrer_vaccination_action.php" method="POST">
                <div class="form-control">
                    <label for="patient">Patient:</label>
                    <select name="id_patient" id="patient" required>
                        <option value="">Sélectionner un patient</option>
                        <?php foreach($patients as $patient): ?>
                        <option value="<?= htmlspecialchars($patient['id']) ?>">
                            <?= htmlspecialchars($patient['nom']) ?> -
                            <?= htmlspecialchars($patient['date_naissance']) ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-control">
                    <label for="vaccin">Vaccin:</label>
                    <select name="id_vaccin" id="vaccin" required>
                        <option value="">Sélectionner un vaccin</option>
                        <?php foreach($vaccins as $vaccin): ?>
                        <option value="<?= htmlspecialchars($vaccin['id']) ?>">
                            <?= htmlspecialchars($vaccin['nom']) ?> -
                            <?= htmlspecialchars($vaccin['fabricant']) ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-control">
                    <label for="date_vaccination">Date de vaccination:</label>
                    <input type="date" name="date_vaccination" id="date_vaccination" required>
                </div>
                <input type="submit" class="buttons_enregistrer" value="Enregistrer">
            </form>
        </div>
    </main>
</body>

</html>