<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funzioni del linguaggio</title>
</head>
<body>
    <?php 
            //data una data di nascita verificare se è il compleanno
            $data= "2000-01-31";
            $anno= substr($data, 0,4);        //stampo solo l'anno
            $mese = substr($data,5,2);  //stampo il mese
            $giorno = substr($data,8,2);  //stampo il giorno

            echo "data: $anno/$mese/$giorno";
            echo "<br>";
            if(date("m")==$mese && date("d")==$giorno)
                {
                    echo "Auguri Mario";
                }
            echo "<hr>";

            //strcmp per confrontare la data di oggi e mm-gg di $date
            $subdata=substr($data,5);
            $oggi=date("m-d");
            if (strcmp($subdata,$oggi) ==0)
                {
                    echo "Auguri Mario dalla strcmp";
                }else echo "Le date non sono uguali";

            echo "<hr>";

            //estrarre gg mm aaaa da una stringa
            $a=explode("-",$data);          //explode divide una stringa in più elementi ogni volta che incontra il separatore che in questo caso è "-"
            $anno = $a[0];
            $mese = $a[1];
            $giorno = $a[2];
            print_r($a);

    
    ?>
</body>
</html>