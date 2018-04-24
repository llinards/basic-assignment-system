<?php


class Testi extends Db
{
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