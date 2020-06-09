<?php
class ContactsModel{
    private $connection2;

    function __construct()
    {
        $this->connection2 = DatabaseCont::getConnection2();
    }

    public function insertContactInDb($firstName,$lastName,$city,$subject)
    {
        $sql="INSERT INTO contact(Firstname,Lastname,City,Subject) values(?,?,?,?)";
        $request = $this->connection2->prepare($sql);
        $request->bindParam(1, $firstName);
        $request->bindParam(2, $lastName);
        $request->bindParam(3, $city);
        $request->bindParam(4, $subject);
        $request->execute();
    }
}
?>