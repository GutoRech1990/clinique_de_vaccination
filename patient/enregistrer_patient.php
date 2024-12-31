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
        <div class="buttons_enregistrer">
            <button class="btn btn-retour"><a href="../index.php">Retour</a></button>
        </div>
    </header>
    <main>
        <div class="formulaire">
            <h1>Enregistrer Patient</h1>
            <form action="enregistrer_patient_action.php" method="POST">
                <div class="form-control">
                    <label for="nom">Nom:
                        <input type="text" name="nom" id="">
                    </label>
                </div>
                <div class="form-control">
                    <label for="nom">Age:
                        <input type="number" name="age" id="">
                    </label>
                </div>
                <div class="form-control">
                    <label for="nom">Adresse:
                        <input type="text" name="adresse" id="">
                    </label>
                </div>
                <div class="form-control">
                    <label for="nom">Date de naissance:
                        <input type="date" name="date_naissance" id="">
                    </label>
                </div>
                <input type="submit" class="buttons_enregistrer" value="Enregistrer">
            </form>
        </div>
    </main>
</body>

</html>