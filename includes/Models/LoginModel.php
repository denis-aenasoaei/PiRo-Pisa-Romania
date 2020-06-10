<?php
class LoginModel{
    private $connection;

    function __construct()
    {
        $this->connection = Database::getConnection();
    }
    public function checkCredentials($user,$pass){
        $sql="SELECT * FROM administrators WHERE user=? and password=?";
        $request = $this->connection->prepare($sql);
        $request->bindParam(1, $user);
        $request->bindParam(2, $pass);
        if(!$request->execute())
            return false;
        $request=$request->fetch();
        if(empty($request))
            return false;
        else
            return true;
    }
    public function checkUUID($uuid,$user){
        $sql="SELECT * FROM sessions WHERE key_id=? and user=?";
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
    public function createSession($user)
    {
        $sql="INSERT INTO sessions values(?,?,?)";
        $request = $this->connection->prepare($sql);
        $key=uniqid();
        $date=date("Y-m-d h:i:sa");
        $request->bindParam(1, $key);
        $request->bindParam(2, $user);
        $request->bindParam(3, $date);
        if(!$request->execute())
            return false;
        return $key;
    }
}
?>