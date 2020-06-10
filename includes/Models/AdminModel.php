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

}
?>