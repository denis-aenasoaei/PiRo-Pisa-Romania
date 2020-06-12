<?php
class AdminModel{
    private $connection;

    function __construct()
    {
        $this->connection = Database::getConnection();
    }
    public function checkUUID($uuid,$user){
            $sql="SELECT * FROM sessions WHERE key=? and user=?";
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
    
        $sql="DELETE FROM country_scores where Country=?";
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
        $hash=password_hash($passwd, PASSWORD_DEFAULT);
        $sql="INSERT into administrators (user,password) values(?,?) ";
        $request = $this->connection->prepare($sql);
        $request->bindParam(1, $user);
        $request->bindParam(2, $hash);
        if(!$request->execute())
           return false;    
        return true;
 
    }
    public function deleteUser($user){
        $sql="DELETE from administrators where user=?";
        $request = $this->connection->prepare($sql);
        $request->bindParam(1, $user);
        if(!$request->execute())
            return false;
        return true;
        
    }
    public function updateUser($user,$password){
        $hash=password_hash($password,PASSWORD_DEFAULT);
        $sql="UPDATE administrators set password=? where user=?";
        $request = $this->connection->prepare($sql);
        $request->bindParam(1, $hash);
        $request->bindParam(2, $user);
        if(!$request->execute())
            return false;
        return true;

    }
    public function insertStudent($studId,$readGrade,$mathGrade,$scienceGrade,$gender,$schoolGrade,$age,$wealth){
        $sql="INSERT into romania_data (stud_id,math_grade,read_grade,scie_grade,gender,school_grade,age,wealth_range) values(:id,:math,:read,:scie,:gen,:school,:age,':wealth') ";
        $request = $this->connection->prepare($sql);
        $request->bindParam(":id", $studId);
        $request->bindParam(":math", $mathGrade);
        $request->bindParam(":read", $readGrade);
        $request->bindParam(":scie", $scienceGrade);
        $request->bindParam(":gen", $gen);
        $request->bindParam(":school", $schoolGrade);
        $request->bindParam(":age", $age);
        $request->bindParam(":wealth", $wealth);
        echo $studId."_".$readGrade."_".$mathGrade."_".$scienceGrade."_".$gender."_".$schoolGrade."_".$age."_".$wealth;
        if(!$request->execute())
            return false;
        return true;
    }

    public function deleteStudent($idStudent){

        $sql="DELETE from romania_data where STUD_ID=?";
        $request = $this->connection->prepare($sql);
        $request->bindParam(1, $idStudent);
        if(!$request->execute())
            return false;
        return true;
    }
    public function updateCountry($country,$read,$math,$science){
        $sql="UPDATE country_scores set ";
        $set=0;
        if($read!==''){
            $sql=$sql."read_mean=".$read;
            $set=1;
        }
        if($math!==''){
            if($set==0)
                $sql=$sql."math_mean=".$math;
            else
                $sql=$sql.",math_mean=".$math;
            $set=1;
        }
        if($science!==''){
            if($set==0)
                $sql=$sql."scie_mean=".$science;
            else
                $sql=$sql.",scie_mean=".$science;
            $set=1;
        }
        if($set==0)
            return false;
        $sql=$sql." where country=?";
        $request = $this->connection->prepare($sql);
        $request->bindParam(1, $country);
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


        $request->bindParam($i, $idStud1, PDO::PARAM_INT);


        if(!$request->execute())
            return false;
        return true;

    }
    public function selectTable($table,$filterArray){
        $sql="SELECT * from ".$table;
        if($table==="country_scores"){
            $country= $filterArray["country"];
            $read_mean =$filterArray["read"];
            $math_mean =$filterArray["math"];
            $science_mean =$filterArray["science"];
            if($country!=='' || $read_mean!=='' || $math_mean!=='' || $science_mean!==''){
                $sql=$sql." where ";
                $set=0;
                if($country!==''){
                    $sql=$sql."country='".$country."'";
                    $set=1;
                }
                if($read_mean!==''){
                    if($set==1)
                        $sql=$sql." and read_mean=".$read_mean;
                    else{
                        $sql=$sql."read_mean=".$read_mean;
                        $set=1;
                    }
                }
                if($math_mean!==''){
                    if($set==1)
                        $sql=$sql." and math_mean=".$math_mean;
                    else{
                        $sql=$sql."math_mean=".$math_mean;
                        $set=1;
                    }
                }
                if($science_mean!==''){
                    if($set==1)
                        $sql=$sql." and science_mean=".$science_mean;
                    else{
                        $sql=$sql."science_mean=".$science_mean;
                        $set=1;
                    }
                }
            }

        }
        else if($table==="romania_data"){
            $studId= $filterArray["stud_id"];
            $readGrade=$filterArray["read"];
            $mathGrade =$filterArray["math"];
            $scienceGrade =$filterArray["science"];
            $gender=$filterArray["gender"];
            $schoolGrade=$filterArray["school_grade"];
            $age=$filterArray["age"];
            $wealth=$filterArray["wealth_range"];
            if($studId!=='' || $readGrade!=='' || $mathGrade!=='' || $scienceGrade!=='' || $gender!=='' || $schoolGrade!=='' || $age!=='' || $wealth!==''){
                $sql=$sql." where ";
                $set=0;
                if($studId!==''){
                    $sql=$sql."stud_id=".$studId;
                    $set=1;
                }
                if($readGrade!==''){
                    if($set==1)
                        $sql=$sql." and read_grade=".$readGrade;
                    else{
                        $sql=$sql."read_grade=".$readGrade;
                        $set=1;
                    }
                }
                if($mathGrade!==''){
                    if($set==1)
                        $sql=$sql." and math_grade=".$mathGrade;
                    else{
                        $sql=$sql."math_grade=".$mathGrade;
                        $set=1;
                    }
                }
                if($scienceGrade!==''){
                    if($set==1)
                        $sql=$sql." and science_grade=".$scienceGrade;
                    else{
                        $sql=$sql."science_grade=".$scienceGrade;
                        $set=1;
                    }
                }
                if($gender!==''){
                    if($set==1)
                        $sql=$sql." and gender=".$gender;
                    else{
                        $sql=$sql."gender=".$gender;
                        $set=1;
                    }
                }
                if($schoolGrade!==''){
                    if($set==1)
                        $sql=$sql." and school_grade=".$schoolGrade;
                    else{
                        $sql=$sql."school_grade=".$schoolGrade;
                        $set=1;
                    }
                }
                if($age!==''){
                    if($set==1)
                        $sql=$sql." and age=".$age;
                    else{
                        $sql=$sql."age=".$age;
                        $set=1;
                    }
                }
                if($wealth!==''){
                    if($set==1)
                        $sql=$sql." and wealth_range='".$wealth."'";
                    else{
                        $sql=$sql."wealth_range='".$wealth."'";
                        $set=1;
                    }
                }
            }
        }
        else if($table==="Administrators"){
            $usern=$filterArray["user"];
            if($usern!==''){
                $sql=$sql." where ";
                if($usern!==''){
                    $sql=$sql."user='".$usern."'";
                }
            }
        }
        $request = $this->connection->prepare($sql);
        $request->execute();
        echo json_encode($request->fetchAll(),JSON_FORCE_OBJECT);
        return true;
    }

}
?>