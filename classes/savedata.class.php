<?php

class SaveData extends Dbh
{
    public function setData(string $inputValue1, int $inputValue2, string $inputValue3): void
    {
        $sql1 = "INSERT INTO A (column_1) VALUE (?)";
        $stmt1 = $this->connect()->prepare($sql1);
        $result1 = $stmt1->execute([$inputValue1]);

        $sql2 = "INSERT INTO B (column_1) VALUE (?)";
        $stmt2 = $this->connect()->prepare($sql2);
        $result2 = $stmt2->execute([$inputValue2]);

        $sql3 = "INSERT INTO C (column_1) VALUE (?)";
        $stmt3 = $this->connect()->prepare($sql3);
        $result3 = $stmt3->execute([$inputValue3]);

        if ($result1 && $result2 && $result3) {
            echo 'Successfully saved data to database';
            echo "<a href='./'>Back to Homepage</a>";
        } else {
            echo 'There was an error while trying to save data to database';
        }
    }
}
