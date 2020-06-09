<?php
class ContactsModel{
    private $connection;

    function __construct()
    {
        $this->connection = Database::getConnection();
    }

    public function insertContactInDb($firstName,$lastName,$email,$city,$subject)
    {
        $sql="INSERT INTO messages(Firstname,Lastname,E-mail,City,Subject) values(?,?,?,?,?)";
        $request = $this->connection->prepare($sql);
        $request->bindParam(1, $firstName);
        $request->bindParam(2, $lastName);
<<<<<<< HEAD
        $request->bindParam(3, $email);
        $request->bindParam(4, $city);
        $request->bindParam(5, $subject);
=======
        $request->bindParam(3, $city);
        $request->bindParam(4, $subject);
>>>>>>> 9a5cd704b7a40d181f72296a64fdfef7757d97a0
        $request->execute();
    }
}
?>