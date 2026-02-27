<?php 
session_start();
define('MAXSELECT', 500); //costante per massimo numero di select eseguibili. Consigliabile mettere questo codice in un file a parte da includere
$n_select = isset($_SESSION['n_select']) ? $_SESSION['n_select'] : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pre-verifica del 06.03.26 - Form</title>
</head>
<body>
    <?php 
        echo "Il servizio di ricerca è stato utilizzato $n_select volte<br>";
        echo "Puoi farlo per altre ".(MAXSELECT - $n_select)." volte<br>";
    ?>
    <form action="azione.php" method="POST" enctype="multipart/form-data">  <!-- per l'upload dei file !-->
        <input type="text" name="mail" placeholder="mail" required>
        <input type="submit" value="Cerca"><br>
        <input type="file" name="img" id="">
    </form>

    <a href="azione.php?mail= <?php echo "contenuto dinamico" ?>">Clicca qui</a> <!-- riguardare la query string per renderla dinamica !-->
</body>
</html>