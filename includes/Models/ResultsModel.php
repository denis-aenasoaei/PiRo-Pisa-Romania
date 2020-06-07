<?php

class ResultsModel
{
    private $connection;

    function __construct()
    {
        $this->connection = Database::getConnection();
    }

    public function getAllRomaniaRecords()
    {
        $sql = "SELECT * FROM `ROMANIA_DATA`";
        $request = $this->connection->prepare($sql);
        $request->execute();
        return $request->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function getAllMathRomaniaScores()
    {
        $sql = "SELECT math_grade FROM `ROMANIA_DATA`";
        $request = $this->connection->prepare($sql);
        $request->execute();
        return $request->fetchAll(\PDO::FETCH_ASSOC);
    }
}


?>