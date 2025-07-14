<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="../assets/style.css">
    
    <title>Login</title>
</head>
<body>
<main class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card p-4 shadow-sm" style="max-width: 400px; width: 100%;">
        <h2 class="text-center mb-4 text-primary">Connexion</h2>
        <form action="traitement.php" method="post">
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="password" name="mdp" class="form-control" placeholder="Mot de passe" required>
            </div>
            <div class="d-grid">
                <input type="submit" class="btn btn-primary" value="Se connecter">
            </div>
        </form>
        <p class="mt-3 text-center">
            Pas encore inscrit ? <a href="inscription.php">Inscrivez-vous</a>
        </p>
    </div>
</main>

</body>
</html>