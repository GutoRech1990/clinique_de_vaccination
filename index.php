<?php

session_start();

// Verifier si le utilisateur est loged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Redirecioner a la page de login
    header("Location: login/login.php");
    exit;
}

// ---------------------------------------------------------------------------

require 'DB/config.php';

$patient_liste = [];
$sql = $pdo->query("SELECT * FROM patient");

if ($sql->rowCount() > 0) {
    $patient_liste = $sql->fetchAll(PDO::FETCH_ASSOC);
}

$vaccin_liste = [];
$sql = $pdo->query("SELECT * FROM vaccin");

if ($sql->rowCount() > 0) {
    $vaccin_liste = $sql->fetchAll(PDO::FETCH_ASSOC);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrôle des vaccins</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <nav>
            <h1>Contrôle des vaccins</h1>
        </nav>
        <div class="buttons_enregistrer">
            <button><a href="./patient/enregistrer_patient.php">Enregistrer patient</a></button>
            <button><a href="./vaccin/enregistrer_vaccin.php">Enregistrer vaccin</a></button>
            <button><a href="./vaccination/enregistrer_vaccination.php">Enregistrer vaccination</a></button>
            <button style="background-color: red;"><a href=" ./login/logout.php">Logout</a></button>
        </div>
    </header>

    <main>
        <div>

            <table>
                <tr>
                    <td colspan="6">
                        <h2>Liste de Patients</h2>
                    </td>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Age</th>
                    <th>Adresse</th>
                    <th>Date de naissance</th>
                    <th>Options</th>
                </tr>
                <?php foreach ($patient_liste as $patient): ?>
                    <tr>
                        <td><?= $patient['id']; ?></td>
                        <td><?= $patient['nom']; ?></td>
                        <td><?= $patient['age']; ?></td>
                        <td><?= $patient['adresse']; ?></td>
                        <td><?= date("d-m-Y", strtotime($patient['date_naissance'])); ?></td>
                        <td>
                            <a href="./patient/consulter_patient.php?id=<?= $patient['id']; ?>"><button title="Consulter"
                                    class="btn btn-consulter">🔎</button></a>
                            <a href="./patient/modifier_patient.php?id=<?= $patient['id']; ?>"><button title="Editer"
                                    class="btn btn-modifier">✍️</button></a>
                            <a href="./patient/suprimer_patient.php?id=<?= $patient['id']; ?>"><button title="Supprimer"
                                    class="btn btn-suprimer">❌</button></a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </table>
        </div>

        <div>

            <table>
                <tr>
                    <td colspan="6">
                        <h2>Liste de Vaccins</h2>
                    </td>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Fournisseur</th>
                    <th>Fabricant</th>
                    <th>Prix</th>
                    <th>Options</th>
                </tr>
                <?php foreach ($vaccin_liste as $vaccin): ?>
                    <tr>
                        <td><?= $vaccin['id']; ?></td>
                        <td><?= $vaccin['nom']; ?></td>
                        <td><?= $vaccin['fournisseur']; ?></td>
                        <td><?= $vaccin['fabricant']; ?></td>
                        <td><?= $vaccin['prix']; ?></td>
                        <td>
                            <a href="./vaccin/consulter_vaccin.php?id=<?= $vaccin['id']; ?>">
                                <button title="Consulter" class="btn btn-consulter">🔎</button></a>
                            <a href="./vaccin/modifier_vaccin.php?id=<?= $vaccin['id']; ?>"><button title="Modifier"
                                    class="btn btn-modifier">✍️</button></a>
                            <a href="./vaccin/suprimer_vaccin.php?id=<?= $vaccin['id']; ?>"><button title="Suprimer"
                                    class="btn btn-suprimer">❌</button></a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </table>
        </div>
    </main>
</body>

</html>