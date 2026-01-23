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

        $giorniMese =31; //calcolare con switch i giorniMese
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
    ?>
</body>
</html>