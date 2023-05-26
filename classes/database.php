<?php

class Database
{
    private $connection;

    public function __construct()
    {
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bas";

        $dsn = "mysql:host=$host;dbname=$dbname";
        $this->connection = new PDO($dsn, $username, $password);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function executeQuery($query, $params = [])
    {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            echo "Query execution failed: " . $e->getMessage();
            return false;
        }
    }
}
?>
