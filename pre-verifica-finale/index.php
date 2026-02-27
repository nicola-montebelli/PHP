<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pre-verifica del 06.03.26 - Form</title>
</head>
<body>
    <form action="azione.php" method="GET">
        <input type="text" name="mail" placeholder="mail" required>
        <input type="submit" value="Cerca">
    </form>

    <a href="azione.php?mail= <?php echo "contenuto dinamico" ?>">Clicca qui</a> <!-- riguardare la query string per renderla dinamica !-->
</body>
</html>