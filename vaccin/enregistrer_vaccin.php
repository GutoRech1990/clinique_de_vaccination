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
            <h1>Enregistrer Vaccin</h1>
            <form action="enregistrer_vaccin_action.php" method="POST">
                <div class="form-control">
                    <label for="nom">Nom:
                        <input type="text" name="nom" id="">
                    </label>
                </div>
                <div class="form-control">
                    <label for="nom">Fournisseur:
                        <input type="text" name="fournisseur" id="">
                    </label>
                </div>
                <div class="form-control">
                    <label for="nom">Fabricant:
                        <input type="text" name="fabricant" id="">
                    </label>
                </div>
                <div class="form-control">
                    <label for="nom">Prix:
                        <input type="number" name="prix" id="">
                    </label>
                </div>
                <input type="submit" class="buttons_enregistrer" value="Enregistrer">
            </form>
        </div>
    </main>
</body>

</html>