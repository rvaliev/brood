<?php


namespace src\ProjectBrood\data;
use src\ProjectBrood\entities\Users;
use src\ProjectBrood\data\DBConnect;
use PDO;
use Exception;




/*include('../../../src/ProjectBrood/entities/Users.php');
include('../../../src/ProjectBrood/data/DBConnect.php');*/



class UsersDAO
{
    private $result;
    private $handler;
    private $sql;
    private $query;

    private $lijst;

    private $login;
    private $password;

    public function __construct()
    {

    }


    private function connectToDB()
    {
        $this->handler = new DBConnect();
        $this->handler = $this->handler->startConnection();
    }

    public function getAll()
    {
        self::connectToDB();
        $this->sql = "SELECT * FROM users";

        try
        {
            $this->query = $this->handler->query($this->sql);
            $this->result = $this->query->fetchAll(PDO::FETCH_ASSOC);

            $this->query->closeCursor();
            $this->handler = null;

            foreach ($this->result as $row)
            {
                $this->lijst[] = new Users($row['user_id'], $row['voornaam'], $row['familienaam'], $row['email'], $row['wachtwoord'], $row['registratie_datum'], $row['bestel_status'], $row['verified'], $row['email_hash']);
            }

            return $this->lijst;
        }
        catch(Exception $e)
        {
            echo "Error: query failure";
            return false;
        }
    }



    public function authorizeUser($login)
    {
        self::connectToDB();
        $this->sql = "SELECT * FROM users WHERE email = ?";

        try{
            $this->query = $this->handler->prepare($this->sql);
            $this->query->execute(array($login));
            $this->result = $this->query->fetchAll(PDO::FETCH_ASSOC);

            $this->query->closeCursor();
            $this->handler = null;

            foreach ($this->result as $row)
            {
                $this->lijst[] = new Users($row['user_id'], $row['voornaam'], $row['familienaam'], $row['email'], $row['wachtwoord'], $row['registratie_datum'], $row['bestel_status'], $row['verified'], $row['email_hash']);
            }


            return $this->lijst;


        }
        catch(Exception $e){
            echo "Error: query failure";
//            return false;
            die();
        }
    }

}


