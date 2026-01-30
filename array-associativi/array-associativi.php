<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Associativi - Ciclo Foreach</title>
</head>
<body>
    <?php 
        $a=[0 => 1,1 => 2,10 => 3,"Nic","Fede", 100 => "Rej","Jak"]; //forzatura dell'indice 
        //"Nic" ha indice 11 perchè conta come elemento in fondo (10 +1) e "Jak" 101
        print_r($a);
        echo "<br>";

        // for($i=0;$i<count($a);$i++)
        //     {
        //         echo $a[$i];            Errore: Undefined - Non si può usare il ciclo for perchè alcuni elementi i-esimi dell'array non sono valorizzati (0->1,1->1 .. 10 -> "nic") 
        //     }
       
        foreach($a as $chiave => $valore)   //$chiave(indice) => $valore(elemento) i-esimi dell'array
                                                //a ogni iterazione $valore assume il valore dell'elemento i-esimo
            {
                echo "$chiave) $valore <br>"; //$chiave è l'indice dell'array $a 

            }
            echo "<hr>";
        foreach($a as $chiave =>$valore)    //il foreach si può usare sempre per gli array(a patto che contenga elementi) mentre il FOR solo per gli array con indici consecutivi
            {
                if($valore == "Nic")
                    {
                        echo "$valore<br>";
                    }
            }
            echo "<hr>";
        foreach($a as $chiave => $valore)
            {
                if($chiave>=100) echo "$valore<br>";
            }
            echo "<hr>";

        $i=0;
        foreach($a as $k => $v)
            {
                //$v corrisponde ad $a[$key] (elemento i-esimo)
                $i++;
                echo "$i) $k: $a[$k] <br>";
            }
            echo "<hr>";

        $array = [1, 2, 3, 17];
        foreach ($array as $value) 
            {
                echo "Current element of \$array: $value.<br>";
            }
            echo "<hr>";


            //esercizio
            //inizializzo un array delle temperature con n.giorni del mese corrente con valori random tra -10 e 35
            //elencare i giorni con temperature sotto lo 0 

        $giorniMese =31;
        $i=1;
        $temp=[];
        while($i<=$giorniMese)
            {
                $temp[$i]=rand(-10,35);
                $i++;
            }
        print_r($temp);
        echo "<br>";
        foreach($temp as $giorno => $value)
            {
                if($value<0)
                    {
                        echo "$giorno/".date("m/Y").": $value <br>";
                    }
            }
        echo "<hr>";
        
        //esempio con chiave associativa

        $voti =['Mario' => 10,'Giovanni' => 5, 'Pippo' => 7,'Bauden' => 8,'Merkel'=> 8];
        //$voti[]=6; //aggiungere un valore dal fondo senza chiave risulterà con quel valore che avrà indice 0 perchè è il primo libero
        $voti['Giulia']=6;
        $voti['Mario']=6; //aggiungere un valore a una chiave già esistente va a sostituire il valore precedente
        print_r($voti);

        echo "<table>";
        $i=0;
        $somma=0;
        foreach($voti as $nome=> $voto){  //solitamente si usa fare $plurale as $singolare

            if($i%3==0)
                {
                    echo"<tr>";
                    echo "<td><b>Nome</b></td>";    //intestazione ogni 3 iterazioni
                    echo "<td><b>Voto</b></td>";
                    echo"</tr>";  
                }
            echo"<tr>";
            echo "<td>$nome -</td>";
            echo "<td>($voto)</td>";
            echo"</tr>";

            //media dei voti
            $somma+= $voto;
            $i++;
        }
        echo "</table>";
        $media=count($voti) >0?($somma/count($voti)) : 0;
        if($media==0)
            {
                echo "Non è possibile calcolare la media";
            }
        else
            {
                echo"<br> Media = ".number_format($media,2, ",", ".")."<br>";       //funzione che formatta i numeri
            }
         
        echo "<hr>";


        //per casa calcolare il voto più alto e chi l'ha preso
        //scrivere il nome di chi ha un voto più alto della media


        $nMax=max($voti);   //max() trova il valore massimo, in questo caso in un array senza restituire la chiave
        $nomeMax=array_search($nMax,$voti); //array_search() trova a che chiave è associato il valore in ingresso
        echo "Il voto più alto è: $nMax<br> ed è stato assegnato a $nomeMax (trovato tramite funzioni)<br>";  //di per sè funziona ma il problema è che trova solo il primo valore massimo
                                                                                    //e la prima chiave del valore massimo
        echo "<br>";   
        echo "(trovato tramite ciclo):<br>";                                                                   
        foreach($voti as $studente => $mark)
            {
                if($mark>$nMax || $mark==$nMax)
                    {
                        echo "$studente ha il voto più alto $mark <br>";
                    }
                if($mark>$media)
                    {
                        echo"$studente  è sopra la media con voto $mark<br>";
                    }
            }

    ?>
</body>
</html>