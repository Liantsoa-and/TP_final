<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
</head>
<body>
    <form action="traitement.php" method="post">
        <p><input type="text" placeholder="nom" name="nom" required></p>
        <p><input type="email" placeholder="nom@gmail.com" name="email" id="" required></p>
        <p><input type="date" placeholder="Date de naissance" name="datenaissance" id="" required></p>
        <p><input type="text" placeholder="Ville" name="ville" id="" required></p>
        <br>
        <select name="genre" id="" required>
            <option value="M">Masculin</option>
            <option value="F">Feminin</option>
        </select>
        <br>
        <p><input type="password" placeholder="Mot de passe" name="mdp" id="" required></p>
        <p><input type="submit" value="S'inscrire"></p>
    </form>
</body>
</html>