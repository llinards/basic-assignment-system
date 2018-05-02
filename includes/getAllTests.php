<?php

//Objekts Testi, kas manto metodes no Db objekta
class Testi extends Db
{
    //metode, kas atgriež visus pieejamos testus sākumlapā
    public function getAllTests()
    {
        $query = "SELECT * FROM testi";
        $result = $this->connect()->query($query);
        if(!$result) die ($conn->error);

        while($row = mysqli_fetch_assoc($result)) {
            $testi[] = $row;
        }

        return $testi;
    }
}

?>