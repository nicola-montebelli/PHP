<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Link con query string</title>
</head>
<body>
    Questo è un link alla pagina azione.php
    <?php 
        $nome = "Mariolina";
    ?>
    <a href="azione.php?nome=<?php echo $nome?>">Cicca qui</a>
</body>
</html>