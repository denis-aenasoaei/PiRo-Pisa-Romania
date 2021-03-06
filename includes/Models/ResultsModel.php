<?php

class ResultsModel
{
    private $connection;

    function __construct()
    {
        $this->connection = Database::getConnection();
    }

    public function getAllCountries()
    {
        $sql = "Select Country from country_scores";
        $req = $this->connection->prepare($sql);
        $req->execute();
        return $req->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getArrayBasedOnFilters($desiredMean, $filters, $countries=[])
    {
        try{
            $outputCountriesData = [];
            if(strtolower($desiredMean) === "all")
            {
                foreach($countries as $country)
                {

                    if(strpos('Romania', $country) !== false)
                    {
                        
                        $sql = "SELECT nvl(FLOOR((AVG(MATH_GRADE) + AVG(READ_GRADE) + AVG(SCIE_GRADE))/3), 0) as 'MEAN', 'Romania' as 'Country' FROM `ROMANIA_DATA`";
                        if($filters !== NULL)
                        {
                            $sql .= " WHERE ";
                            foreach($filters as $column_name => $column_value)
                            {
                                    $sql = $sql . $column_name . "=? and "; 
                            }
                            $sql = rtrim($sql, ' and ');
                            
                            $request = $this->connection->prepare($sql);
                            $i=1;
                            foreach($filters as $column_name => $column_value)
                            {
                                if(gettype($column_value) === "string")
                                {
                                    $request->bindParam($i, $filters[$column_name], PDO::PARAM_STR);
                                }
                                elseif(gettype($column_value) === "integer")
                                {
                                    $request->bindParam($i, $filters[$column_name], PDO::PARAM_INT);
                                }
                                elseif(gettype($column_value) === "double")
                                {
                                    $request->bindParam($i, strval($filters[$column_name]), PDO::PARAM_STR);
                                }
                                $i += 1;
                            }
                            $request->execute();
                            
                            array_push($outputCountriesData, $request->fetch(\PDO::FETCH_ASSOC));
                        }
                        else
                        {
                            $sql = "SELECT nvl(FLOOR((AVG(MATH_GRADE) + AVG(READ_GRADE) + AVG(SCIE_GRADE))/3), 0) as 'MEAN', 'Romania' as 'Country' FROM `ROMANIA_DATA`";
                            $request = $this->connection->prepare($sql);
                            $request->execute();
                            array_push($outputCountriesData, $request->fetch(\PDO::FETCH_ASSOC));
                            
                        }
                        
                    }
                    else
                    {
                        $sql = "SELECT nvl(FLOOR((READ_MEAN + MATH_MEAN + SCIE_MEAN)/3), 0) as 'MEAN', Country as 'Country' FROM `COUNTRY_SCORES` where Country =? ";

                        $request = $this->connection->prepare($sql);
                        $request->bindParam(1, $country);
                        $request->execute();
                        array_push($outputCountriesData, $request->fetch(\PDO::FETCH_ASSOC));
                    }
                }
                
            }
            else
            {
                foreach($countries as $country)
                {
                    if(strpos('Romania', $country) !== false)
                    {
                        
                        $sql = "SELECT nvl(FLOOR(AVG(" . strtoupper($desiredMean) . "_GRADE)), 0) as 'MEAN', 'Romania' as 'Country' FROM `ROMANIA_DATA`";
                        if($filters !== NULL)
                        {
                            $sql .= " WHERE ";
                            foreach($filters as $column_name => $column_value)
                            {
                                    $sql = $sql . $column_name . "=? and "; 
                            }
                            $sql = rtrim($sql, ' and ');
                            
                            $request = $this->connection->prepare($sql);
                            $i=1;
                            foreach($filters as $column_name => $column_value)
                            {
                                if(gettype($column_value) === "string")
                                {
                                    $request->bindParam($i, $filters[$column_name], PDO::PARAM_STR);
                                }
                                elseif(gettype($column_value) === "integer")
                                {
                                    $request->bindParam($i, $filters[$column_name], PDO::PARAM_INT);
                                }
                                elseif(gettype($column_value) === "double")
                                {
                                    $request->bindParam($i, strval($filters[$column_name]), PDO::PARAM_STR);
                                }
                                $i += 1;
                            }
                            $request->execute();
                            array_push($outputCountriesData, $request->fetch(\PDO::FETCH_ASSOC));
                        }
                        else
                        {
                            
                            $sql = "SELECT nvl(FLOOR(AVG(" . strtoupper($desiredMean) . "_GRADE)), 0) as 'MEAN', 'Romania' as 'Country' FROM `ROMANIA_DATA`";
                            $request = $this->connection->prepare($sql);
                            $request->execute();
                            array_push($outputCountriesData, $request->fetch(\PDO::FETCH_ASSOC));
                        }
                    }
                    else
                    {
                        $sql = "SELECT nvl(" . strtoupper($desiredMean) . "_MEAN, 0) as 'MEAN', Country as 'Country' FROM `COUNTRY_SCORES` where Country =? ";
                        $request = $this->connection->prepare($sql);
                        $request->bindParam(1, $country);
                        $request->execute();
                        array_push($outputCountriesData, $request->fetch(\PDO::FETCH_ASSOC));
                    }
                }
               
            }
            return $outputCountriesData;
            
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}


?>