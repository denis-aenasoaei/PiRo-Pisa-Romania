<?php
class AdminModel{
    private $connection;

    function __construct()
    {
        $this->connection = Database::getConnection();
    }
    public function checkUUID($uuid,$user){
            $sql="SELECT * FROM sessions WHERE key=(?) and user=(?)";
            $request = $this->connection->prepare($sql);
            $request->bindParam(1, $uuid);
            $request->bindParam(2, $user);
            if(!$request->execute())
                return false;
            $request=$request->fetch();
            if(empty($request))
                return false;
            else
                return true;
    }
    
    public function deleteCountry($country){
    
        $sql="DELETE FROM country_scores where Country=(?)";
        $request = $this->connection->prepare($sql);
        $request->bindParam(1, $country);
        if(!$request->execute())
            return false;
        return true;
    }

    public function updateGrade(){

    }
    public function insertCountry($country,$readMean,$mathMean,$scienceMean){

        $sql="INSERT into country_scores (`Country`,`READ_MEAN`,`MATH_MEAN`,`SCIE_MEAN`) values(?,?,?,?) ";
        $request = $this->connection->prepare($sql);
        $request->bindParam(1, $country);
        $request->bindParam(2, $readMean);
        $request->bindParam(3, $mathMean);
        $request->bindParam(4, $scienceMean);
        if(!$request->execute())
            return false;
        return true;

    }
    public function insertUser($user,$passwd){ 
        $sql="INSERT into administrators (`user`,`password`) values(?,?) ";
        $request = $this->connection->prepare($sql);
        $request->bindParam(1, $user);
        $request->bindParam(2, password_hash($passwd, PASSWORD_DEFAULT));
        if(!$request->execute())
           return false;    
        return true;
 
    }
    public function deleteUser($user){

        $sql="DELETE FROM administrators where user=(?)";
        $request = $this->connection->prepare($sql);
        $request->bindParam(1, $user);
        if(!$request->execute())
            return false;
        return true;
        
    }

    public function insertStudent($idStud,$mathGrade,$readGrade,$scienceGrade,$gen,$schoolGrade,$age,$wealth){

        $sql="INSERT into romania_data (`STUD_ID`,`READ_MEAN`,`MATH_MEAN`,`SCIE_MEAN`,`GENDER`,`SCHOOL_GRADE`,`AGE`,`WEALTH_RANGE`) values(?,?,?,?,?,?,?,?) ";
        $request = $this->connection->prepare($sql);
        $request->bindParam(1, $idStud);
        $request->bindParam(2, $readGrade);
        $request->bindParam(3, $mathGrade);
        $request->bindParam(4, $scienceGrade);
        $request->bindParam(5, $gen);
        $request->bindParam(6, $schoolGrade);
        $request->bindParam(7, $age);
        $request->bindParam(8, $wealth);
        if(!$request->execute())
            return false;
        return true;

    }

    public function deleteStudent($idStudent){

        $sql="DELETE from romania_data where STUD_ID=(?)";
        $request = $this->connection->prepare($sql);
        $request->bindParam(1, $idStudent);
        if(!$request->execute())
            return false;
        return true;
    }

    public function updateStud($idStud1, $values){
        $sql="UPDATE romania_data SET ";

        foreach($values as $k=>$v)
        {
            $sql = $sql . $k . "=? , ";
        }

        $sql = rtrim($sql, ", ");

        $sql .= " where stud_id=?";

        $request = $this->connection->prepare($sql);

        $i = 1;
        foreach($values as $k=>$v)
        {
            echo $k;
            echo $v;
            if($k == "wealth_range")
                $request->bindValue($i, $v, PDO::PARAM_INT);
            else{
                $request->bindValue($i, $v);
            }
            $i += 1;
        }


        $request->bindParam($i, $id_stud1, PDO::PARAM_INT);


        if(!$request->execute())
            return false;
        return true;

    }

}
?>