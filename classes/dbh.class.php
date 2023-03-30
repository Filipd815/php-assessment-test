<?php

/**
 * The Dbh class represents a connection to a MySQL database
 */
class Dbh
{
    // Database configuration variables
    private string $host = 'localhost';
    private string $user = 'root';
    private string $pass = '';
    private string $dbName = 'revpanda';

    // Connection object
    private PDO $conn;

    /**
     * Creates a new connection to the database using the configured variables
     *
     * @return PDO The connection object
     */
    public function connect(): PDO
    {
        // Construct the DSN string
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;

        // Create a new PDO object and configure the default fetch mode
        $this->conn = new PDO($dsn, $this->user, $this->pass);
        $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $this->conn;
    }

    /**
     * Creates the database with the configured name
     */
    public function createDb(): void
    {
        try {
            // Create a new connection to MySQL without specifying a database name
            $dbh = new PDO("mysql:host=$this->host", $this->user, $this->pass);

            // Create the database with the configured name
            $sql = "CREATE DATABASE $this->dbName";
            $dbh->exec($sql);

            echo 'Database ' . $this->dbName . ' successfully created';
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    /**
     * Creates the necessary tables for the application to function
     */
    public function createTables(): void
    {
        try {
            // Create Table A
            $sql_a = "CREATE TABLE A (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                column_1 VARCHAR(50) NOT NULL
            )";

            $this->conn->exec($sql_a);
            echo '<br>Table A created successfully';

            // Create Table B
            $sql_b = "CREATE TABLE B (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                column_1 INT(30) NOT NULL
            )";

            $this->conn->exec($sql_b);
            echo '<br>Table B created successfully';

            // Create Table C
            $sql_c = "CREATE TABLE C (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                column_1 VARCHAR(50) NOT NULL
            )";

            $this->conn->exec($sql_c);
            echo '<br>Table C created successfully';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
