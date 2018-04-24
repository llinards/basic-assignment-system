<?php

class Answers extends Db
{
    public function getAllAnswers()
    {
        $query = "SELECT * FROM atbildes WHERE testa_id = 1";
        $result = $this->connect()->query($query);
        if(!$result) die ($conn->error);

        while($row = mysqli_fetch_assoc($result)) {
            $atbildes[] = $row;
        }
        return $atbildes;
    }

    public function setAnswer($vards, $tests, $jaut_atbilde, $jautajums)
    {
        $query = "INSERT INTO atbildes_uz_jautajumiem(lietotaja_vards, testa_id, jautajuma_id, atbildes_id, datums)
                    VALUES('{$vards}', {$tests}, {$jautajums}, {$jaut_atbilde}, CURRENT_TIMESTAMP())";
        $result = $this->connect()->query($query);
        if(!$result) die ($conn->error);
    }

    public function setResult($pareizas_atbildes, $kopa_jautajumi, $vards, $tests)
    {
        $query = "INSERT INTO rezultati(vards, testa_id, pareizas_atbildes, kopa_jautajumi, datums)
                    VALUES('{$vards}', {$tests}, {$pareizas_atbildes}, {$kopa_jautajumi}, CURRENT_TIMESTAMP())";
        $result = $this->connect()->query($query);
        if(!$result) die ($conn->error);
    }
}


?>