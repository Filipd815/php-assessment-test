<?php

class Result extends Dbh
{
    // A mapping of table names to their corresponding SQL queries

    private $queryBuilders = [
        'A' => 'SELECT column_1 FROM A',
        'B' => 'SELECT column_1 FROM B',
        'C' => 'SELECT column_1 FROM C'
    ];

    public function __construct(private int $button_id)
    {
    }

    // Fetches column values for the specified tables using parameterized queries

    private function fetchData(array $tables)
    {
        $conn = $this->connect();
        $result = [];

        foreach ($tables as $table) {
            $stmt = $conn->prepare($this->queryBuilders[$table]);
            $stmt->execute();

            // Check if the query returns any rows
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch()) {
                    $result[$table][] = $row['column_1'];
                }
            } else {
                // Set the corresponding array value to an empty array
                $result[$table] = [];
                echo "<h4>DataBase is empty</h4>";
            }
        }

        return $result;
    }

    // Fetches data from table A

    private function fetchDataButtonOne()
    {
        $result = $this->fetchData(['A']);
        echo '<h2>Data from table A</h2>';
        foreach ($result['A'] as $row) {
            echo "<p>" . $row . "</p>";
        }
    }

    // Fetches data from tables A, B, and C

    private function fetchDataButtonTwo()
    {
        $result = $this->fetchData(['A', 'B', 'C']);
        echo '<h2>Data from table A</h2>';
        foreach ($result['A'] as $row) {
            echo "<p>" . $row . "</p>";
        }

        echo '<h2>Data from table B</h2>';
        foreach ($result['B'] as $row) {
            echo "<p>" . $row . "</p>";
        }

        echo '<h2>Data from table C</h2>';
        foreach ($result['C'] as $row) {
            echo "<p>" . $row . "</p>";
        }
    }

    // Fetches data from tables B and C

    private function fetchDataButtonThree()
    {
        $result = $this->fetchData(['B', 'C']);
        echo '<h2>Data from table C</h2>';
        foreach ($result['C'] as $row) {
            echo "<p>" . $row . "</p>";
        }

        echo '<h2>Data from table B</h2>';
        foreach ($result['B'] as $row) {
            echo "<p>" . $row . "</p>";
        }
    }

    // Fetches data from table B in ascending order

    private function fetchDataButtonFour()
    {
        $conn = $this->connect();
        $stmt = $conn->prepare('SELECT column_1 FROM B ORDER BY column_1 ASC');
        $stmt->execute();

        echo '<h2>Data from table B</h2>';
        while ($row = $stmt->fetch()) {
            echo "<p>" . $row['column_1'] . "</p>";
        }
    }

    // Fetches data from table B in descending order

    private function fetchDataButtonFive()
    {
        $conn = $this->connect();
        $stmt = $conn->prepare('SELECT column_1 FROM B ORDER BY column_1 DESC');
        $stmt->execute();

        echo '<h2>Data from table B</h2>';
        while ($row = $stmt->fetch()) {
            echo "<p>" . $row['column_1'] . "</p>";
        }
    }

    // Calls the appropriate data-fetching method based on the button ID

    public function showResult()
    {
        switch ($this->button_id) {
            case 1:
                $this->fetchDataButtonOne();
                break;
            case 2:
                $this->fetchDataButtonTwo();
                break;
            case 3:
                $this->fetchDataButtonThree();
                break;
            case 4:
                $this->fetchDataButtonFour();
                break;
            case 5:
                $this->fetchDataButtonFive();
                break;
        }
    }
}