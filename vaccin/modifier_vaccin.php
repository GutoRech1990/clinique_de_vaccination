<?php
require '../DB/config.php';

$liste_vaccins = [];
$id = filter_input(INPUT_GET, "id");

if ($id) {
    $sql = $pdo->prepare("SELECT * FROM vaccin WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $liste_vaccins = $sql->fetch(PDO::FETCH_ASSOC);
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
            <h1>Modifier Vaccin</h1>
            <form action="modifier_vaccin_action.php" method="POST" style="width: 100%;">

                <input type="hidden" name="id" value="<?= htmlspecialchars($liste_vaccins['id']); ?>">

                <div class="form-control">
                    <label for="nom">Nom:
                        <input type="text" name="nom" id="nom" value="<?= htmlspecialchars($liste_vaccins['nom']); ?>"
                            required>
                    </label>
                </div>

                <div class="form-control">
                    <label for="fournisseur">Fournisseur:
                        <input type="text" name="fournisseur" id="fournisseur"
                            value="<?= htmlspecialchars($liste_vaccins['fournisseur']); ?>" required>
                    </label>
                </div>

                <div class="form-control">
                    <label for="fabricant">Fabricant:
                        <input type="text" name="fabricant" id="fabricant"
                            value="<?= htmlspecialchars($liste_vaccins['fabricant']); ?>" required>
                    </label>
                </div>

                <div class="form-control">
                    <label for="prix">Prix:
                        <input type="number" name="prix" id="prix"
                            value="<?= htmlspecialchars($liste_vaccins['prix']); ?>" required>
                    </label>
                </div>

                <input type="submit" value="Modifier" class="btn btn-modifier">
            </form>
        </div>
    </main>
</body>

</html>