<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Bidimensionali</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <?php 
        $persona1=['nome'=>'Mario','cognome'=>'Rossi','nato'=>'2000-01-31','altezza'=>180];
        $persona2=['nome'=>'Giovanni','cognome'=>'Verdi','nato'=>'1998-09-11','altezza'=>177];
        $persona3=['nome'=>'Giulia','cognome'=>'Bianchi','nato'=>'2001-02-28','altezza'=>192];

        $persone =[$persona1, $persona2, $persona3];

        //print_r($persone);
        // echo "<pre>";
        // var_dump($persona1); //stampa le informazioni della variabile
        // echo "</pre>";

        //elencare i nomi e cognomi delle persone (sapendo che tutti gli elementi di persone contengono la chiave 'nome')
        foreach($persone as $persona){
                // print_r($persona);
                // echo "<br>";
                echo $persona['nome']." ".$persona['cognome']."<br>";   //stampa dei nomi e dei cognomi degli elementi $persona in $persone
        }
        echo "<hr>";

        echo "<table class='table table-striped table-hover'>";     //esempio di come incorporare due classi in un singolo elemento
        //per ogni elemento dell'array $persone[0] scrivere la chiave
        if($persone){
             foreach($persone[0] as $chiave => $valore){        //ci serve stampare le chiavi 'nome', 'cognome', 'nato il, 'altezza' e le andiamo a prendere
                                                                //da $persone[0] che equivale a $persona1
                    echo "<td style='background:#ccc'><b>$chiave</b></td>";       //modo per stampare le chiavi di $persona1 come header della tabella
                }                                                                 //$persone (che è un array che contiene altri array) [0] (l'indice si riferisce a $persona1 che è il primo elemento in $persone)
        }
        foreach($persone as $persona){
            echo"<tr>";
                foreach($persona as $dato){
                    echo "<td>".$dato."</td>";      //elencare tutti i dati di tutte le persone
                }
            echo "</tr>";
        }
        echo "</table>";
        echo "<hr>";

        echo "Stampo la chiave 'nome' di \$persona con indice 0";
        echo "<br>" .$persone[0]['nome']."</b>";

        //altezza della persona con indice 2
        echo "<br> Altezza della persona con indice 2 <br>";
        echo $persone[2]['altezza'];
        echo "<hr>";
        
    ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>