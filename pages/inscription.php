<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="../assets/style.css">
    <title>inscription</title>
</head>
<body>
<main class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card p-4 shadow-sm" style="max-width: 500px; width: 100%;">
        <h2 class="text-center mb-4 text-primary">Inscription</h2>
        <form action="traitement.php" method="post">
            <div class="mb-3">
                <input type="text" name="nom" class="form-control" placeholder="Nom" required>
            </div>
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="date" name="datenaissance" class="form-control" required>
            </div>
            <div class="mb-3">
                <input type="text" name="ville" class="form-control" placeholder="Ville" required>
            </div>
            <div class="mb-3">
                <select name="genre" class="form-select" required>
                    <option value="" disabled selected>Genre</option>
                    <option value="M">Masculin</option>
                    <option value="F">Féminin</option>
                </select>
            </div>
            <div class="mb-3">
                <input type="password" name="mdp" class="form-control" placeholder="Mot de passe" required>
            </div>
            <div class="d-grid">
                <input type="submit" class="btn btn-primary" value="S'inscrire">
            </div>
        </form>
        <p class="mt-3 text-center">
            Déjà un compte ? <a href="login.php">Connectez-vous</a>
        </p>
    </div>
</main>


</body>
</html>