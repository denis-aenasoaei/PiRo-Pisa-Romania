<?php
class ContactsModel{
    private $connection2;

    function __construct()
    {
        $this->connection2 = DatabaseCont::getConnection2();
    }

    public function insertContactInDb($firstName,$lastName,$city,$subject)
    {$sql="INSERT INTO contact(Firstname,Lastname,City,Sibject) values(?,?,?,?)"
     $request = $this->connection2->prepare($sql);
     $request->bindParam($firstName,$lastName,$city,$subject);
     $request->execute();

    }
}
?>