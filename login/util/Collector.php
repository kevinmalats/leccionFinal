<?php
require_once"RolClass.php";
require_once "database/Database.php";


class Collector
{
    protected $con;

    public function __construct()
    {
        $this->con = Database::connect();
    }

    public function read($table, $class = 'stdClass')
    {
        try {
            $queryRead= 'SELECT * FROM '. $table;
            $stmt = $this->con->prepare($queryRead);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_CLASS, $class);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function execQuery($query)
    {
        try {
            $stmt = $this->con->prepare($query);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
