<?php 
include_once("Persona.php");
class Corso
{
    public $titolo;
    public $anno;
    public $docente;
    public $studenti;


    function __construct($titolo,$anno)
    {
        $this->titolo = $titolo;
        $this->anno = $anno;
    }

    function stampaDati()
    {
        echo $this->titolo." ".$this->anno."<br>";
        $d = $this->docente;
        echo "docente : ".$d -> getNome()."<br>";
        echo $this->nStudenti()." studenti:";
        foreach($this->studenti as $studente)
            {
                echo"<br>".$studente->getCognome();
            }
    }

    function nStudenti()
    {
        return count($this->studenti);
    }
    
//funzione della media
     function media($voti)
        {
        $sommaTot=0;
        foreach($voti as $voto)
            {
                $sommaTot += $voto;
            }
            $media = $sommaTot/count($voti);
            return $media;
        }
//funzione che trova il miglior studente con la media più alta
    function migliorStudente()
    {
        $migliore = null;
        $media=0;
        foreach($this->studenti as $studente)
            {
                $media_temp = $this->media($studente->getVoti());
                if($migliore == null)
                    {
                        $migliore = $studente;
                        $media = $media_temp;
                    }
                else if($media_temp > $media)
                    {
                        $migliore = $studente;
                        $media = $media_temp;
                    }
            }
            return "Il migliore è ". $migliore->getNome()." ". $migliore->getCognome()." con media $media";
    }
}

?>