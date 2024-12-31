<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Contrôle des vaccins</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <header>
        <nav>
            <h1>Contrôle des vaccins</h1>
        </nav>
    </header>

    <main>
        <div class="login-container">
            <h2>Connexion</h2>
            <form action="login_action.php" method="POST">
                <div class="form-control">
                    <label for="username">Nom d'utilisateur:</label>
                    <input type="text" name="username" id="username" required>
                </div>

                <div class="form-control">
                    <label for="password">Mot de passe:</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <input type="submit" name="submit" value="Se connecter">
            </form>
        </div>
    </main>
</body>

</html>