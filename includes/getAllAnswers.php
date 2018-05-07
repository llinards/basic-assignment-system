<?php
//Objekts Answers, kas manto metodes no Db objekta
class Answers extends Db
{
    //metode, kas atgriež visas atbildes no DB
    protected function getAllAnswers($testa_id) {
        $query = "SELECT * FROM atbildes WHERE testa_id = $testa_id";
        $result = $this->connect()->query($query);
        if(!$result) die ($conn->error);

        while($row = mysqli_fetch_assoc($result)) {
            $atbildes[] = $row;
        }
        return $atbildes;
    }
    
    //metode, kas atgriež atbildes priekš specifiskā jautājuma
    public function getSpecificAnswers($testa_id, $jautajuma_id) {
        $results = $this->getAllAnswers($testa_id);
        foreach ($results as $x)
        {
            if ($x['jautajuma_id'] == $jautajuma_id)
            {
                $result[] = $x;
            }
        }
        return $result;
    }

    //metode, kas ieraksta informāciju par lietotāja atbildi uz jautājumu
    public function setAnswer($vards, $tests, $jaut_atbilde, $jautajums) {
        $query = "INSERT INTO atbildes_uz_jautajumiem(lietotaja_vards, testa_id, jautajuma_id, atbildes_id, datums)
                    VALUES('{$vards}', {$tests}, {$jautajums}, {$jaut_atbilde}, CURRENT_TIMESTAMP())";
        $result = $this->connect()->query($query);
        if(!$result) die ($conn->error);
    }

    //metode, kas ieraksta informāciju par testa rezultātu kopumā
    public function setResult($pareizas_atbildes, $kopa_jautajumi, $vards, $tests) {
        $query = "INSERT INTO rezultati(vards, testa_id, pareizas_atbildes, kopa_jautajumi, datums)
                    VALUES('{$vards}', {$tests}, {$pareizas_atbildes}, {$kopa_jautajumi}, CURRENT_TIMESTAMP())";
        $result = $this->connect()->query($query);
        if(!$result) die ($conn->error);
    }
}


?>