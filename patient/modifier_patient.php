<?php
require '../DB/config.php';

$liste_patient = [];
$id = filter_input(INPUT_GET, "id");

if ($id) {
    $sql = $pdo->prepare("SELECT * FROM patient WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $liste_patient = $sql->fetch(PDO::FETCH_ASSOC);
    } else {
        header("Location: ../index.php");
    }
} else {
    header("Location: ../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <h1>Contrôle des vaccins</h1>
        </nav>
        <button class="btn btn-retour"><a href="../index.php">Retour</a></button>
    </header>

    <main>
        <div class="formulaire">
            <h1>Modifier Patient</h1>
            <form action="modifier_patient_action.php" method="POST">

                <input type="hidden" name="id" value="<?= htmlspecialchars($liste_patient['id']); ?>">

                <div class="form-control">
                    <label for="nom">Nom:</label>
                    <input type="text" name="nom" id="nom" value="<?= htmlspecialchars($liste_patient['nom']); ?>"
                        required>
                </div>

                <div class="form-control">
                    <label for="nom">Age:</label>
                    <input type="number" name="age" id="age" value="<?= htmlspecialchars($liste_patient['age']); ?>"
                        required>
                </div>

                <div class="form-control">
                    <label for="nom">Adresse:</label>
                    <input type="text" name="adresse" id="adresse"
                        value="<?= htmlspecialchars($liste_patient['adresse']); ?>" required>
                </div>

                <div class="form-control">
                    <label for="nom">Date de naissance:</label>
                    <input type="date" name="date_naissance" id="date_naissance"
                        value="<?= htmlspecialchars($liste_patient['date_naissance']); ?>" required>
                </div>

                <input type="submit" class="btn btn-modifier" value="Modifier">
            </form>
        </div>
    </main>
</body>

</html>