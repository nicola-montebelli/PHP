<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "Titolo Dinamico" ?></title>  <!-- parte php può essere inserita anche in tag html-->
</head>
<body>
    <?php 
    echo "<b><i>Data : </b>".date("d/m/Y")." Sono le ore: " .date("H:i:s"). "</i><br>"; // il . è CONCATENAZIONE in php
    echo " <br> Una riga <br>";
    echo "Millisecondi dal 1° Gennio 1970: ".time()." ms";
    // /* commento
    // su più           ctrl+k+c per commentare una porzione
    // righe*/          ctrl+k+u per scommentare

    ?>
    <br>Prima pagina memorizzata nel server
        <!-- si possono inserire tag html anche dentro il php tanto il browser li interpreta-->
    <?php
        echo "<br>Testo <b>Dinamico</b>"; 
    ?>
</body>
</html>