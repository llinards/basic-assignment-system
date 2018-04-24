<?php

class Questions extends Db
{
    public function getAllQuestions($testa_id)
    {
        $query = "SELECT * FROM jautajumi WHERE testa_id = $testa_id";
        $result = $this->connect()->query($query);
        if(!$result) die ($conn->error);

        while($row = mysqli_fetch_assoc($result)) {
            $jautajumi[] = $row;
        }

        return $jautajumi;
    }
}


?>