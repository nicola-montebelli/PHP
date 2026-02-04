<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Ciao <?php echo $_REQUEST['nome'] ?>;
    questa è la pagina inziale
    <br>
    <?php 
        echo"REQUEST: ";
        print_r($_REQUEST);     //è un unione di post e get
        echo"<br>GET: ";
        print_r($_GET);  //prende tutti i dati che son passati col metodo get
        echo "<br>POST: ";
        print_r($_POST); //prende i dati che passano con post e non appaiono nell'url come succede con il get

    ?>
</body>
</html>