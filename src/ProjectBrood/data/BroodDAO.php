<?php

namespace src\ProjectBrood\data;
use src\ProjectBrood\Entities\Brood;
use src\ProjectBrood\Data\DBConnect;
use PDO;
use Exception;


class BroodDAO
{
    private $result;
    private $handler;
    private $sql;
    private $query;

    private $lijst;

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
        $this->sql = "SELECT * FROM brood";

        try{
            $this->query = $this->handler->query($this->sql);
            $this->result = $this->query->fetchAll(PDO::FETCH_ASSOC);

            $this->query->closeCursor();
            $this->handler = null;

            foreach ($this->result as $row)
            {
                $this->lijst[] = new Brood($row['brood_id'], $row['brood_naam'], $row['brood_samenstelling'], $row['brood_prijs'], $row['brood_image']);
            }


            return $this->lijst;
        }
        catch(Exception $e){
            echo "Error: query failure";
            return false;
        }
    }



    public function getAllById($brood_id)
    {
        self::connectToDB();
        $this->sql = "SELECT * FROM brood WHERE brood_id = ?";

        try{
            $this->query = $this->handler->prepare($this->sql);
            $this->query->execute(array($brood_id));
            $this->result = $this->query->fetchAll(PDO::FETCH_ASSOC);

            $this->query->closeCursor();
            $this->handler = null;

            foreach ($this->result as $row)
            {
                $this->lijst[] = new Brood($row['brood_id'], $row['brood_naam'], $row['brood_samenstelling'], $row['brood_prijs'], $row['brood_image']);
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
