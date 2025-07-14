<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="traitement.php" method="post">
        <input type="text" name="email" placeholder="Email">
        <br>
        <input type="password" name="mdp" placeholder="Mot de passe">
        <br>
        <input type="submit" value="Se connecter">
    </form>
    <p>Vous n'avez pas de compte ? <a href="inscription.php">INSCRIVEZ - VOUS</a></p>
</body>
</html>