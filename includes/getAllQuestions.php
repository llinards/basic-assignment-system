<?php

//Objekts Questions, kas manto metodes no Db objekta
class Questions extends Db
{
    //metode, kas atgriež visus jautājumus no DB
    protected function getAllQuestions($testa_id)
    {
        $query = "SELECT * FROM jautajumi WHERE testa_id = $testa_id";
        $result = $this->connect()->query($query);
        if(!$result) die ($conn->error);

        while($row = mysqli_fetch_assoc($result)) {
            $jautajumi[] = $row;
        }
        return $jautajumi;
    }

    //metode, kas atgriež tikai to jautājumu, kas nepieciešams testa izpildes brīdī
    public function getQuestion($testa_id, $jautajuma_numurs)
    {
        $result = $this->getAllQuestions($testa_id);
        $result = $result[$jautajuma_numurs];
        return $result;
    }

    //metode, kas atgriež jautājumu skaitu
    public function getNumberOfQuestions($testa_id)
    {
        $result = $this->getAllQuestions($testa_id);
        $result = count($result);
        return $result;
    }
    
}


?>