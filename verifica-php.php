<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifica</title>
</head>
<body>
    <?php 
            $studenti = rand(20,50);    //consegna 1
            $voti=[]; 
            echo "<ol>";
            for($i=0;$i<($studenti-2);$i++) //consegna 2
                {
                    $voti[$i]=rand(1,101);
                    $rigaColore=($i%2)? "#cccc00":"#00cccc";  
                    $grassetto=($voti[$i]>=60)?"b":"i";                  
                    echo"<li style='background:$rigaColore'><$grassetto>". $voti[$i]."</$grassetto></li>";    //consegna 3  //ol li aggiunto dopo la consegna della verifica
                }
                echo"</ol>";
                echo"<br>";
            $lode=0;
            for($i=0;$i<count($voti);$i++)      //consegna 5
                {
                    if($voti[$i]==101)
                        {
                            $lode++;
                        }
                }
                if($lode==1)
                    {
                        echo "La lode c'è stata " .$lode. " volta<br>";
                    }
                else if($lode==0)
                    {
                        echo "Non c'è stata alcuna lode<br>";
                    }
                else if($lode>1)
                    {
                        echo "La lode c'è stata " .$lode." volte<br>";
                    }

                
                $sommaVoti=0;  
                $nMedia=0;
                for($i=0;$i<count($voti);$i++)      //consegna 6
                    {
                        if($voti[$i]>=60)
                            {
                                $sommaVoti+=$voti[$i];
                                $nMedia++;
                            }
                    }
                    echo "La media dei voti dei promossi è " . ($sommaVoti/$nMedia) . "<br>";

                $posti=10;
                $ammessibili=0;
                $ammessi=0;
                $inAttesa=0;
                $bocciati=0;
                for($i=0;$i<count($voti);$i++)
                    {
                        if($voti[$i]>=80)
                            {
                                $ammessibili++;
                            }
                    }
                if($ammessibili==0)
                    {
                        echo "Non ci sono ammessibili<br>";
                    }
                
                if($posti<$ammessibili)
                    {
                        $ammessi=$posti;
                        $inAttesa=$ammessibili-$posti;
                    }
                else
                    {
                        $ammessi= $ammessibili;
                    }

                $bocciati=(count($voti)-$ammessibili);
                echo "Gli ammessibili sono $ammessibili<br>";
                echo "Gli ammessi in base al numero di posti (".$posti.") sono $ammessi<br>";
                echo "Gli studenti bocciati sono $bocciati <br>";
                echo "Gli studenti in lista d'attesa sono $inAttesa <br>";

                

                //print_r($voti);
            
    ?>
</body>

</html>