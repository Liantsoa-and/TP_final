<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
</head>
<body>
    <form action="traitement.php" method="post">
        <input type="text" name="nom" required>
        <input type="email" name="email" id="" required>
        <input type="date" name="datenaissance" id="" required>
        <input type="text" name="ville" id="" required>
        <select name="genre" id="" required>
            <option value="M">Masculin</option>
            <option value="F">Feminin</option>
        </select>
        <input type="password" name="mdp" id="" required>
        <input type="submit" value="S'inscrire">
    </form>
</body>
</html>